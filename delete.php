<?php
include "db_conn.php";
$id = $_GET['id'];


$sql = "DELETE FROM `contacts_tb` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index.php?msg=Record has been deleted");
}
else{
    echo "Failed: " .mysqli_error($conn);
}

?>