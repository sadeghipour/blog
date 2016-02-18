<?php

namespace App\Controllers\Blog;
use App\Models\Category;
use App\Models\Comments;
use App\Utility\MESSAGES;
use App\Utility\ReturnVO;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use App\Models\Posts;
use App\Utility\Logic;
class ApiController extends ControllerBase{

    function getIndexAction(){
        $res = new Response();
        $vo = new ReturnVO();
        $post = Posts::find()->getLast();
        if($post){
            $vo->success["title"] = str_replace("#"," ",$post->title);
            $vo->success["body"] = $post->body;
        }

        return $res->setJsonContent($vo);
    }

    function getHotCatAction(){
        $req = new Request();
        $res = new Response();
        $vo = new ReturnVO();
        $catCount = [];
        $categoories = Category::find()->toArray();
        if(count($categoories)!=0){
            foreach ($categoories as $category) {
                $pcount = count(Posts::find(array("category=?0","bind"=>array($category["id"])))->toArray());
                array_push($catCount,array("title"=>$category["title"],"count"=>$pcount,"id"=>$category["id"]));
            }

            usort($catCount, function($a, $b) {
                return $b['count'] - $a['count'];
            });

            $vo->success = $catCount;
        }
        else {
            $vo->fail = MESSAGES::EMPTY_ARRAY;
        }
        return $res->setJsonContent($vo);
    }

    public function getCommentsAction(){
        $res = new Response();
        $vo = new ReturnVO();
        $posts = Posts::find()->toArray();
        $returnArr = [];
        if(count($posts)!=0){
            foreach ($posts as $item) {
                $comment = Comments::findFirst(array("post_id=?0 and is_active=1","bind"=>array($item["guid"])));
                if($comment){
                    array_push($returnArr,$comment);
                }
            }
            if(count($returnArr)!=0){
                $vo->success = $returnArr;
            }else{
                $vo->fail = MESSAGES::EMPTY_ARRAY;
            }
        }
        return $res->setJsonContent($vo);
    }

    function showRandomMyPicAction(){
        $imgArr = ["/img/me100x100.png",
            "/img/me.png"
        ];
        $randImage = $imgArr[rand(0,count($imgArr)-1)];
        return $this->response->setJsonContent(array("me"=>$randImage));
    }

    function getXmlAction(){
        $res = new Response();
        $result = file_get_contents('http://digg.com/rss/index.xml', true);
        return $res->appendContent(json_encode(simplexml_load_string($result)));
    }

    function _disquesCallBackAction(){
        $req = new Request();
        $res = new Response();
        $vo = new ReturnVO();
    }

    function getFeaturedPostsAction(){
        $req = new Request();
        $res = new Response();
        $vo = new ReturnVO();
        $fPosts = Posts::find(array("is_featured=1"))->toArray();
        $vo->success = $fPosts;
        return $res->setJsonContent($vo);

    }

    function getRecentPostsAction(){
        $req = new Request();
        $res = new Response();
        $vo = new ReturnVO();
        $fPosts = Posts::find(array("limit"=>"5","order by"=>"create_date desc"))->toArray();
        $vo->success = $fPosts;
        return $res->setJsonContent($vo);
    }
}