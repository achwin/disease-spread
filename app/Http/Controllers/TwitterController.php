<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class TwitterController extends Controller
{
	public function index()
	{
		return view('tweet');
	}

	public function getTweets(Request $request)
	{
		$attributes = $request->all();
		$response = \GoogleMaps::load('geocoding')
		->setParam (['address' =>'surabaya'])
		->get('results.geometry.location');
		$geocode = $response['results'][0]['geometry']['location']['lat'].','.$response['results'][0]['geometry']['location']['lng'];
		if ($attributes['keyword'] == 'tbc') {
			$queries = [
			'Tuberculosis',
			'Tuberkulosis',
			'TBC',
			'TB paru',
			'Obat Anti TB (OAT)',
			'penyakit TB',
			'Mycobacterium tuberculosae',
			'Mycobacterium tuberculosis',
			'pulmonary TB',
			'TB infection',
			'infeksi TB',
		];
	}
	elseif ($attributes['keyword'] == 'dbd') {
		$queries = [
			'demam berdarah',
			'demam berdarah dengue',
			'dengue',
			'dengue fever',
			'nyamuk aedes',
			'aedes aegypti',
			'demam dengue',
			'nyamuk demam berdarah',
		];
	}
		$tweets = array();
		foreach ($queries as $query) {
    			$client = new Client(); //GuzzleHttp\Client
    			$result = $client->post('localhost:3000/get-tweets', [
    				'form_params' => [
    					'query'   => $query,
    					'since'	  => $attributes['since'],
    					'until'	  => $attributes['until'],
    					'geocode' => $geocode,	
    				]
    			]);
    	$tweets = $tweets + json_decode($result->getBody(),true);			
    		}
    	\Excel::create('Tweets '.$attributes['keyword'], function($excel) use($tweets){
            $excel->sheet('sheet1', function($sheet) use($tweets){
                $data = array();
                $no = 0;
                foreach ($tweets as $tweet) {
                    $data[] = array(
                        ++$no,
                        $tweet['date'],
                        $tweet['text'],
                        $tweet['location'],
                    );
                }
                $sheet->fromArray($data, null, 'A1', false, false); 
                $headings = array('No','Date','Text','Location');
                $sheet->prependRow(1, $headings);
            });
            })->export('xlsx');
    }
}
