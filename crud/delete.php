<?php
include 'koneksi.php';
?>
<?php
    require_once "koneksi.php";
    $id = $_GET["id"];
    $query = "DELETE FROM results WHERE id = '$id'";
    if (mysqli_query(mysql: $conn, query: $query)) {
        header(header: "location: modulpraktek.php");

    } else {
        echo "Something went wrong. Please try again later.";
    }

?>