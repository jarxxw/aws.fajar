<?php
include("../admin/koneksi.php");
session_destroy();
session_start();
echo"<script>window.location.href='../css/index.php'</script>";
?>