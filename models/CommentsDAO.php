<?php
    include_once 'Comments.php';

    class CommentsDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
                
            }
            return $mysqli;
        }


        public function getComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments"); 
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

        public function deleteComment($comID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comments WHERE comID = ?");
            $stmt->bind_param("i", $comID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function updateComment($comment){
            $connection = $this->getConnection();
            $stmt = $connection->prepare("UPDATE comments set name = ? where comID = ?");
            $stmt->bind_param("si", $comment->getContent(), $comment->getComId());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }




    }


?>