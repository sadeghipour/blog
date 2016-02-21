<?php
namespace App\Controllers\Blog;


use App\Models\Posts;
use App\Utility\CONSTS;
use App\Utility\ReturnVO;
use Phalcon\Http\Request;
use Phalcon\Http\Response;

class IndexController extends ControllerBase{

    public function indexAction(){
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

    }

    public function menuAction(){

    }

}
