<?php
namespace UnitTest\Genetsis\Seo\Providers\Web;

use Genetsis\Seo\Providers\Web\Web;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class WebTest extends TestCase
{
    public function testSetterAndGetterTitle()
    {
        $object = new Web();
        $this->assertEquals('', $object->getTitle());
        $this->assertInstanceOf(Web::class, $object->setTitle('foo'));
        $this->assertEquals('foo', $object->getTitle());
    }

    public function testSetterAndGetterDescription()
    {
        $object = new Web();
        $this->assertEquals('', $object->getDescription());
        $this->assertInstanceOf(Web::class, $object->setDescription('foo'));
        $this->assertEquals('foo', $object->getDescription());
    }

    public function testSetterAndGetterUrl()
    {
        $object = new Web();
        $this->assertEquals('', $object->getUrl());
        $this->assertInstanceOf(Web::class, $object->setUrl('http://foo.com'));
        $this->assertEquals('http://foo.com', $object->getUrl());
    }

    public function testSetterAndGetterImage()
    {
        $object = new Web();
        $this->assertEquals('', $object->getImage());
        $this->assertInstanceOf(Web::class, $object->setImage('foo/bar.png'));
        $this->assertEquals('foo/bar.png', $object->getImage());
    }

    public function testSetterAndGetterAuthor()
    {
        $object = new Web();
        $this->assertEquals('', $object->getAuthor());
        $this->assertInstanceOf(Web::class, $object->setAuthor('foo'));
        $this->assertEquals('foo', $object->getAuthor());
    }

    public function testSetterAndGetterCopyright()
    {
        $object = new Web();
        $this->assertEquals('', $object->getCopyright());
        $this->assertInstanceOf(Web::class, $object->setCopyright('foo'));
        $this->assertEquals('foo', $object->getCopyright());
    }

    public function testToStringConversion()
    {
        $object = (new Web())
            ->setTitle('title')
            ->setDescription('description')
            ->setUrl('http://foo.com')
            ->setImage('http://foo/bar.png')
            ->setAuthor('author')
            ->setCopyright('copyright');
        $expected = implode(PHP_EOL, [
            '<title>title</title>',
            '<meta name="description" content="description" />',
            '<meta name="author" content="author" />',
            '<meta name="copyright" content="copyright" />',
            '<meta itemprop="image" content="http://foo/bar.png" />'
        ]);
        $this->assertEquals($expected, (string)$object);

        $this->assertEquals('', (string)(new Web()));
    }
}

