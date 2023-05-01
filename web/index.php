<?php
    # Membuat variable dan credentials yang akan digunakan.
    $container = "redlockdb"; #nama server database (containers) yang digunakan
    $user = "root"; #username default
    $pass = ""; #passwordnya kosong karena sudah di set-up di ENV
    $db = "redlock"; #name database yang digunakan

    # Membuat connection baru ke mysql.
    $conn = new mysqli($container, $user, $pass, $db);

    # Membuat validasi jika tidak ada connection ke database, maka kita matikan koneksi dan menampilkan connection failed
    if($conn->connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }

    # Variable untuk mengambil seluruh data yang berada dalam table users.
    $sql = "SELECT * FROM users";

    # Mendapatkan hasil dari variable sql 
    $res = $conn->query($sql);

    # Validasi jika ada data di dalam database dan tablenya
    if($res->num_rows > 0){
        # Validasi nge print data jika data ada dalam tabel "users"
        while($row = $res->fetch_assoc()){
        
            echo "ID: ". $row["ID"]. " | Nama: ". $row["Nama"]. " | Alamat: ". $row["Alamat"]. " | Jabatan: ". $row["Jabatan"]. "<br>";
        }
    }
    else{
        # Jika ngak ada data, maka akan menampilkan NULL
        echo "NULL";
    }

    # Menutup connection dengan database
    $conn->close();
?>