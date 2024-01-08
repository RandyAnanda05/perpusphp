<?php 
require 'function.php';
$id = $_GET["id"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
if(isset($_POST["submit"])) {
    if (update($id,$_POST) >0) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'web-dua.php';
        </script>";
    }
    else {

        echo "<script>
        alert('data gagal/batal diubah');
        document.location.href = 'web-dua.php';
        </script>";
    } 
}




?>


<html>
    <head>
        <title>Ubah data mahasiswa</title>
    </head>
    <body>
        <h1>Form Ubah nama mahasiswa</h1>
        <form action="" method="post"  >
            <ul>
                <li>
                    <label for="nama">MASUKAN NAMA BARU : </label>
                    <input type="text" name="nama" id="nama"
                    value="<?=$mahasiswa["nama"]?>"
                    >
                </li>
    
                <li>
                    
                    <label for="dep">MASUKAN DEPARTEMEN BARU : </label>
                    <input type="text" name="departemen" id="dep" 
                    
                    value="<?=$mahasiswa["departemen"]?>"
                    >
                </li>
                <li>
                    
                    <label for="prodi">MASUKAN PRODI BARU : </label>
                    <input type="text" name="prodi" id="prodi" 
                    
                    value="<?=$mahasiswa["prodi"]?>"
                    >
                </li>
    
                <li>
                    <button type="submit" name="submit" onclick="return confirm('yakin diubah ?');"> SUBMIT </button>
                </li>
            </ul>
        </form>
        <hr>
    </body>
    </html>