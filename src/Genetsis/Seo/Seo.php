<?php
namespace Genetsis\Seo;

use Genetsis\Seo\Providers\GooglePlus\GooglePlus;
use Genetsis\Seo\Providers\Twitter\Contracts\TwitterCardInterface;
use Genetsis\Seo\Providers\Twitter\SummaryCard;
use Genetsis\Seo\Providers\Web\Web;
use Genetsis\Seo\Providers\Facebook\Facebook;
use Genetsis\Seo\Providers\OpenGraph\OpenGraph;

/**
 *
 */
class Seo
{
    /** @var Web $web */
    private $web;
    /** @var OpenGraph $open_graph */
    private $open_graph;
    /** @var Facebook $facebook */
    private $facebook;
    /** @var TwitterCardInterface $twitter_card */
    private $twitter_card;
    /** @var GooglePlus $google_plus */
    private $google_plus;

    /**
     * Seo constructor.
     */
    public function __construct()
    {
        $this->web = new Web();
        $this->open_graph = new OpenGraph();
        $this->facebook = new Facebook();
        $this->twitter_card = new SummaryCard(); // Default Twitter Card.
        $this->google_plus = new GooglePlus();
    }

    /**
     * @return Web
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @param Web $web
     * @return Seo
     */
    public function setWeb(Web $web)
    {
        $this->web = $web;
        return $this;
    }

    /**
     * @return OpenGraph
     */
    public function getOpenGraph()
    {
        return $this->open_graph;
    }

    /**
     * @param OpenGraph $open_graph
     * @return Seo
     */
    public function setOpenGraph(OpenGraph $open_graph)
    {
        $this->open_graph = $open_graph;
        return $this;
    }

    /**
     * @return Facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param Facebook $facebook
     * @return Seo
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
        return $this;
    }

    /**
     * @return TwitterCardInterface
     */
    public function getTwitterCard()
    {
        return $this->twitter_card;
    }

    /**
     * @param TwitterCardInterface $twitter_card
     * @return Seo
     */
    public function setTwitterCard($twitter_card)
    {
        $this->twitter_card = $twitter_card;
        return $this;
    }

    /**
     * @return GooglePlus
     */
    public function getGooglePlus()
    {
        return $this->google_plus;
    }

    /**
     * @param GooglePlus $google_plus
     * @return Seo
     */
    public function setGooglePlus($google_plus)
    {
        $this->google_plus = $google_plus;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function __toString()
    {
        return implode(PHP_EOL, [
            (string)$this->getWeb(),
            (string)$this->getOpenGraph(),
            (string)$this->getFacebook(),
            (string)$this->getTwitterCard(),
            (string)$this->getGooglePlus()
        ]);
    }
}
