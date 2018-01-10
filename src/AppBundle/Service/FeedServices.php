<?php
namespace AppBundle\Service;

use AppBundle\Api\RssApi;
Use AppBundle\Entity\Feed;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;


class FeedServices
{
    private $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em        = $entityManager;
        $this->container = $container;
    }
    
    /**
     * Send request and store data into DB
     *
     * @param  array     $urls the array urls
     * @return string    output message having type (info|comment|error)
     */
    public function getDataFromURL(RssApi $apiRss, $urls)
    {

        // Get item data from API
        $apiRss->sendRequest($urls);
        $itemData = $apiRss->getItemData();
        if (empty($itemData)) {
           return false;
        }
        $batchSize = 100;
        foreach ($itemData as $key => $item) {
            $feed = new Feed();
            $feed->setTitle($item[$apiRss->titleKey]);
            $feed->setDescription($item[$apiRss->despKey]);
            $feed->setLink($item[$apiRss->linkKey]);
            $feed->setGuid($item[$apiRss->guidKey]);
            $feed->setPubDate($item[$apiRss->dateKey]);
            $feed->setCategory($item[$apiRss->categoryKey]);
            $feed->setComment($item[$apiRss->commentKey]);
            $this->em->persist($feed);
            if (($key % $batchSize) === 0) {
                $this->em->flush();
                $this->em->clear(); // Detaches all objects from Doctrine!
            }
        }
        $this->em->flush(); //Persist objects that did not make up an entire batch
        $this->em->clear();

        return true;
    }

    /**
     * get list item data and pagination
     *
     * @return object  pagination data
     */
    public function getListItemData(Request $request)
    {
        $queryBuilder = $this->em->getRepository(Feed::class)->createQueryBuilder('f');

        $categoryFilter = trim($request->query->get('filter'));
        if (!empty($categoryFilter)) {
            $queryBuilder
                ->where('f.category LIKE :param')
                ->setParameter('param', '%' . $categoryFilter . '%');
        }

        $query = $queryBuilder->getQuery();

        $paginator  = $this->container->get('knp_paginator');
        $listItem = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 20)
        );
        return $listItem;
    }
}

