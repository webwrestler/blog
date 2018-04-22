<?php

class Post{

     public static function getPostItemId($id) {

         $id = intval($id);

         if ($id){
         $dataBasa = DataBasa::getConnection();
         $result = $dataBasa->query( "SELECT Post.id, Post.title, Post.short_content, Post.content, Post.date, Users.FirstName, Users.LastName 
         FROM Post 
         INNER JOIN Users 
         ON Post.users_id = Users.UsersId WHERE Post.id =" . $id);
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $newItem = $result->fetch();
         return $newItem;
         }
     }

     public static function getPostList(){

         $dataBasa = DataBasa::getConnection();

         $newList = array();

         $sql = "SELECT Post.id, Post.title, Post.short_content, Post.content, Post.date, Users.FirstName, Users.LastName
                FROM Post 
                INNER JOIN Users
                ON Post.users_id = Users.UsersId
                ORDER BY date DESC Limit 5";

         $result = $dataBasa->query($sql);
         $result->setFetchMode(PDO::FETCH_ASSOC);

         $i = 0;

         $row = $result->fetch();

         while($row = $result->fetch()){
             $newList[$i]['id'] = $row['id'];
             $newList[$i]['title'] = $row['title'];
             $newList[$i]['short_content'] = $row['short_content'];
             $newList[$i]['content'] = $row['content'];
             $newList[$i]['date'] = $row['date'];
             $newList[$i]['Author'] = $row['FirstName'] . " " . $row['LastName'];
             $i++;
         }

         return $newList;

     }
}
?>