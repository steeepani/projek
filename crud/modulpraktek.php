<?php
include 'koneksi.php'; // Pastikan file ini sudah benar
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
            <!-- Form Tambah Data -->
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="form-group col-lg-4">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="Email">E-mail</label>
                        <input type="email" name="Email" id="Email" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="phone" class="form-control" required>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <div class="container mt-5">
        <!-- Tabel Data -->
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Ambil data dari database
            $sql_query = "SELECT * FROM results";
            if ($result = $conn->query($sql_query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id']; // Ambil ID
                    $nama = $row['nama']; // Kolom 'nama'
                    $email = $row['Email']; // Kolom 'Email'
                    $phone = $row['phone']; // Kolom 'phone'
                    ?>
                    <tr>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><a href="updatedata.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Proses Tambah Data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['Email'];
    $phone = $_POST['phone'];

    // Query untuk menambahkan data
    $sql_insert = "INSERT INTO results (nama, Email, phone) VALUES ('$nama', '$email', '$phone')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='modulpraktek.php';</script>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}
?>
