<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UrlList;

class UrlController extends Controller
{
    //
    public function list() {
        return UrlList::all();
    }

    public function add(Request $request) {
        $urllist = new UrlList();
        $urllist->url = $request->url;
        $urllist->timeout = $request->timeout;
        $urllist->user_id = 1;
        $urllist->save();
    }

    public function del($id){
        $urllist = UrlList::find($id);
        $urllist->delete();
    }

    public function checkUrl(Request $request) {
        $urllist = new UrlList();
        $urllist->url = $request->url;
        $ch = curl_init($request->url); //get url http://www.xxxx.com/cru.php?url=http://www.example.com
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        if($response)
        {
        echo 'Time taken '.$info['total_time'];
        echo 'Took ' . $info['total_time'] . ' seconds to transfer a request to ' . $info['url'];
        if($info['total_time'] < $request->timeout){
            return 0;
        }
        return 1;
        }
      
    }
}
