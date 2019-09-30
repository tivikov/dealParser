<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Product;

class ParserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {

        $client = new Client();
        $guzzleClient = new GuzzleClient(array(
        'timeout' => 60,
        ));
        $client->setClient($guzzleClient);

        $crawler = $client->request('GET', 'https://www.shareasale.com/dealdatabase2.xml');


        // remove database

       Product::truncate();

        $crawler->filter('item')->each(function ($node, $i) {

            $product = new Product;
            
            $product->title = $node->filter('title')->text();
            $product->link = $node->filter('link')->text();
            $product->guid = $node->filter('guid')->text();
            $product->pub_date = date('Y-m-d H:i:s', strtotime($node->filter('pubDate')->text()));
            $product->description = $node->filter('description')->text();
            $product->deal_start_date = date('Y-m-d', strtotime($node->filter('dealstartdate')->text()));
            $product->deal_end_date = date('Y-m-d', strtotime($node->filter('dealenddate')->text()));
            $product->deal_publish_date = date('Y-m-d', strtotime($node->filter('dealpublishdate')->text()));
            $product->deal_edit_date = date('Y-m-d', strtotime($node->filter('dealeditdate')->text()));
            $product->coupon = $node->filter('couponcode')->text();
            $product->tracking_url = $node->filter('trackingurl')->text();
            $product->restrictions = $node->filter('restrictions')->text();
            $product->keywords = $node->filter('keywords')->text();
            $product->category = $node->filter('category')->text();
            $product->commission_percentage = (int)($node->filter('commissionpercentage')->text());
            $product->merchantID = (int)($node->filter('merchantID')->text());
            $product->merchant_name = $node->filter('merchantname')->text();
            $product->deal_title = $node->filter('dealtitle')->text();
            $product->image_big = $node->filter('imagebig')->text();
            $product->image_small = $node->filter('imagesmall')->text();
            $product->html_of_deal = $node->filter('htmlofdeal')->text();

           
            $product->save();
            
           
           
        });

        return view('pages.parser');
        //var_dump($items);
    }
}
