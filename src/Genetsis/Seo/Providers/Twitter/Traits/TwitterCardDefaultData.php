<?php
namespace Genetsis\Seo\Providers\Twitter\Traits;

/**
 * @link https://dev.twitter.com/cards/types/summary
 */
trait TwitterCardDefaultData
{
    /** @var string $site */
    protected $site = '';
    /** @var string $title */
    protected $title = '';
    /** @var string $description */
    protected $description = '';
    /** @var string $image */
    protected $image = '';

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param string $site
     * @return TwitterCardDefaultData
     */
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
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
     * @return TwitterCardDefaultData
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
     * @return TwitterCardDefaultData
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
     * @return TwitterCardDefaultData
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
}
