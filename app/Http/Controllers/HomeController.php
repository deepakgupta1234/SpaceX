<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    //

    public function index()
    {
    	$client = new \GuzzleHttp\Client();
    	$response = $client->request('GET', 'https://api.spacexdata.com/v3/launches/upcoming');
    	$response->getHeaderLine('content-type');
    	if($response->getStatusCode()==200){
    		$data['top10Launch']=json_decode($response->getBody()->getContents());
    	}
    	return view('launch_data',$data);
    }
}
