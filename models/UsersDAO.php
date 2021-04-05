<?php
    include_once 'Users.php';

    class UsersDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
                
            }
            return $mysqli;
        }

        public function addContact($contact){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO users (username, lastname, firstname, password, email ) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $contact->getUsername(), $contact->getLName(), $contact->getFName(), $contact->getPasswd(), $contact->getEmail());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteContact($userID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $contact = new Users();
                $contact->load($row);
                $contacts[]=$contact;
            }    
            $stmt->close();
            $connection->close();
            return $contacts;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }



    }
?>
