<?php
namespace Genetsis\Seo\Providers\Twitter;

use Genetsis\Seo\Providers\Twitter\Contracts\TwitterCardInterface;
use Genetsis\Seo\Providers\Twitter\Traits\TwitterCardDefaultData;
use Genetsis\Seo\Providers\Web\Web;

/**
 * @link https://dev.twitter.com/cards/types/summary
 */
class SummaryCard implements TwitterCardInterface
{
    use TwitterCardDefaultData;

    /**
     * Twitter constructor.
     * @param Web|null $basic Prefill data with a {@link Genetsis\Seo\Providers\Basic} object.
     */
    public function __construct(Web $basic = null)
    {
        if ($basic instanceof Web) {
            $this->setTitle($basic->getTitle());
            $this->setDescription($basic->getDescription());
            $this->setImage($basic->getImage());
        }
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $string = [];

        if ($this->getSite()) {
            $string[] = '<meta name="twitter:site" content="' . $this->getSite() . '" />';
        }
        if ($this->getTitle()) {
            $string[] = '<meta name="twitter:title" content="' . $this->getTitle() . '" />';
        }
        if ($this->getDescription()) {
            $string[] = '<meta name="twitter:description" content="' . $this->getDescription() . '" />';
        }
        if ($this->getImage()) {
            $string[] = '<meta name="twitter:image" content="' . $this->getImage() . '" />';
        }

        if (count($string) > 0) {
            $string = array_merge(['<!-- Twitter Card data -->', '<meta name="twitter:card" content="summary" />'], $string);
        }

        return implode(PHP_EOL, $string);
    }
}
