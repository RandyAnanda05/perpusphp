<?php
$conn = mysqli_connect("localhost","root","","belajarphp");

function queryperpus($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function querykatalog($data) {
    $query="SELECT * FROM buku WHERE 
    LEFT(id,2) = LEFT('$data',2) OR
    LEFT(id,3) = LEFT('$data',3) OR
    LEFT(id,4) = LEFT('$data',4) ;
    ";
    return queryperpus($query);
}



function hapusperpus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM buku WHERE id ='$id'"); 
    return mysqli_affected_rows($conn);
}

function updateperpus($id, $data) {
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $isbn = htmlspecialchars($data["isbn"]);

    mysqli_query($conn, "UPDATE buku SET
        id='$id',
        judul='$judul',
        penulis='$penulis',
        tahun='$tahun',
        isbn='$isbn'
        WHERE id='$id'");

    return mysqli_affected_rows($conn);
}
function tambahperpus($data) {
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $isbn = htmlspecialchars($data["isbn"]);

    $insert = "INSERT INTO buku VALUES (
        '$id',
        '$judul',
        '$penulis',
        '$tahun',
        '$isbn'
    ) ";

    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function cariperpus ($data) {
    global $conn;
    $query = "SELECT * FROM buku WHERE  
    LOWER(id) LIKE LOWER('%$data%') OR
    LOWER(judul) LIKE LOWER('%$data%') OR
    LOWER(penulis) LIKE LOWER('%$data%') OR
    LOWER(tahun) LIKE LOWER('%$data%') OR
    LOWER(isbn) LIKE LOWER('%$data%')";


    return queryperpus($query);
}


?>