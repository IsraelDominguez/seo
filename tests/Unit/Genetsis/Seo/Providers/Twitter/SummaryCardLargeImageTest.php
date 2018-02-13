<?php
namespace UnitTest\Genetsis\Seo\Providers\Twitter;

use Genetsis\Seo\Providers\Twitter\SummaryCardLargeImage;
use Genetsis\Seo\Providers\Web\Web;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class SummaryCardLargeImageTest extends TestCase
{
    public function testConstructor()
    {
        $object = new SummaryCardLargeImage((new Web())
            ->setTitle('title')
            ->setDescription('description')
            ->setImage('image')
            ->setAuthor('@foo'));
        $this->assertEquals('title', $object->getTitle());
        $this->assertEquals('description', $object->getDescription());
        $this->assertEquals('image', $object->getImage());
        $this->assertEquals('@foo', $object->getCreator());
    }

    public function testToStringConversion()
    {
        $object = (new SummaryCardLargeImage())
            ->setSite('site')
            ->setCreator('@creator')
            ->setTitle('title')
            ->setDescription('description')
            ->setImage('image');
        $expected = implode(PHP_EOL, [
            '<!-- Twitter Card data -->',
            '<meta name="twitter:card" content="summary_large_image" />',
            '<meta name="twitter:site" content="site" />',
            '<meta name="twitter:creator" content="@creator" />',
            '<meta name="twitter:title" content="title" />',
            '<meta name="twitter:description" content="description" />',
            '<meta name="twitter:image" content="image" />'
        ]);
        $this->assertEquals($expected, $object);

        $this->assertEquals('', (new SummaryCardLargeImage()));
    }
}
