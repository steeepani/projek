<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MySQL - CRUD</title>
    <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center; margin: 50px 0;">Simple PHP CRUD with MySQL</h1>
        <div class="container">
            <form action="adddata.php" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>

                        </select>
                    </div>

                </div>
            </form>
        </div>
    </section>
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
              </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM results";
                    if ($result = $conn ->query($sql_query)) {
                        while ($row = $result -> fetch_assoc()) {
                            $name = $row['name'];
                            $kelas = $row['email'];
                            $nilai = $row['Phone Number'];
?>

<tr class="trow">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $kelas; ?></td>
                    <td><?php echo $nilai; ?></td>
                    <td><a href="updatedata.php?id=<?php echo $Id; ?>"class="btn btn-primary">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                    <?php
                            }
                        }
                    ?>
                </tbody>
                    </table>
                    </div>
</body>
</html>