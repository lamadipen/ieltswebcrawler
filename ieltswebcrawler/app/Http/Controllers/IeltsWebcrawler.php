<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\IeltsWebcrawlerModel;

class IeltsWebcrawler extends Controller
{
    //
    public function index()
    {
        
        $curlInfo = IeltsWebcrawlerModel::findOrFail(1);
        
        /**
        $url = 'http://202.94.66.47/support/index.php/auth/create_user';
                //$url = 'https://support.classic.com.np/index.php/auth/create_user';
                
        $curl = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);               
        $agent = $_SERVER["HTTP_USER_AGENT"];
        curl_setopt($ch,CURLOPT_USERAGENT, $agent);
        curl_setopt($ch,CURLOPT_TIMEOUT, 200);
        curl_setopt ($ch,CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_POST, sizeof($user));
        curl_setopt($curl,CURLOPT_POSTFIELDS, $user);         
        $result = @curl_exec($curl);
        curl_close($curl);
        **/
    }
    
}
