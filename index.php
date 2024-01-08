<?php
require 'function.php';
$books = queryperpus("SELECT * FROM buku");
$count = queryperpus("SELECT COUNT(*) AS banyak_buku FROM buku");
if(isset($_POST["cari"])) {
  $books = cariperpus($_POST["keyword"]);
}
?>





<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perpustakaan TIK</title>
  </head>
  <body class="bg-slate-100">
    <header class="sticky bg-yellow-400 py-5 font-bold shadow-blake shadow-2xl">
      <nav class="flex flex-row mx-auto w-9/12 px-2">
        <div class="basis-1/2 uppercase text-md items-center">
          <a href="index.php">
            <span>OPAC Departemen TIK </span> <br />
            <span>Politeknik Negeri Jakarta</span>
          </a>
        </div>
        <div class="basis-1/2 text-end my-auto inline-block items-center p-2">
          <a
            href=""
            class="flex justify-end transition-all duration-300 ease-in-out hover:text-white"
          >
            <span class="mx-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                fill="currentColor"
                class="bi bi-person-lines-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"
                /></svg
            ></span>

            <span class="text-md">LOGIN as ADMIN</span></a
          >
        </div>
      </nav>
    </header>

    <main>
      <div class="bg-gray-700">
        <div class="flex flex-row w-9/12 py-5 mx-auto">
          <div class="text-white font-bold text-md flex flex-start basis-1/2">
            <div class="mx-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                fill="currentColor"
                class="bi bi-journals"
                viewBox="0 0 16 16"
              >
                <path
                  d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"
                />
                <path
                  d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"
                />
              </svg>
            </div>
            <div>Daftar Koleksi Sebanyak <span><?=$count[0]['banyak_buku']?> </span></div>
          </div>
          <div class="basis-1/2 flex justify-end items-center">
            <form action="" method="post">
              <input
                type="text"
                size="30"
                class="rounded-lg h-8"
                placeholder="masukan keyword"
                name="keyword"
              />
              <button
                class="mx-2 bg-yellow-200 p-1 w-30 rounded-lg font-bold transition-all duration-300 ease-in-out hover:bg-sky-400 hover:text-white"
                name="cari" type="submit"
              >
                Search
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="flex flex-row p-10 mx-auto">
        <div
          class="basis-1/3 rounded-md transition-all duration-300 ease-in-out"
        >
        <div class="shadow-black shadow-sm">
          <div class="p-2">
            <span class="">🔠</span>
            <span
              class="text-md text-gray-600 p-2 border-b-4 border-sky-500 rounded-md font-bold"
              >KATALOG PROGRAM STUDI</span
            >
          </div>
          <ul class="indent-7 text-sky-600 leading-9 p-2">
            <a href="katalog.php?katalog=TI"
              ><li
                class="hover:border-2 hover:border-sky-500 transition-all duration-100 ease-in-out rounded-md"
              >
                Teknik Informatika
              </li></a
            >
            <a href="katalog.php?katalog=TMD"
              ><li
                class="hover:border-2 hover:border-sky-500 transition-all duration-100 ease-in-out rounded-md"
              >
                Teknik Multimedia Digital
              </li></a
            >
            <a href="katalog.php?katalog=TKMJ"
              ><li
                class="hover:border-2 hover:border-sky-500 transition-all duration-100 ease-in-out rounded-md"
              >
                Teknik Komputer dan Multimedia Jaringan
              </li></a
            >
          </ul>
          <div class="py-6 mx-2">
            <a href="tambahperpus.php">
              <span>📚</span>
              <span
                class="text-md text-gray-600 p-2 border-b-4 border-sky-500 rounded-md font-bold"
                >TAMBAH BUKU (ADMINISTRASI PEMBUKUAN)</span
              >
            </a>
          </div>
        </div>
        </div>
        <div class="basis-2/3">
          <div class="px-4">
            <?php foreach($books as $book) :?>
            <div
              class="rounded-md mb-2 shadow-slate-400 shadow-lg flex flex-row h-max relative"
            >
              <!-- <div class="w-50 h-46 m-2">
                <img
                  src="matdis.jpeg"
                  alt=""
                  class="object-cover w-full h-full"
                />
              </div> -->
              <div
                class="text-md justify-center align-center my-auto p-5 leading-10 "
              >
                <div>
                  Judul Buku :
                  <span class="font-bold text-xl flow-root"
                    ><?= $book["judul"] ?></span
                  >
                </div>
                <div>Nomor Induk buku : <?=$book["id"]?></div>
                <div>Penulis : <?=$book["penulis"]?></div>
                <div>ISBN : <?=$book["isbn"]?></div>
                <div>Tahun Terbitan : <?=$book["tahun"]?></div>
              </div>
              <div class="absolute bottom-4 right-4 font-bold">
                <a href="ubah.php?id=<?=$book["id"];?>" class="bg-green-500 p-2 w-15 h-11 rounded-md mx-4">
                  Ubah
              </a>
                 <a href="hapus.php?id=<?=$book["id"];?>" onclick="return confirm('yakin hapus ?');"class="bg-rose-500 p-2 w-15 h-11 rounded-md">hapus</a> 
                 
                </a>
              </div>
            </div>
            <?php endforeach?>
          </div>
        </div>
      </div>
    </main>

    <footer></footer>
  </body>
</html>
