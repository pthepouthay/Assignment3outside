<?php

    class ListUsers implements ControllerAction{

        function processGET(){
            $contactDAO = new UsersDAO();
            $contacts = $contactDAO->getUsers();
            $_REQUEST['contacts']=$contacts;
            return "views/listUsers.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class AddUsers implements ControllerAction{

        function processGET(){
            return "views/addUsers.php";
        }

        function processPOST(){
 

            $username=$_POST['username'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $users = new Users();
            $users->setUsername($username);
            $users->setEmail($email);
            $users->setPasswd($passwd);
            $users->setFName($fname);
            $users->setLName($lname);                       
            $contactDAO = new UsersDAO();
            $contactDAO->addContact($users);
            header("Location: controller.php?page=list");
            exit;
       
       

    }

        function getAccess(){
            return "PUBLIC";
        }      

    }

    class DeleteUsers implements ControllerAction{

        function processGET(){
//            $userID = $_GET['contactID'];
            return 'views/delUser.php';

        }

        function processPOST(){
            $contactid=$_POST['contactID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $contactDAO = new UsersDAO();
                $contactDAO->deleteContact($contactid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            
 
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $UsersDAO = new UsersDAO();
            $found=$UsersDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
            }
            header($nextView);
            exit; 
            
            
            
            
        }
        function getAccess(){
            return "PUBLIC";
        }

    }

    class Home implements ControllerAction{

        function processGET(){
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }


    class Topic implements ControllerAction{

        function processGET(){

            
            return "views/blog.php";
        }

        function processPOST(){

            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class Admin implements ControllerAction{

        function processGET(){

            
            return "views/admin.php";
        }

        function processPOST(){

            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }
    class Author implements ControllerAction{
        function processGET(){
            return "views/AuthorHome.php";

        }

        function processPOST(){
            return;

        }

        function getAccess(){
            return "PUBLIC";

        }
    }

    class addArticle implements ControllerAction{
        function processGET(){
            return "views/addArticle.php";

        }

        function processPOST(){
            return;

        }

        function getAccess(){
            return "PUBLIC";

        }
    }
    class manageArticle implements ControllerAction{
        function processGET(){
            return "views/AuthorHome.php";

        }

        function processPOST(){
            return;

        }

        function getAccess(){
            return "PUBLIC";

        }
    }

    


?>