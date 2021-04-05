<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Article Creation</h5>
                        <p class="card-text">Add an article to the blog</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="add">
                            <label for="fname" class="form-label">Topic</label>
                            <input type="text" class="form-control mb-3" id="topic" name="topic" placeholder="Enter your Topic name" required>
                            <label for="lname" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Enter your Title Name" required>
                            <label for="username" class="form-label">Article Content</label>
                            <input type="text" class="form-control mb-3" id="articleContent" name="articleContent" placeholder="Write your Article" required>
                            <button class="btn btn-primary" type="submit" name="submit" >Submit</button>
                            
                            </form><input type="image" src= "/home/student/projects/assign3-song-inc/images/lion.png" alt="">
                    </div>
                </div>      
            </div>
        </div>
    </div>

    