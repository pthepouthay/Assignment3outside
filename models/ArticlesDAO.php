<?php
    include_once 'Articles.php';

    class ArticlessDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
                
            }
            return $mysqli;
        }


        public function getArticles(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $contact = new Topics();
                $contact->load($row);
                $contacts[]=$contact;
            }    
            $stmt->close();
            $connection->close();
            return $contacts;
        }

        public function deleteArticle($artID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM articles WHERE artID = ?");
            $stmt->bind_param("i", $artID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function addArticle($title,$content){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO articles (title,content) VALUES($title,$content)");
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }



    }


?>