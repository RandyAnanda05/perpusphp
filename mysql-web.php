<?php
$conn = mysqli_connect("localhost","root","","belajarphp");
$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
if (!$result) {
    echo mysqli_error($conn);
}

// $row = mysqli_fetch_array($result);// ini akan mengembalikan hasil query berupa array numerik dan asosiatif (berat)
// $row = mysqli_fetch_assoc($result); // ini akan mengembalikan hasil query berupa array asosiatif

// $row = mysqli_fetch_object($result); // mengembalikan hasil query berupa object yang diakses dengan $row ->nama; 

// $row = mysqli_fetch_row($result); // mengembalikan hasil query berupa array numerik

?>

<html>
    <head>
        <title>Admin page</title>
    </head>
    <style>
        th,td {
            text-align: center;
        }
    </style>

    <body>
        <h1>data mahasiswa </h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <?php $i=1 ?>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Prodi</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($result)):?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["nama"]?></td>
                    <td><?=$row["departemen"]?></td>
                    <td><?=$row["prodi"]?></td>
                </tr>
            <?php $i++?>
            <?php endwhile?>
        </table>
    </body>
</html>