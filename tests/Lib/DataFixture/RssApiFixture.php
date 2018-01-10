<?php
Namespace Tests\Lib\DataFixture;

use Tests\Lib\CommonUtil;


/**
 * Building data xml for RssApi
 */
class RssApiFixture
{
    use CommonUtil;

    /**
     * Build response data  from API
     *
     * @param  integer $num  the quantity records will return
     * @return string        the string xml
     */
    private function buildRepsonseData($num = 2, $data = [])
    {
        $items = [];
        for ($i = 1; $i <= $num; $i++) {
            $items[] = [
                'title'       => $data['title'] ?? 'RSS Solutions for Governments',
                'description' => $data['desp'] ?? 'RSS Solutions',
                'link'        => $data['link'] ?? 'http://www.feedforall.com/sample.xml',
                'pubDate'     => $data['date'] ?? 'Tue, 19 Oct 2004 11:09:05 -0400',
                'guid'        => $data['guid'] ?? 333,
                'category'    => $data['category'] ?? 'Computers/Software/Internet/Site Management/Content Management',
                'comments'    => $data['comments'] ?? 'comment'
            ];
        }
        $data = ['channel' => $items];

        $xml = new \SimpleXMLElement('<?xml version="1.0"?><rs></rs>');
        $this->arrayToXml($data, $xml);
        return $xml->asXML();
    }

    /**
     * Build response data  from API
     *
     * @param  integer $num  the quantity records will return
     * @return string        the string xml
     */
    private function buildAssertItemData($num = 2, $data = [])
    {
        $items = [];
        for ($i = 1; $i <= $num; $i++) {
            $date = $data['date'] ?? 'Tue, 19 Oct 2004 11:09:05 -0400';
            $items[] = [
                'title'    => $data['title'] ?? 'RSS Solutions for Governments',
                'category' => $data['category'] ?? 'Computers/Software/Internet/Site Management/Content Management',
                'guid'     => $data['guid'] ?? 333,
                'link'     => $data['link'] ?? 'http://www.feedforall.com/sample.xml',
                'desp'     => $data['desp'] ?? 'RSS Solutions',
                'comment'  => $data['comments'] ?? 'comment',
                'date'     => new \Datetime($date)
            ];
        }

        return $items;
    }


    /**
     * Get 1 items when calling API
     */
    public function getResponseItems1()
    {
        return $this->buildRepsonseData(1);
    }

    /**
     * Get 2 items when calling API
     */
    public function getResponseItems2()
    {
        return $this->buildRepsonseData();
    }

    /**
     * Get failed Data
     *
     * @return null
     */
    public function getResponseFailed()
    {
        return '';
    }

    /**
     * Get 100 items for AppBundle\Service\FeedService calling Rss API
     *
     * @return array  data assert
     */
    public function getResponseItem100ForFeedService()
    {
        return $this->buildRepsonseData(100);
    }

    /**
     * Get emty items for AppBundle\Service\FeedService calling Rss API
     *
     * @return array  data assert
     */
    public function getResponseEmptyForFeedService()
    {
        return $this->buildRepsonseData(0);
    }

    /**
     * Get 2 items when sending parallel from Rss API
     *
     * @return array  data assert
     */
    public function getAssertItem2()
    {
        return $this->buildAssertItemData(2);
    }

    /**
     * Get 3 items when sending parallel from Rss API
     *
     * @return array  data assert
     */
    public function getAssertItem3()
    {
        return $this->buildAssertItemData(3);
    }
}
