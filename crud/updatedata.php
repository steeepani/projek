<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "koneksi.php";
    if(isset($_POST["nama"]) && isset($_POST["Email"]) && isset($_POST["phone"])){
        $nama = $_POST['nama'];
        $email = $_POST['Email'];
        $phone = $_POST['phone'];
        $sql = "UPDATE results SET `nama` = '$nama', `Email`= '$email', `phone`= $phone WHERE id= ".$_GET["id"];
        if (mysqli_query(mysql: $conn, query: $sql)) {
            header(header: "location: modulpraktek.php");
        } else {}
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scael=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/boootstarp.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4mVow" crossorigin="anonymous">
    <!--JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php
                require_once "koneksi.php";
                $sql_query = "SELECT * FROM results WHERE id = ".$_GET["id"];
                if ($result = $conn ->query(query: $sql_query)) {
                    while ($row = $result -> fetch_assoc()) {
                        $Id = $row['id'];
                        $nama = $row['nama'];
                        $email = $row['Email'];
                        $phone = $row['phone'];
            ?>
                            <form action="updatedata.php?id=<?php echo $Id; ?>" method="post">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="" required="">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Email</label>
                                        <input type="email" name="Email" id="Email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Phone Number</label>
                                        <input type="number" name="phone" id="phone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-2" style="display: grid;align-items: flex-end;">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                    </div>
                            </div>
                        </form>
            <?php
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>