<?php
include_once ROOT. '/models/Post.php';

class PostController{

    public function actionIndex(){
        $postList = array();
        $postList = Post::getPostList();

        require_once (ROOT . '/views/post/index.php');

        return true;
    }

    public function actionView($id){

        if($id){
            $postItem = Post::getPostItemId($id);
            require_once (ROOT . '/views/post/view.php');
            return true;
        }
        return true;
    }
}
?>