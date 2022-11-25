<?php
include "config.php";
$product_id = $_GET["id"];
if ($product_id != "") {
    $sql = "delete FROM products WHERE product_id = $product_id";

    $result = $conn->query($sql);

    if ($result == true) {
        echo "Record deleted successfully.";
        header("Location: http://localhost/grid/grid.php");
    }
} else {
    echo "Error on deleting records";
}
?>
