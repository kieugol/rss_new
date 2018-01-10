<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;


class RssController extends BaseController
{
    /**
     * Show list items data of RSS and filter category name
     *
     * @param  Request $request   the object contains request parameters
     * @return view               display page list items data
     */
    public function listAction(Request $request)
    {

        $objFeed = $this->get('GetFeed');
        return $this->render('rss/index.html.twig', [ 
           'list_item'  => $objFeed->getListItemData($request),
           'page_title' => 'list item'
        ]);
    }
}
