<?php

$GLOBALS["servername"] = "localhost";

$GLOBALS["username"] = "root";

$GLOBALS["password"] = "";

$GLOBALS["dbname"] = "mydb";

$conn = new mysqli(
    $GLOBALS["servername"],
    $GLOBALS["username"],
    $GLOBALS["password"],
    $GLOBALS["dbname"]
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function datageting()
{
    $conn = new mysqli(
        $GLOBALS["servername"],
        $GLOBALS["username"],
        $GLOBALS["password"],
        $GLOBALS["dbname"]
    );
    $product_data = "SELECT * FROM `products`";
    $data=array();
    $result = mysqli_query($conn, $product_data);
    if (mysqli_num_rows($result) > 0 ) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$i]["product_id"] = $row["product_id"];
            $data[$i]["product_name"] = $row["product_name"];
            $data[$i]["product_desc"] = $row["product_desc"];
            $data[$i]["price"] = $row["price"];
            $data[$i]["product_image"] = $row["product_image"];
            $i++;
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    // print_r($data);
    return $data;
}
?>  