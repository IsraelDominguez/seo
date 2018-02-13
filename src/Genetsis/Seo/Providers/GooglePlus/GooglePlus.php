<?php
namespace Genetsis\Seo\Providers\GooglePlus;

use Genetsis\Seo\Providers\Web\Web;

/**
 *
 */
class GooglePlus
{
    /** @var string $name */
    private $name = '';
    /** @var string $description */
    private $description = '';
    /** @var string $image */
    private $image = '';

    /**
     * OpenGraph constructor.
     * @param Web|null $basic Prefill data with a {@link Genetsis\Seo\Providers\Basic} object.
     */
    public function __construct(Web $basic = null)
    {
        if ($basic instanceof Web) {
            $this->setName($basic->getTitle());
            $this->setDescription($basic->getDescription());
            $this->setImage($basic->getImage());
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return GooglePlus
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return GooglePlus
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return GooglePlus
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @inheritDoc
     */
    function __toString()
    {
        $string = [];

        if ($this->getName()) {
            $string[] = '<meta itemprop="name" content="' . $this->getName() . '" />';
        }
        if ($this->getDescription()) {
            $string[] = '<meta itemprop="description" content="' . $this->getDescription() . '" />';
        }
        if ($this->getImage()) {
            $string[] = '<meta itemprop="image" content="' . $this->getImage() . '" />';
        }

        if (count($string) > 0) {
            $string = array_merge(['<!-- Schema.org markup for Google+ -->'], $string);
        }

        return implode(PHP_EOL, $string);
    }
}
