<?php
   include_once "models/TopicsDAO.php";
      if(isset($_SESSION['loggedin'])){
        $status="Logged In";
        $class="disabled";
      }else{
        $status="Login";
        $class="";
      }
    $topicsDAO = new TopicsDAO();
    $topics = $topicsDAO->getTopics();


?>
<header>


    <div class="text-center">
    <a class="navbar navbar-light bg-light" href="controller.php?page=home">
      <img src="images/lion.png" alt="Song" width="90" class="rounded mx-auto d-block">
    </a>
    </div>
 


 <h3 class="text-center">CS 2033: SONGDB</h3>

  <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="nav-link active" aria-current="page" href="controller.php?page=home">Home</a>
    <a class="nav-link active" aria-current="page" href="controller.php?page=about">About</a>
    <a class="nav-link active" aria-current="page" href="controller.php?page=list">List</a>
    <a class="nav-link active" aria-current="page" href="controller.php?page=admin">Admin</a>
    <a class="nav-link active" aria-current="page" href="controller.php?page=author">Author</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-primary dropdown-toggle" href="controller.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Topics
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <form action="controller.php" method="GET">
          <input type="hidden" name="page" value="blogTopic">
          <?php
          for($index=0;$index<count($topics);$index++){
            echo "<li><button class= \"dropdown-item\"  type=\"submit\" id=\"name\" name=\"name\" value=\"".$topics[$index]->getName().  "\">" .$topics[$index]->getName()."</button></li>";

        }
          ?>
            </form>
          </ul>
        </li>
      </ul>
      
      <a class="btn btn-primary <?php echo $class; ?>" href="controller.php?page=login"><?php echo $status; ?></a> 
      
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>  
  </div>
</nav>
  
