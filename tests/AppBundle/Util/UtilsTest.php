<?php
namespace Tests\AppBundle\Util;

use AppBundle\Util\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    use Utils;

    /**
     * Test function isUrl() in trait Utils
     * @param  string  $input     the data input test
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderForTestValidateURL
     */
    public function testValidateURL($input, $expected)
    {
        // WHEN
        $actual = $this->isUrl($input);
        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider For TestValidateURL funtion
     * @return array  the cases is valid or invalid
     */
    public function dataProviderForTestValidateURL()
    {
        return [
            'url_valid_http' => [
                'input' => 'https://git.8bitrockr.com',
                'expected' => true
            ],
            'url_valid_https' => [
                'input' => 'http://www.feedforall.com/sample-feeds.htm',
                'expected' => true
            ],
            'url_invalid' => [
                'input' => 'sample-feeds.htm',
                'expected' => false
            ]
        ];
    }

    /**
     * Test function isUrl() in trait Utils
     * @param  string  $input     the data input test
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderForTestValidateXML
     */
    public function testValidateXML($input, $expected)
    {
        // WHEN
        $actual = $this->isXML($input);
        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider For TestValidateURL funtion
     * @return array  the cases is valid or invalid
     */
    public function dataProviderForTestValidateXML()
    {
        return [
            'xml_valid' => [
                'input'   => "<?xml version='1.0'?>
                            <catalog>
                               <book >
                                  <author>Gambardella, Matthew</author>
                                  <title>XML Developer's Guide</title>
                                  <genre>Computer</genre>
                                  <price>44.95</price>
                                  <publish_date>2000-10-01</publish_date>
                                  <description>An in-depth look at creating applications 
                                  with XML.</description>
                               </book>
                            </catalog>",
                'expected' => true
            ],
            'xml_invalid' => [
                'input'    => 'http://www.feedforall.com/sample-feeds.htm',
                'expected' => false
            ]
        ];
    }

    /**
     * Test function isInteger() in trait Utils
     * @param  string  $input     the data input test
     * @param  boolean $expected  the data expected
     * @dataProvider dataProviderForTestValidateInteger
     */
    public function testValidateInteger($input, $expected)
    {
        // WHEN
        $actual = $this->isInteger($input);
        // THEN
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider For testValidateInteger funtion
     * @return array  the cases is valid or invalid
     */
    public function dataProviderForTestValidateInteger()
    {
        return [
            'is_integer_number' => [
                'input'    => 123,
                'expected' => true
            ],
            'is_string_integer_number' => [
                'input'    => '123',
                'expected' => true
            ],
            'is_float_number'  => [
                'input'    => 123.5,
                'expected' => false
            ],
            'not_integer_number' => [
                'input'    => 'abc',
                'expected' => false
            ]
        ];
    }
}