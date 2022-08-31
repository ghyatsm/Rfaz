<?php
if (!isset($_SESSION["username"])) {
    session_start();
}
?>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <?php

        if ($_SESSION["role"] == 'admin') {

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Pemasaran</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/pesanan' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Pesanan</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/profil' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Pelanggan</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Produksi</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/produksi' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Produksi</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/jadwalmesin' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Jadwal Mesin</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/benang' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Benang</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/mesin' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Mesin</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Keuangan</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/pembayaran' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Pembayaran</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Pengguna</p></a>";
            echo "</li>";
            echo "<li class=nav-item>";
            echo "    <a href='/user' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> User</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Manajemen</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "  <a href='/generate-laporan-html' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Laporan Pemesanan</p></a>";
            echo "</li>";
        } elseif ($_SESSION["role"] == 'produksi') {

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Produksi</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/produksi' class='nav-link'>&nbsp;&nbsp;&nbsp;  <i class='fa fa-book'></i><p> Produksi</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/jadwalmesin' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Jadwal Mesin</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/mesin' class='nav-link'>&nbsp;&nbsp;&nbsp; <i class='fa fa-book'></i><p> Mesin</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/benang' class='nav-link'>&nbsp;&nbsp;&nbsp;  <i class='fa fa-book'></i><p> Benang</p></a>";
            echo "</li>";
        } elseif ($_SESSION["role"] == 'penjualan') {

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Pemasaran</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/pesanan' class='nav-link'> <i class='fa fa-book'></i><p> Pesanan</p></a>";
            echo "</li>";
            echo "<li class=nav-item>";
            echo "    <a href='/profil' class='nav-link'> <i class='fa fa-book'></i><p> Pelanggan</p></a>";
            echo "</li>";
        } elseif ($_SESSION["role"] == 'manajemen') {

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Manajemen</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <i class='fa fa-book'></i><p> Laporan Pemesanan Tahunan</p></a>";
            echo "</li>";
        } else {

            echo "<li class=nav-item>";
            echo "    <a class='nav-link'> <p> Modul Keuangan</p></a>";
            echo "</li>";

            echo "<li class=nav-item>";
            echo "    <a href='/pembayaran' class='nav-link'> <i class='fa fa-book'></i><p> Pembayaran</p></a>";
            echo "</li>";
        }
        ?>
</nav>