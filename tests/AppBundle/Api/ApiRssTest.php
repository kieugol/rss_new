<?php
namespace Tests\AppBundle\Util;

use AppBundle\Api\RssApi;
use PHPUnit\Framework\TestCase;
use Tests\Lib\CommonUtil;
use Tests\Lib\DataFixture\RssApiFixture;

class ApiRssTest extends TestCase
{
    use CommonUtil;

    /**
     * [testSendMultipleRequest description]
     * @param  string  $input     the data input test
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderTestSendMultipleRequest
     */
    public function testSendMultipleRequest($input, $expected)
    {
        // GIVEN
        $api = new RssApi();
        $this->setRepsone($api, $input);
        // WHEN
        $api->sendRequest([
            'http://www.rss-specifications.com/blog-feed.xml',
            'http://www.rss-specifications.com/blog-feed.xml'
        ]);
        // THEN
        $this->assertNotEmpty($api->getData());
        $this->assertEquals($expected, $api->getItemData());
    }

    /**
     * Data Provider for TestSendMultipleRequest()
     *
     * @return array data test
     */
    public function dataProviderTestSendMultipleRequest()
    {
        $rssFixture =  new RssApiFixture();
        return [
            'send_multi_succeed' => [
                'input'  => [
                    'api1' => ['status_code' => 200, 'body' => $rssFixture->getResponseItems1()],
                    'api2' => ['status_code' => 200, 'body' => $rssFixture->getResponseItems2()]
                ],
                'expected' => $rssFixture->getAssertItem3()
            ],
            'send_multi_succeed_and_failed' => [
                'input'  => [
                    'api1' => ['status_code' => 200, 'body' => $rssFixture->getResponseItems2()],
                    'api2' => ['status_code' => 500, 'body' => $rssFixture->getResponseFailed()]
                ],
                'expected' => $rssFixture->getAssertItem2()
            ]
        ];
    }
}