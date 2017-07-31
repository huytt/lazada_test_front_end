<?php
namespace App\Http\Core\Util;
/**
 * Created by PhpStorm.
 * User: huytt
 * Date: 7/31/2017
 * Time: 7:09 PM
 */
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerLazada implements ICrawler
{
    protected $client;

    public function __construct()
    {
        $this->client = new GoutteClient();
        $guzzleClient = new GuzzleClient([
            'curl' => [CURLOPT_SSL_VERIFYPEER => false],
            'timeout' => 60,
        ]);
        $this->client->setClient($guzzleClient);
    }

    public function getProductSpecific($url){
        try {
            $spec_inf = [];
            $crawler = $this->client->request('GET', $url);
            $pName = $crawler->filter('#prod_title')->first()->text();
            $spec_inf['product_name'] = $pName;

            $price = $crawler->filter('#product_price')->first()->text();
            $spec_inf['Product Price'] = $price;

            $crawlerSpec = $crawler->filter('.specification-table tr');

            foreach ($crawlerSpec as $domRow) {
                $item_info = (new Crawler($domRow))->filter('td');
                $spec_inf[$item_info->getNode(0)->textContent] = $item_info->getNode(1)->textContent;
            }
            return $spec_inf;
        }catch (\Exception $e){
            return [];
        }
    }
}