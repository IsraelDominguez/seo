<?php
namespace UnitTest\Genetsis\Seo\Providers\Twitter\Traits;

use Genetsis\Seo\Providers\Twitter\Traits\TwitterCardDefaultData;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class TwitterCardDefaultDataTest extends TestCase
{
    public function testSetterAndGetterSite()
    {
        $object = new TwitterCardDefaultDataTraitTester();
        $this->assertEquals('', $object->getSite());
        $this->assertInstanceOf(TwitterCardDefaultDataTraitTester::class, $object->setSite('foo'));
        $this->assertEquals('foo', $object->getSite());
    }

    public function testSetterAndGetterTitle()
    {
        $object = new TwitterCardDefaultDataTraitTester();
        $this->assertEquals('', $object->getTitle());
        $this->assertInstanceOf(TwitterCardDefaultDataTraitTester::class, $object->setTitle('foo'));
        $this->assertEquals('foo', $object->getTitle());
    }

    public function testSetterAndGetterDescription()
    {
        $object = new TwitterCardDefaultDataTraitTester();
        $this->assertEquals('', $object->getDescription());
        $this->assertInstanceOf(TwitterCardDefaultDataTraitTester::class, $object->setDescription('foo'));
        $this->assertEquals('foo', $object->getDescription());
    }

    public function testSetterAndGetterImage()
    {
        $object = new TwitterCardDefaultDataTraitTester();
        $this->assertEquals('', $object->getImage());
        $this->assertInstanceOf(TwitterCardDefaultDataTraitTester::class, $object->setImage('foo'));
        $this->assertEquals('foo', $object->getImage());
    }
}


/**
 * Foo class for trait testing.
 */
class TwitterCardDefaultDataTraitTester
{
    use TwitterCardDefaultData;
}

