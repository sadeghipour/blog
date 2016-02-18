<?php
namespace App\Utility;
use App\Controllers\Blog\ControllerBase;
use App\Models\VisitIp;

class Logic extends ControllerBase{


    public static function getGUID(){
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

    }

    public function logUser($url,$ip){
        if($this->isValidUrl($url)){
            $visit_ip = new VisitIp();
            $visit_ip->ip = $ip;
            $visit_ip->date = date("Y-m-d H:i:s");
            $visit_ip->url = urldecode($url);
            $visit_ip->save();
        }
    }

    public function isValidUrl($url){
        $notValid = ["js","api","favicon","css","jpg","png","gif"];
        $returnValue = true;
        foreach ($notValid as $item) {
            if(strpos($url,$item)){
                $returnValue= false;
            }
        }
        return $returnValue;
    }
}