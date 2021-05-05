<?php 

namespace App\Helpers;

use Config\Services;

if(!function_exists('getSegment')) {
    function getSegment($number) 
    {
        $request = Services::request();
        
        if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number)) {
            return $request->uri->getSegment($number);
        }  else {
            return false;
        }
    }
}
