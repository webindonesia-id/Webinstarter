<?php 

namespace App\Helpers;

use Config\Services;

if(!function_exists('navsegment')) {
    function navsegment($number) 
    {
        $request = Services::request();

        if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number)) {
            return $request->uri->getSegment($number);
        }  else {
            return false;
        }
    }
}
