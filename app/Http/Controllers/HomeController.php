<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    private $endpoint;

    function __construct()
    {
    	$this->endpoint='https://api.spacexdata.com/v3/';
    }

    public function index()
    {

    	$client = new \GuzzleHttp\Client();
    	$response = $client->request('GET', $this->endpoint.'launches/upcoming');
    	if($response->getStatusCode()==200){
    		$data['top10Launch']=array_slice(json_decode($response->getBody()->getContents()),0,10);
    	}
    	return view('launch_data',$data);
    }

    public function launches()
    {
    	$client = new \GuzzleHttp\Client();
    	$response = $client->request('GET', $this->endpoint.'launches');
    	if($response->getStatusCode()==200){
    		$data['top10Launch']=json_decode($response->getBody()->getContents());
    	}
    	return view('launch_data',$data);
    }
}
