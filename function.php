<?php

$conn = mysqli_connect("localhost", "root", "", "pupr");


// function untuk menampilkan Data pada Database
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{

    global $conn;

    // ambil data dari tiap elemen form
    $noruas = htmlspecialchars($data['noruas']);
    $namaruas = htmlspecialchars($data['namaruas']);
    $stasioningawal = htmlspecialchars($data['stasioningawal']);
    $stasioningakhir = htmlspecialchars($data['stasioningakhir']);
    $lebarjalan = htmlspecialchars($data['lebarjalan']);
    $panjangjalan = htmlspecialchars($data['panjangjalan']);
    $idx_1 = htmlspecialchars($data['idx_1']);
    $idx_2 = htmlspecialchars($data['idx_2']);
    $idx_3 = htmlspecialchars($data['idx_3']);
    $idx_4 = htmlspecialchars($data['idx_4']);
    $idx_5 = htmlspecialchars($data['idx_5']);
    $text_input1 = htmlspecialchars($data['text_input1']);
    $text_input2 = htmlspecialchars($data['text_input2']);
    $text_input3 = htmlspecialchars($data['text_input3']);
    $text_input4 = htmlspecialchars($data['text_input4']);
    $text_input5 = htmlspecialchars($data['text_input5']);
    $text_input6 = htmlspecialchars($data['text_input6']);
    $text_input7 = htmlspecialchars($data['text_input7']);
    $text_input8 = htmlspecialchars($data['text_input8']);


    $query = "INSERT INTO kondisijalan
                VALUES 
                ('', '$noruas', '$namaruas', '$stasioningawal', '$stasioningakhir', '$lebarjalan', '$panjangjalan',
                '$idx_1', '$text_input1', '$idx_2', '$text_input2', '$idx_3', '$text_input3', '$idx_4', '$text_input4',
                '$idx_5', '$text_input5', '$text_input6', '$text_input7','$text_input8')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahjembatan($data)
{

    global $conn;

    // ambil data dari tiap elemen form
    $noruas_namaruas = htmlspecialchars($data['noruas_namaruas']);
    $namajembatan = htmlspecialchars($data['namajembatan']);
    $sta = htmlspecialchars($data['sta']);
    $tahunpembuatan = htmlspecialchars($data['tahunpembuatan']);


    $query = "INSERT INTO datajembatan
                VALUES 
                ('', '$noruas_namaruas', '$namajembatan', '$sta', '$tahunpembuatan')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahbencana($data)
{

    global $conn;

    // ambil data dari tiap elemen form
    $namaruas = htmlspecialchars($data['namaruas']);
    $stasioning = htmlspecialchars($data['stasioning']);
    $kondisi = htmlspecialchars($data['kondisi']);
    $panjangkerusakan = htmlspecialchars($data['panjangkerusakan']);
    $tinggikerusakan = htmlspecialchars($data['tinggikerusakan']);
    $penanganan = htmlspecialchars($data['penanganan']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $query = "INSERT INTO databencana
                VALUES 
                ('', '$namaruas', '$stasioning', '$kondisi', '$panjangkerusakan', '$tinggikerusakan', '$penanganan', '$keterangan')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function untuk Registrasi akun
function registrasi($data)
{
    global $conn;

    // mengambil  data yang di isi di form dan dijadikan variabel
    $username = strtolower(stripslashes(($data["username"])));
    $email = strtolower(stripslashes(($data["email"])));
    $password = $data["password"];
    $confirmpassword = $data["confirmpassword"];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('Username sudah terdaftar') </script>";
        return false;
    }


    // cek informasi password

    if ($password !== $confirmpassword) {
        echo "<script>
                alert ('Password harus sama!');
             </script>";
        return false;
    }

    // enkripsi pasword
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM kondisijalan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapusjembatan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM datajembatan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapusbencana($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM databencana WHERE id = $id");

    return mysqli_affected_rows($conn);
}