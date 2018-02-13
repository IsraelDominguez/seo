<?php
namespace UnitTest\Genetsis\Seo\Providers\Facebook;

use Genetsis\Seo\Providers\Facebook\Facebook;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class FacebookTest extends TestCase
{
    public function testSetterAndGetterAppId()
    {
        $object = new Facebook();
        $this->assertEquals('', $object->getAppId());
        $this->assertInstanceOf(Facebook::class, $object->setAppId('foo'));
        $this->assertEquals('foo', $object->getAppId());
    }

    public function testToStringConversion()
    {
        $object = (new Facebook())->setAppId('app-id');
        $expected = '<meta property="fb:app_id" content="app-id" />';
        $this->assertEquals($expected, (string)$object);

        $this->assertEquals('', (string)(new Facebook()));
    }
}

