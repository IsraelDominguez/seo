<?php
namespace Genetsis\Seo\Providers\OpenGraph;

use Genetsis\Seo\Providers\Web\Web;

/**
 *
 */
class OpenGraph
{
    /** @var string $title */
    private $title = '';
    /** @var string $description */
    private $description = '';
    /** @var string $type */
    private $type = '';
    /** @var string $url */
    private $url = '';
    /** @var string $site_name */
    private $site_name = '';
    /** @var string $image */
    private $image = '';
    /** @var string $locale */
    private $locale = '';

    /**
     * OpenGraph constructor.
     * @param Web|null $basic Prefill data with a {@link Genetsis\Seo\Providers\Basic} object.
     */
    public function __construct(Web $basic = null)
    {
        if ($basic instanceof Web) {
            $this->setTitle($basic->getTitle());
            $this->setDescription($basic->getDescription());
            $this->setUrl($basic->getUrl());
            $this->setImage($basic->getImage());
        }
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return OpenGraph
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return OpenGraph
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return OpenGraph
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return OpenGraph
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->site_name;
    }

    /**
     * @param string $site_name
     * @return OpenGraph
     */
    public function setSiteName($site_name)
    {
        $this->site_name = $site_name;
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
     * @return OpenGraph
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return OpenGraph
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @inheritDoc
     */
    function __toString()
    {
        $string = [];

        if ($this->getTitle()) {
            $string[] = '<meta property="og:title" content="' . $this->getTitle() . '"/>';
        }
        if ($this->getDescription()) {
            $string[] = '<meta property="og:description" content="' . $this->getDescription() . '"/>';
        }
        if ($this->getType()) {
            $string[] = '<meta property="og:type" content="' . $this->getType() . '"/>';
        }
        if ($this->getUrl()) {
            $string[] = '<meta property="og:url" content="' . $this->getUrl() . '"/>';
        }
        if ($this->getSiteName()) {
            $string[] = '<meta property="og:site_name" content="' . $this->getSiteName() . '"/>';
        }
        if ($this->getImage()) {
            $string[] = '<meta property="og:image" content="' . $this->getImage() . '"/>';
        }
        if ($this->getLocale()) {
            $string[] = '<meta property="og:locale" content="' . $this->getLocale() . '" />';
        }

        if (count($string) > 0) {
            $string = array_merge(['<!-- Open Graph data -->'], $string);
        }

        return implode(PHP_EOL, $string);
    }
}
