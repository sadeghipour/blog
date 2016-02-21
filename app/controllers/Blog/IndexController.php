<?php
namespace App\Controllers\Blog;


use App\Models\Posts;
use App\Utility\CONSTS;
use App\Utility\ReturnVO;
use Phalcon\Http\Request;
use Phalcon\Http\Response;

class IndexController extends ControllerBase
{

    //if finish comment initialize func
//    function initialize(){
//        $isUndderConstruction = true;
//        if($isUndderConstruction){
//            $this->response->redirect("404");
//        }
//    }

    public function indexAction()
    {
        $url = urldecode(str_replace("/","",$this->request->getURI()));
        $posts = Posts::findFirst(array("title=?0","bind"=>array($url)));
        if($posts){
            $this->response->redirect(CONSTS::POSTS.$url);
        }
    }

    public function postsAction(){

    }


    public function contactAction(){

    }

    public function categoryAction(){

       // $this->view->setLayout("category");
    }

    public function menuAction(){

    }

}
