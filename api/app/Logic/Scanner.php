<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.09.20
 * Time: 15:44
 */

namespace App\Logic;
use GuzzleHttp;
use GuzzleHttp\Promise;


/**
 * Class Scanner
 * @package App\Logic
 */
class Scanner
{
    /**
     * @var string
     */
    private $base = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';

    /**
     * @var string
     */
    private $url = '';


    /**
     * Scanner constructor.
     * @param $url
     * @param $params
     */
    public function __construct($url)
    {
        $this->setUrl($url);
    }

    public function go()
    {
        $url = $this->getUrl();

        $client = new GuzzleHttp\Client(['base_uri' => $this->getBase()]);

        $promises = [
            'mobile'  => $client->getAsync('?url='.$url.'&locale=en&strategy=desktop'),
            'desktop' => $client->getAsync('?url='.$url.'&locale=en&strategy=mobile')
        ];

        return Promise\settle($promises)->wait();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        // TODO Fix this crunch
        return 'https://'.$this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }
}
