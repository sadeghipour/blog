<?php
namespace App\Controllers\Admin;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller{


    function initialize(){

        $this->view->setViewsDir($this->view->getViewsDir()."Admin/");
        if($this->session->get("adminId")){
            $this->view->setLayout("index");
        }
        else{
            $this->view->setLayout("login");
            if($this->request->getURI()!="/admin/login"){
                $this->response->redirect("admin/login");
            }
        }
//        var_dump("in base");exit;
    }

}
