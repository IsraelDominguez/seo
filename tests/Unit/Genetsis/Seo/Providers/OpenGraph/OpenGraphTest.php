<?php
namespace UnitTest\Genetsis\Seo\Providers\OpenGraph;

use Genetsis\Seo\Providers\OpenGraph\OpenGraph;
use Genetsis\Seo\Providers\Web\Web;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class OpenGraphTest extends TestCase
{
    public function testSetterAndGetterTitle()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getTitle());
        $this->assertInstanceOf(OpenGraph::class, $object->setTitle('foo'));
        $this->assertEquals('foo', $object->getTitle());
    }

    public function testSetterAndGetterDescription()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getDescription());
        $this->assertInstanceOf(OpenGraph::class, $object->setDescription('foo'));
        $this->assertEquals('foo', $object->getDescription());
    }

    public function testSetterAndGetterType()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getType());
        $this->assertInstanceOf(OpenGraph::class, $object->setType('foo'));
        $this->assertEquals('foo', $object->getType());
    }

    public function testSetterAndGetterUrl()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getUrl());
        $this->assertInstanceOf(OpenGraph::class, $object->setUrl('foo'));
        $this->assertEquals('foo', $object->getUrl());
    }

    public function testSetterAndGetterSiteName()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getSiteName());
        $this->assertInstanceOf(OpenGraph::class, $object->setSiteName('foo'));
        $this->assertEquals('foo', $object->getSiteName());
    }

    public function testSetterAndGetterImage()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getImage());
        $this->assertInstanceOf(OpenGraph::class, $object->setImage('foo'));
        $this->assertEquals('foo', $object->getImage());
    }

    public function testSetterAndGetterLocale()
    {
        $object = new OpenGraph();
        $this->assertEquals('', $object->getLocale());
        $this->assertInstanceOf(OpenGraph::class, $object->setLocale('foo'));
        $this->assertEquals('foo', $object->getLocale());
    }

    public function testConstructor()
    {
        $object = new OpenGraph((new Web())
            ->setTitle('title')
            ->setDescription('description')
            ->setUrl('http://foo.bar')
            ->setImage('http://foo/bar.png'));
        $this->assertEquals('title', $object->getTitle());
        $this->assertEquals('description', $object->getDescription());
        $this->assertEquals('http://foo.bar', $object->getUrl());
        $this->assertEquals('http://foo/bar.png', $object->getImage());

        $object = new OpenGraph((new Web())
            ->setTitle('title'));
        $this->assertEquals('title', $object->getTitle());
        $this->assertEquals('', $object->getDescription());
        $this->assertEquals('', $object->getUrl());
        $this->assertEquals('', $object->getImage());
    }

    public function testToStringConversion()
    {
        $object = (new OpenGraph())
            ->setTitle('title')
            ->setDescription('description')
            ->setType('type')
            ->setUrl('http://foo.bar')
            ->setSiteName('site-name')
            ->setImage('http://foo/bar.png')
            ->setLocale('es');
        $expected = implode(PHP_EOL, [
            '<!-- Open Graph data -->',
            '<meta property="og:title" content="title"/>',
            '<meta property="og:description" content="description"/>',
            '<meta property="og:type" content="type"/>',
            '<meta property="og:url" content="http://foo.bar"/>',
            '<meta property="og:site_name" content="site-name"/>',
            '<meta property="og:image" content="http://foo/bar.png"/>',
            '<meta property="og:locale" content="es" />'
        ]);
        $this->assertEquals($expected, (string)$object);

        $this->assertEquals('', (string)(new OpenGraph()));
    }
}

