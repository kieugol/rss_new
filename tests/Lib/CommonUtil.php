<?php
Namespace Tests\Lib;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;

/**
 * Using for PHPUnit test 
 */
trait CommonUtil
{
    /**
     * Call a protected method from object
     *
     * @param  object    $object       The object contains method name
     * @param  string    $methodName   The method name
     */
    public function callMethod($object, $methodName, $argument = '')
    {
        $reflectionMethod = new \ReflectionMethod($object, $methodName);
        $reflectionMethod->invoke($object, $argument);
    }

    /**
     * Get the value of protected property
     *
     * @param  object  $obj     The object contains property
     * @param  string  $prop    The property name
     * @return undefined        The value of property, the value type depend on object was defined
     */
    public function accessProperty($object, $prop) {
        $reflection = new \ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
    }

    /**
     * Set the value for protected property
     *
     * @param  object  $obj     The object contains property
     * @param  string  $prop    The property name
     * @return undefined        The value of property, the value type depend on object was defined
     */
    public function setProperty($object, $prop, $value) {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }

    /**
     * Set repsonse when calling API through guzzle client
     *
     * @param object  $objApi        object want to set response when calling API
     * @param option  $responseData  array response data
     * @param array   $header        the header set for corresponding response
     */
    public function setRepsone($objApi, $responseData, $header = [])
    {
        $plugin = new MockPlugin();
        if (empty($header)) {
            $header = [
                "Host"         => "httpbin.org",
                "User-Agent"   => "curl/7.19.7 (i386-redhat-linux-gnu) libcurl/7.19.7 NSS/3.12.5.0 zlib/1.2.3 libidn/1.9 libssh2/1.2.2",
                "Accept"       => "application/xhtml+xml",
                "Content-Type" => "application/xhtml+xml"
            ];
        }
        foreach ($responseData as $resonse) {
            $mockResponseBody = EntityBody::factory($resonse['body']);
            $mockResponse = new Response($resonse['status_code']);
            $mockResponse->setHeaders($header);
            $mockResponse->setBody($mockResponseBody);
            $plugin->addResponse($mockResponse);
        }
        $clientOverride = new Client();
        $clientOverride->addSubscriber($plugin);
        $this->setProperty($objApi, 'client', $clientOverride);
    }

    /**
     * Function defination to convert array to xml
     *
     * @param  array    $data   array data want to merge into xml
     * @param  xml      &$xml   xml objec initial
     * @return xml      return  xml object
     */
    protected function arrayToXml($data, &$xml)
    {
        foreach( $data as $key => $value ) {
            if( is_numeric($key) ){
                $key = 'item';
            }
            if( is_array($value) ) {
                $subnode = $xml->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml->addChild("$key",htmlspecialchars("$value"));
            }
         }
    }
}
