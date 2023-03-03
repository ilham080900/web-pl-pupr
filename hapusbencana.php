<?php 

require 'function.php';

$id = $_GET["id"];

if (hapusbencana($id) > 0 ) {
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'bencana.php';
    </script>";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
    document.location.href = 'bencana.php';
    </script>";
}
?>