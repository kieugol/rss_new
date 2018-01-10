<?php
namespace Tests\AppBundle\Service;

use AppBundle\Api\RssApi;
use AppBundle\Entity\Feed;
use Tests\Lib\CommonUtil;
use Tests\Lib\DataFixture\RssApiFixture;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;


class FeedServicesTest extends KernelTestCase
{
    use CommonUtil;

    const DROP_TABLE = "DROP TABLE IF EXISTS `feed`;";

    private $objFeed;
    private $em;

    protected function setUp()
    {
        $kernel        = self::bootKernel();
        $this->objFeed = $kernel->getContainer()->get('GetFeed');
        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * Create data test for the case
     * @param string the sql
     */
    protected function prepareDataTest($sql)
    {
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute();
    }

    /**
     * Test GetDataFromURL() with the cases are succeeded and failed 
     *
     * @param  string  $input     the data input testing
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderForTestGetDataFromURL
     */
    public function testGetDataFromURL($input, $expected)
    {
        // GIVEN
        $sql = file_get_contents('tests/Lib/data/sql/feed.sql');
        $this->prepareDataTest($sql);
        $apiRss  = new RssApi();
        $this->setRepsone($apiRss, $input['api']);
        // WHEN
        $actual = $this->objFeed->getDataFromURL($apiRss, $input['url']);
        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * DataProvider For TestGetDataFromURL() function
     * @return array data test
     */
    public function dataProviderForTestGetDataFromURL()
    {
        $rssFixture =  new RssApiFixture();
        return [
            'get_data_succeed' => [
                'input'  => [
                    'url' => ['http://www.sample.feed.com'],
                    'api' => [
                        [
                            'status_code' => 200,
                            'body'        => $rssFixture->getResponseItem100ForFeedService()
                        ]
                    ]
                ],
                'expected' => true
            ],
            'get_data_failed' => [
                'input'  => [
                    'url' => ['http://www.empty.feed.com'],
                    'api' => [
                        [
                            'status_code' => 200,
                            'body'        => $rssFixture->getResponseEmptyForFeedService()
                        ]
                    ]
                ],
                'expected' => false
            ]
        ];
    }

    /**
     * Test GetDataFromURL() with the cases are succeeded and failed 
     *
     * @param  string  $input     the data input testing
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderForTestGetListItemData
     */
    public function testGetListItemData($params, $expected)
    {
        // GIVEN
        $sql = file_get_contents('tests/Lib/data/sql/feed2.sql');
        $this->prepareDataTest($sql);
        $reqs = new Request($params);
        // WHEN
        $pagination = $this->objFeed->getListItemData($reqs);
        // THEN
        $this->assertEquals($expected['current_page'], $pagination->getCurrentPageNumber());
        $this->assertEquals($expected['total_item_return'], count($pagination->getItems()));
        $this->assertEquals($expected['total_matched'], $pagination->getTotalItemCount());
    }

    /**
     * DataProvider For TestGetDataFromURL() function
     * @return array data test
     */
    public function dataProviderForTestGetListItemData()
    {
        return [
            'get_data_no_filter' => [

                'params'    => [],
                'expected' => [
                    'current_page'      => 1,
                    'total_item_return' => 20,
                    'total_matched'     => 20
                ]
            ],
            'get_data_fiter' => [
                'params'    => ['filter' => 'Computers/Software'],
                'expected' => [
                    'current_page'      => 1,
                    'total_item_return' => 2,
                    'total_matched'     => 2
                ]
            ]
        ];
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->objFeed = null;
        $this->prepareDataTest(self::DROP_TABLE);
    }
}
