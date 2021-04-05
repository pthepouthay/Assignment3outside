<?php
    include_once 'Topics.php';

    class TopicsDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
                
            }
            return $mysqli;
        }


        public function getTopics(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM topics ORDER BY name ASC"); 
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

        public function deleteTopics($topID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM topics WHERE topID = ?");
            $stmt->bind_param("i", $topID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function updateContact($topic){
            $connection = $this->getConnection();
            $stmt = $connection->prepare("UPDATE contacts set name = ? where topID = ?");
            $stmt->bind_param("si", $topic->getName(),$topic->getTopId());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }




    }





?>
