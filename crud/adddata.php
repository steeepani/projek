<?php
include 'koneksi.php';
?>
<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){    

        $nama = $_POST['Name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];

        if($name != "" && $email != "" && $phone != ""){
            $sql = "INSERT INTO results (`Name`, `Email`, `Phone`) VALUES ('$nama', '$email' $phone)";
            if (mysqli_query(mysql: $conn, query: $sql)) {
                header(header: "location: modulpraktek.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Name, Email, and Phone Number cannot be empty!";
        }
    }
?>