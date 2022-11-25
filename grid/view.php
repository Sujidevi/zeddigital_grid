<?php
include "config.php";
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];

    $sql = "SELECT * FROM `products` WHERE `product_id`='$product_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_name = $row["product_name"];
            $product_desc = $row["product_desc"];
            // $currentDirectory = getcwd();
            $makefilepath = "C:/xampp/htdocs/grid/uploads/";
            $price = $row["price"];
            $image_url = $row["product_image"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
    .form-control{width: 40%;   }
</style>
</head>
<body>
   <h2>Product Update Form</h2>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="update.php">
                                     <div class="form-group">
                        <label for="Product name:" class="control-label">Product name:</label>
                        <div>
                            <input id="product_name" type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                        </div>
                    </div>
                    <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_id; ?>">
                    <div class="form-group">
                        <label for="Product description:" class="control-label">Product description:</label>
                        <div>
                            <input id="product_description" type="text" class="form-control"  name="product_desc" value="<?php echo $product_desc; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Product image:" class="control-label">Product image:</label>
                        <div>
                          
                            <input type="file" class="form-control" id="product_image"  name="product_image" required >
                            <p>Existing Image URL:<?php echo $image_url; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price:" class="control-label">price:</label>
                        <div>
                            <input id="price:" type="number" class="form-control" name="price" value="<?php echo $price; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary" name="update" value="update">
                            update
                            </button>
                           
                        </div>
                    </div>
                </form>
        </body>
        </html> 

