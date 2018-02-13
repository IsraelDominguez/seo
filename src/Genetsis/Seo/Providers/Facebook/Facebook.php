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
     * @inheritDoc
     */
    function __toString()
    {
        return ($this->getAppId())
            ? '<meta property="fb:app_id" content="' . $this->getAppId() . '" />'
            : '';
    }
}
