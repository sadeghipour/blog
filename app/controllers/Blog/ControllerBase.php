<?php
namespace App\Controllers\Blog;
use App\Models\VisitIp;
use App\Utility\Logic;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    function initialize(){
        $this->view->setViewsDir($this->view->getViewsDir()."Blog/");
        $clientAddress = $this->request->getClientAddress();
        $logic = new Logic();
        $url = $this->request->getURI();

        if(count(VisitIp::find())>1000){
            $v = VisitIp::find()->getLast();
            $v->delete();
        }

        //TODO: log all income requests to site
        $logic->logUser($url,$clientAddress);
    }
}
