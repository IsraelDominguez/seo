<?php
namespace UnitTest\Genetsis\Seo\Providers\Twitter;

use Genetsis\Seo\Providers\Twitter\SummaryCard;
use Genetsis\Seo\Providers\Web\Web;
use PHPUnit\Framework\TestCase;

/**
 * @category UnitTest
 */
class SummaryCardTest extends TestCase
{
    public function testConstructor()
    {
        $object = new SummaryCard((new Web())
            ->setTitle('title')
            ->setDescription('description')
            ->setImage('image'));
        $this->assertEquals('title', $object->getTitle());
        $this->assertEquals('description', $object->getDescription());
        $this->assertEquals('image', $object->getImage());
    }

    public function testToStringConversion()
    {
        $object = (new SummaryCard())
            ->setSite('site')
            ->setTitle('title')
            ->setDescription('description')
            ->setImage('image');
        $expected = implode(PHP_EOL, [
            '<!-- Twitter Card data -->',
            '<meta name="twitter:card" content="summary" />',
            '<meta name="twitter:site" content="site" />',
            '<meta name="twitter:title" content="title" />',
            '<meta name="twitter:description" content="description" />',
            '<meta name="twitter:image" content="image" />'
        ]);
        $this->assertEquals($expected, $object);

        $this->assertEquals('', (new SummaryCard()));
    }
}
