<?php
namespace UnitTest\Genetsis\Seo\Providers\GooglePlus;

use Genetsis\Seo\Providers\GooglePlus\GooglePlus;
use Genetsis\Seo\Providers\Web\Web;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class GooglePlusTest extends TestCase
{
   public function testSetterAndGetterName()
   {
       $object = new GooglePlus();
       $this->assertEquals('', $object->getName());
       $this->assertInstanceOf(GooglePlus::class, $object->setName('foo'));
       $this->assertEquals('foo', $object->getName());
   }

   public function testSetterAndGetterDescription()
   {
       $object = new GooglePlus();
       $this->assertEquals('', $object->getDescription());
       $this->assertInstanceOf(GooglePlus::class, $object->setDescription('foo'));
       $this->assertEquals('foo', $object->getDescription());
   }

   public function testSetterAndGetterImage()
   {
       $object = new GooglePlus();
       $this->assertEquals('', $object->getImage());
       $this->assertInstanceOf(GooglePlus::class, $object->setImage('foo'));
       $this->assertEquals('foo', $object->getImage());
   }

   public function testConstructor()
   {
       $object = new GooglePlus((new Web())
           ->setTitle('title')
           ->setDescription('description')
           ->setImage('http://foo/bar.png'));
       $this->assertEquals('title', $object->getName());
       $this->assertEquals('description', $object->getDescription());
       $this->assertEquals('http://foo/bar.png', $object->getImage());

       $object = new GooglePlus((new Web())
           ->setTitle('title'));
       $this->assertEquals('title', $object->getName());
       $this->assertEquals('', $object->getDescription());
       $this->assertEquals('', $object->getImage());
   }

    public function testToStringConversion()
    {
        $object = (new GooglePlus())
            ->setName('title')
            ->setDescription('description')
            ->setImage('http://foo/bar.png');
        $expected = implode(PHP_EOL, [
            '<!-- Schema.org markup for Google+ -->',
            '<meta itemprop="name" content="title" />',
            '<meta itemprop="description" content="description" />',
            '<meta itemprop="image" content="http://foo/bar.png" />'
        ]);
        $this->assertEquals($expected, (string)$object);

        $this->assertEquals('', (string)(new GooglePlus()));
    }
}

