<?php
namespace Genetsis\Seo\Providers\Facebook;

/**
 *
 */
class Facebook
{
    /** @var string $app_id */
    private $app_id;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * @param string $app_id
     * @return Facebook
     */
    public function setAppId($app_id)
    {
        $this->app_id = $app_id;
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
     * @return Facebook
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


    /**
     * @inheritDoc
     */
    function __toString()
    {
        $string = [];

        if ($this->getAppId()) {
            $string[] = '<meta property="fb:app_id" content="' . $this->getAppId() . '" />';
        }

        if ($this->getType()) {
            $string[] = '<meta name="og:type" content="' . $this->getType() . '" />';
        }

        return implode(PHP_EOL, $string);
    }
}
