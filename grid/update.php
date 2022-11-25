<?php include "config.php";
if (isset($_POST["update"])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_desc = $_POST["product_desc"];
    $makefilepath = "C:/xampp/htdocs/grid/uploads/";
    $fileName = $_FILES["product_image"]["name"];
    $fileSize = $_FILES["product_image"]["size"];
    $fileTmpName = $_FILES["product_image"]["tmp_name"];
    $fileType = $_FILES["product_image"]["type"];
    $fileExtension = strtolower(end(explode(".", $fileName)));
    $uploadPath = $makefilepath . basename($fileName);
    if (!is_dir($makefilepath)) {
        mkdir($makefilepath, 0777, true);
    }
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    $data_file = "http://localhost/grid/uploads/" . basename($fileName);
    $price = $_POST["price"];
    $sql = "UPDATE `products` SET `product_name`='$product_name',`product_desc`='$product_desc',`product_image`='$data_file',`price`='$price' WHERE `product_id`='$product_id'";
    $result = $conn->query($sql);
    if ($result == true) {
        echo "Record updated successfully.";
        header("Location: http://localhost/grid/grid.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
?>
</body>
</html> 
