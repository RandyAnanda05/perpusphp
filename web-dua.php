<?php
//ambil data dari function.php
require'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
if(isset($_POST["cari"])) {
    $mahasiswa = search($_POST["keyword"]);
}
// $result = mysqli_query($conn,"SELECT * FROM mahasiswa");
// if (!$result) {
//     echo mysqli_error($conn);
// }

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
        .tambah {
            text-decoration: none;
            text-align: center;
            color: black; /* Change the text color to white for better visibility on a yellow background */
            background-color: yellow; /* Use a slightly darker shade of yellow */
            border-radius: 10px;
            padding: 10px 20px; /* Add padding for a better visual appearance */
            font-family: 'Arial', sans-serif; /* Use a specific font for a clean look */
            font-size: 16px; /* Adjust the font size as needed */
            font-weight: bold; /* Make the text bold for emphasis */
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
        }

        .tambah:hover {
            background-color: aqua;
        }
    </style>

    <body>

        
        <h1>data mahasiswa</h1>
        <hr>
        <form action="" method="post" >
            <input type="text" autofocus autocomplete="off" size="50" placeholder="Masukan Keyword Yang anda ingin cari" name="keyword" >
            <button type="submit" name="cari" >SEARCH !</button>
            <button type="submit" name="back" onclick="return document.location.href = 'web-dua.php';" >clear query</button>
        </form>
        <br>
        <a href="tambah.php" class="tambah" >tambah data mahasiswa</a>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <?php $i=1 ?>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Prodi</th>
            </tr>
            <?php foreach($mahasiswa as $mhs):?>
                <tr>
                    <td><?=$i?></td>
                    <td>
                        <a href="update.php?id=<?=$mhs["id"];?>">edit</a>
                        <br>
                        <a href="hapus.php?id=<?=$mhs["id"];?>" onclick="return confirm('yakin hapus ?');">hapus</a> 
                        <!-- a href dengan metode get -->
                    </td>
                    <td><?=$mhs["id"]?></td>
                    <td><?=$mhs["nama"]?></td>
                    <td><?=$mhs["departemen"]?></td>
                    <td><?=$mhs["prodi"]?></td>
                </tr>
            <?php $i++?>
            <?php endforeach?>
        </table>
    </body>
</html>