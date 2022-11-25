<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>

<body>
    
<div class="grid-container">
  <div class="item1"><h1>Productlist</h1>
    </div>
    <div class="item2"><button class="btn-product" data-toggle="modal" data-target="#modal">
          Add products
      </button></div>
  
  <?php
  $data = datageting();
  $i = 3;
  if($data!=''){
  foreach ($data as $key => $value) { ?>
    <div class="item<?php echo $i; ?>">
  <div class="dropdown">
  <button onclick="myFunction(this)" data-id="myDropdown<?php echo $i; ?>" class="dropbtn">...</button>
 
  <button id="myDropdown<?php echo $i; ?>" class="dropdown-content">
  <a href="view.php?id=<?php echo $value["product_id"]; ?>">Edit</a>
  <a href="delete.php?id=<?php echo $value["product_id"]; ?>">Delete</a>
    </button>
</div>
<img class="wheel" src="<?php echo $value["product_image"]; ?>">
<h3><?php echo $value["product_name"]; ?></h3>

<p><?php echo $value["product_desc"]; ?></p>
<p><?php echo $value["price"]; ?></p>
  </div>  <?php $i++;}}
  ?>
<div id="modal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Product Details</h1>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="add.php">
                                     <div class="form-group">
                        <label for="Product name:" class="control-label">Product name:</label>
                        <div>
                            <input id="product_name" type="text" class="form-control" name="product_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Product description:" class="control-label">Product description:</label>
                        <div>
                            <input id="product_description" type="text" class="form-control"  name="product_desc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Product image:" class="control-label">Product image:</label>
                        <div>
                            <input id="product_image" type="file" class="form-control" name="product_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price:" class="control-label">price:</label>
                        <div>
                            <input id="price:" type="number" class="form-control" name="price">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">
                               Save
                            </button>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction(_this) {
        $xx = jQuery(_this).attr('data-id');
  document.getElementById ($xx).classList.toggle("show");
//   jQuery(_this).children('#myDropdown').toggle("show");
 
}
function deletefunction(_this){
    
    $xx = jQuery(_this).attr('data-id');
 }
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
</html>


 