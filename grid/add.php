<?php
include "config.php";
if (isset($_POST["submit"])) {
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
    $sql = "INSERT INTO `products`(`product_name`, `product_desc`, `product_image`, `price`) VALUES ('$product_name','$product_desc','$data_file','$price')";
    $result = $conn->query($sql);
    header("Location: http://localhost/grid/grid.php");
    $conn->close();
}
?>
