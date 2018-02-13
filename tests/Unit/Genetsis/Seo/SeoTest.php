<?php
namespace UnitTest\Genetsis\Seo;

use Genetsis\Seo\Providers\Facebook\Facebook;
use Genetsis\Seo\Providers\GooglePlus\GooglePlus;
use Genetsis\Seo\Providers\OpenGraph\OpenGraph;
use Genetsis\Seo\Providers\Twitter\SummaryCard;
use Genetsis\Seo\Providers\Twitter\SummaryCardLargeImage;
use Genetsis\Seo\Providers\Web\Web;
use Genetsis\Seo\Seo;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class SeoTest extends TestCase
{
    public function testSetterAndGetterWeb()
    {
        $object = new Seo();
        $this->assertInstanceOf(Web::class, $object->getWeb());
        $this->assertInstanceOf(Seo::class, $object->setWeb((new Web())->setTitle('title')));
        $this->assertInstanceOf(Web::class, $object->getWeb());
        $this->assertEquals('title', $object->getWeb()->getTitle());
    }

    public function testSetterAndGetterOpenGraph()
    {
        $object = new Seo();
        $this->assertInstanceOf(OpenGraph::class, $object->getOpenGraph());
        $this->assertInstanceOf(Seo::class, $object->setOpenGraph((new OpenGraph())->setTitle('title')));
        $this->assertInstanceOf(OpenGraph::class, $object->getOpenGraph());
        $this->assertEquals('title', $object->getOpenGraph()->getTitle());
    }

    public function testSetterAndGetterFacebook()
    {
        $object = new Seo();
        $this->assertInstanceOf(Facebook::class, $object->getFacebook());
        $this->assertInstanceOf(Seo::class, $object->setFacebook((new Facebook())->setAppId('app-id')));
        $this->assertInstanceOf(Facebook::class, $object->getFacebook());
        $this->assertEquals('app-id', $object->getFacebook()->getAppId());
    }

    public function testToStringConversion()
    {
        $object = (new Seo)
            ->setWeb((new Web())
                ->setTitle('title')
                ->setDescription('description')
                ->setUrl('http://foo.com')
                ->setImage('http://foo/bar.png')
                ->setAuthor('author')
                ->setCopyright('copyright'))
            ->setOpenGraph((new OpenGraph())
                ->setTitle('title')
                ->setDescription('description')
                ->setType('type')
                ->setUrl('http://foo.bar')
                ->setSiteName('site-name')
                ->setImage('http://foo/bar.png')
                ->setLocale('es'))
            ->setFacebook((new Facebook())
                ->setAppId('app-id'))
            ->setTwitterCard((new SummaryCard())
                ->setTitle('tw-title')
                ->setSite('@foo'))
            ->setGooglePlus((new GooglePlus())
                ->setName('name')
                ->setDescription('description')
                ->setImage('http://foo/bar.png'));
        $expected = implode(PHP_EOL, [
            '<title>title</title>',
            '<meta name="description" content="description" />',
            '<meta name="author" content="author" />',
            '<meta name="copyright" content="copyright" />',
            '<meta itemprop="image" content="http://foo/bar.png" />',
            '<!-- Open Graph data -->',
            '<meta property="og:title" content="title"/>',
            '<meta property="og:description" content="description"/>',
            '<meta property="og:type" content="type"/>',
            '<meta property="og:url" content="http://foo.bar"/>',
            '<meta property="og:site_name" content="site-name"/>',
            '<meta property="og:image" content="http://foo/bar.png"/>',
            '<meta property="og:locale" content="es" />',
            '<meta property="fb:app_id" content="app-id" />',
            '<!-- Twitter Card data -->',
            '<meta name="twitter:card" content="summary" />',
            '<meta name="twitter:site" content="@foo" />',
            '<meta name="twitter:title" content="tw-title" />',
            '<!-- Schema.org markup for Google+ -->',
            '<meta itemprop="name" content="name" />',
            '<meta itemprop="description" content="description" />',
            '<meta itemprop="image" content="http://foo/bar.png" />'
        ]);
        $this->assertEquals($expected, (string)$object);

        $object = (new Seo)
            ->setWeb((new Web())
                ->setTitle('title')
                ->setDescription('description')
                ->setUrl('http://foo.com')
                ->setImage('http://foo/bar.png')
                ->setAuthor('author')
                ->setCopyright('copyright'))
            ->setOpenGraph((new OpenGraph())
                ->setTitle('title')
                ->setDescription('description')
                ->setType('type')
                ->setUrl('http://foo.bar')
                ->setSiteName('site-name')
                ->setImage('http://foo/bar.png')
                ->setLocale('es'))
            ->setFacebook((new Facebook())
                ->setAppId('app-id'))
            ->setTwitterCard((new SummaryCardLargeImage())
                ->setTitle('tw-title')
                ->setSite('@foo')
                ->setCreator('@creator'))
            ->setGooglePlus((new GooglePlus())
                ->setName('name')
                ->setDescription('description')
                ->setImage('http://foo/bar.png'));
        $expected = implode(PHP_EOL, [
            '<title>title</title>',
            '<meta name="description" content="description" />',
            '<meta name="author" content="author" />',
            '<meta name="copyright" content="copyright" />',
            '<meta itemprop="image" content="http://foo/bar.png" />',
            '<!-- Open Graph data -->',
            '<meta property="og:title" content="title"/>',
            '<meta property="og:description" content="description"/>',
            '<meta property="og:type" content="type"/>',
            '<meta property="og:url" content="http://foo.bar"/>',
            '<meta property="og:site_name" content="site-name"/>',
            '<meta property="og:image" content="http://foo/bar.png"/>',
            '<meta property="og:locale" content="es" />',
            '<meta property="fb:app_id" content="app-id" />',
            '<!-- Twitter Card data -->',
            '<meta name="twitter:card" content="summary_large_image" />',
            '<meta name="twitter:site" content="@foo" />',
            '<meta name="twitter:creator" content="@creator" />',
            '<meta name="twitter:title" content="tw-title" />',
            '<!-- Schema.org markup for Google+ -->',
            '<meta itemprop="name" content="name" />',
            '<meta itemprop="description" content="description" />',
            '<meta itemprop="image" content="http://foo/bar.png" />'
        ]);
        $this->assertEquals($expected, (string)$object);
    }
}

