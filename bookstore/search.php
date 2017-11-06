<?php include 'includes/db.php'; ?>

<?php
if(isset($_GET['search_category']))
     $the_book_category= $_GET['search_category'];
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Minar</title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="index.php">
         <img src="images/logo.png"width="90"  alt="logo"> Book Minar
     </a> 
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
         <li class="nav-item">
             <a class="nav-link" href="index.php">HOME</a>             
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.php">ACADEMIC BOOKS</a>             
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.php">RESEARCH PAPERS</a>             
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.php">NOVELS</a> 
         </li>            
         <li class="nav-item">
             <a class="nav-link" href="index.php">MAGAZINES</a>             
         </li>
         
         <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="User Name" aria-label="User name">
       <input class="form-control mr-sm-2" type="search" placeholder="Password" aria-label="Password">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Login</button>
    </form>
         
     </ul> 
       </div> 
        
            
    </nav>
    <br><br>
    <div class="row">
    <div class="col-lg-2 ">
    <ul class="list-group" id="tab-list" role="tablist" style="margin-left:0px">
        <li class="list-group-item "><a href="#">ACADEMIC BOOKS</a></li>
  <li class="list-group-item">RESEARCH PAPERS</li>
  <li class="list-group-item">NOVELS</li>
  <li class="list-group-item">MAGAZINES</li>
  <li class="list-group-item">MISCELLANEOUS</li>
</ul>
     </div>
     <span class="col-lg-10">
     <?php 
       $query="SELECT * FROM books WHERE book_category='$the_book_category'";
       $all_books=mysqli_query($connection,$query);     
        if(!$all_books)
        {
            echo "query failed";
        }
       while($row=mysqli_fetch_assoc($all_books))
        {   
           $the_book_id=$row['book_id'];
           $the_book_name=$row['book_name'];
           $the_book_image=$row['book_image'];
           $the_book_category=$row['book_category'];
           $the_book_author=$row['book_author'];
           $the_book_price=$row['book_price'];
       
         ?>     
     
   <div class="card col-lg-3 mr-2 ml-2 mb-4" style="width: 20rem; height:28rem; float:left"><br>
     <img class="card-img-top" style="width:160px; height:180px; margin: 0 auto" src="images/<?php echo $the_book_image; ?>" alt="Book image">
  <div class="card-body">
    <h3 class="card-title text-center"><?php echo $the_book_name; ?> </h3>
    <h5 class="card-text text-center"><?php echo $the_book_author; ?></h5>
     <h6 class="card-text text-center"><?php echo $the_book_price; ?> Rs.</h6>
       </div>
    <a href="book.php?book_id=<?php  echo $the_book_id; ?>" class="btn btn-primary btn-lg">Buy it now</a><br>
  </div>

 <?php } ?>
  
   
  
  
    
         </span>
   
    </div>
    
    
    
    
    
</body>
</html>