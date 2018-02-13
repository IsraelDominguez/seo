<?php
namespace Genetsis\Seo\Providers\Web;

/**
 *
 */
class Web
{
    /** @var string $title */
    protected $title = '';
    /** @var string $description */
    protected $description = '';
    /** @var string $url */
    protected $url = '';
    /** @var string $image */
    protected $image = '';
    /** @var string $author */
    protected $author = '';
    /** @var string $copyright */
    protected $copyright = '';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Web
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
     * @return Web
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Web
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Web
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Web
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     * @return Web
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $string = [];

        if ($this->getTitle()) {
            $string[] = '<title>' . $this->getTitle() . '</title>';
        }
        if ($this->getDescription()) {
            $string[] = '<meta name="description" content="' . $this->getDescription() . '" />';
        }
        if ($this->getAuthor()) {
            $string[] = '<meta name="author" content="' . $this->getAuthor() . '" />';
        }
        if ($this->getCopyright()) {
            $string[] = '<meta name="copyright" content="' . $this->getCopyright() . '" />';
        }
        if ($this->getImage()) {
            $string[] = '<meta itemprop="image" content="' . $this->getImage() . '" />';
        }
        if ($this->getUrl()) {
            $string[] = '<link href="'.$this->getUrl().'" rel="canonical" />';
        }

        return implode(PHP_EOL, $string);
    }

}
