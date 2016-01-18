<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\IeltsWebcrawlerModel;

class IeltsWebcrawler extends Controller
{
    private $user_agents = array("Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16",
                                 "Mozilla/5.0 (X11; ; Linux i686; rv:1.9.2.20) Gecko/20110805",
                                 "Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201",
                                 "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/533.1 (KHTML, like Gecko) Maxthon/3.0.8.2 Safari/533.1",
                                 "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
                                 "Mozilla/5.0 (Windows; U; ; en-US) AppleWebKit/527+ (KHTML, like Gecko, Safari/419.3) Arora/0.8.0",
                                 "Mozilla/5.0 (X11; U; UNICOS lcLinux; en-US) Gecko/20140730 (KHTML, like Gecko, Safari/419.3) Arora/0.8.0",
                                 "Mozilla/5.0 (X11; U; Linux; de-DE) AppleWebKit/527+ (KHTML, like Gecko, Safari/419.3)  Arora/0.8.0",
                                 "Mozilla/5.0 (compatible; MSIE 9.0; AOL 9.7; AOLBuild 4343.19; Windows NT 6.1; WOW64; Trident/5.0; FunWebProducts)",
                                 "Mozilla/4.0 (compatible; MSIE 8.0; AOL 9.7; AOLBuild 4343.27; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)",
                                 "Galaxy/1.0 [en] (Mac OS X 10.5.6; U; en)",
                                 "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_1; nl-nl) AppleWebKit/532.3+ (KHTML, like Gecko) Fluid/0.9.6 Safari/532.3+",
                                 "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.19) Gecko/20081217 KMLite/1.1.2",
                                 "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.3a) Gecko/20021207 Phoenix/0.5",
                                 "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.4a) Gecko/20030411 Phoenix/0.5",
                                 "Mozilla/1.10 [en] (Compatible; RISC OS 3.70; Oregano 1.10)",
                                 "Mozilla/6.0 (X11; U; Linux x86_64; en-US; rv:2.9.0.3) Gecko/2009022510 FreeBSD/ Sunrise/4.0.1/like Safari",
                                 "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_5; ja-jp) AppleWebKit/525.18 (KHTML, like Gecko) Sunrise/1.7.5 like Safari/5525.20.1",
                                 "Dillo/2.0",
                                 "Mozilla/4.0 (compatible; MSIE 7.0; America Online Browser 1.1; Windows NT 5.1; (R1 1.5); .NET CLR 2.0.50727; InfoPath.1)",
                                 "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20100121 Firefox/3.5.6 Wyzo/3.5.6.1",
                                 "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1pre) Gecko/20090629 Vonkeror/1.0",
                                 "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A",
                                 "Mozilla/5.0 (Windows NT 5.2; RW; rv:7.0a1) Gecko/20091211 SeaMonkey/9.23a1pre",
                                 "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; ja-jp) AppleWebKit/419 (KHTML, like Gecko) Shiira/1.2.3 Safari/125",
                                 "Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1b5pre) Gecko/20090424 Shiretoko/3.5b5pre",
                                 "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; SlimBrowser)"
                                );
                                
    private $referer_array = array("https://search.yahoo.com/",
                                 "https://www.yahoo.com/",
                                 "https://duckduckgo.com/",
                                 "http://www.bing.com/",
                                 "http://blekko.com/",
                                 "http://search.carrot2.org/stable/search",
                                 "http://www.chacha.com/",
                                 "http://yippy.com/",
                                 "http://www.cluuz.com/",
                                 "http://deeperweb.com/",
                                 "http://www.dmoz.org/",
                                 "http://www.dogpile.com/",
                                 "https://search.yahoo.com/",
                                 "http://www.hakia.com/",
                                 "http://www.search.com/",
                                 "http://www.metagopher.com/",
                                 "http://msxml.excite.com/",
                                 "http://www.webcrawler.com/"                                       
                                );
                                
                                
                                                           
    //
    public function index()
    {
        
        $curlInfo = IeltsWebcrawlerModel::findOrFail(1);
        
        var_dump($curlInfo->id);
        var_dump($curlInfo->curl_date);
        var_dump($curlInfo->curl_count);
        var_dump($curlInfo->ietls_date);
        $curl_count = $curlInfo->curl_count;
        
        //** getting random user agent
        $size_of_user_agents = sizeof($this->user_agents) - 1;        
        $rand_user_agent_key = mt_rand(0,$size_of_user_agents );        
        $agent = $this->user_agents[$rand_user_agent_key];
        
        //** getting random referer
        $size_of_referer_array = sizeof($this->referer_array) - 1;
        $rand_referer_key = mt_rand(0,$size_of_referer_array );        
        $referer = $this->referer_array[$rand_referer_key];
        
        //initilizing curl
        $curl = curl_init();
        //url to make curl request
        //$url = 'https://ielts.britishcouncil.org/CountryExamSearch.aspx';
        $url = 'https://ielts.britishcouncil.org/nepal';     
        //logic to select curl options        
        if($curl_count == 1)
        {
           $curlInfo->curl_count = 1+1;
           curl_setopt($curl,CURLOPT_USERAGENT, $agent); 
        }
        else if($curl_count == 2)
        {
            $curlInfo->curl_count = 2+1;
            curl_setopt ($curl,CURLOPT_REFERER, $referer);
        }
        else if($curl_count ==3)
        {
           $curlInfo->curl_count = 3+1;           
        }
        else if($curl_count ==4)
        {
           $curlInfo->curl_count = 4+1;
                        
        }
        else if($curl_count ==5)
        {
           $curlInfo->curl_count = 1;
           
        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);               
        curl_setopt($curl,CURLOPT_TIMEOUT, 200);        
        //TRUE to return the transfer as a string of the return value
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($curl,CURLOPT_URL, $url);
        //curl_setopt($curl,CURLOPT_POST, sizeof($user));
        //curl_setopt($curl,CURLOPT_POSTFIELDS, $user);         
        $result = @curl_exec($curl);
        curl_close($curl);
    
        $firts_sel_tag = strpos($result,'ctl00$ContentPlaceHolder1$ddlDateMonthYear');
        $second_sel_tag = strpos($result,'ctl00$ContentPlaceHolder1$ddlTownCityVenue');
  
        $text_between = substr($result, $firts_sel_tag, $second_sel_tag);
        
        print_r($text_between);
        
        if (strpos($result,'There currently are no test dates available') !== false) {
            echo "Not Available";
        }
        else
        {
            echo "<label color='green'>Available<label>". $agent;
        }
        
        //$curlInfo->save();
    }
    
}
