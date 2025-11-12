<?php 

class database { 
    // properti koneksi 
    var $host = "localhost"; 
    var $username = "root"; 
    var $password = ""; 
    var $database = "belajar_oop"; 
    var $koneksi = ""; 

    // --- FUNGSI LOGIN/LOGOUT ---

    function login($username, $password){
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($this->koneksi, $query);
        $cek = mysqli_num_rows($result);

        if($cek > 0){
            $data = mysqli_fetch_assoc($result);
            
            $_SESSION['username'] = $data['username'];
            $_SESSION['tipe_user'] = $data['tipe_user'];
            $_SESSION['status'] = "login";

            return true;
        } else {
            return false;
        }
    }

    function cek_login(){
        // Fungsi untuk mengamankan halaman, jika belum login akan diredirect ke form login
        if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
            header("location:index.php?pesan=belum_login");
            exit(); 
        }
    }

    function logout(){
        // Fungsi untuk menghapus session
        session_destroy();
        header("location:index.php?pesan=logout");
        exit();
    }

    // constructor otomatis jalan pas objek dibuat 
    function __construct() { 
        $this->koneksi = mysqli_connect( 
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database 
        ); 

        if (mysqli_connect_error()) { 
            die("Koneksi database gagal: " . mysqli_connect_error()); 
        } 
    } 

    // --- CRUD BARANG --- 
    function tampil_data_barang() { 
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang"); 
        $hasil = []; 
        while ($row = mysqli_fetch_array($data)) { 
            $hasil[] = $row; 
        } 
        return $hasil; 
    } 

    function tambah_data_barang($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual) { 
        mysqli_query($this->koneksi,  
            "INSERT INTO tb_barang VALUES ('', '$kd_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')"); 
    } 

    function tampil_edit_barang($id_barang) { 
        $data = mysqli_query($this->koneksi,  
            "SELECT * FROM tb_barang WHERE id_barang='$id_barang'"); 
        $hasil = []; 
        while ($d = mysqli_fetch_array($data)) { 
            $hasil[] = $d; 
        } 
        return $hasil; 
    } 

    function edit_data_barang($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual) { 
        mysqli_query($this->koneksi,  
            "UPDATE tb_barang SET  
            nama_barang='$nama_barang',  
            stok='$stok',  
            harga_beli='$harga_beli',  
            harga_jual='$harga_jual'  
            WHERE id_barang='$id_barang'"); 
    } 

    function delete_data_barang($id_barang) { 
        mysqli_query($this->koneksi,  
            "DELETE FROM tb_barang WHERE id_barang='$id_barang'"); 
    } 

    function kode_barang() { 
        $data = mysqli_query($this->koneksi,  
            "SELECT MAX(kd_barang) AS kd_barang FROM tb_barang"); 
        $hasil = mysqli_fetch_array($data); 
        return $hasil; 
    } 

    // --- CRUD CUSTOMER --- 
    function tampil_data_customer() { 
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer"); 
        $hasil = []; 
        while ($row = mysqli_fetch_array($data)) { 
            $hasil[] = $row; 
        } 
        return $hasil; 
    } 

    function tambah_data_customer($nama, $alamat, $telp, $email, $password) { 
        mysqli_query($this->koneksi,  
            "INSERT INTO tb_customer VALUES ('', '$nama', '$alamat', '$telp', '$email', '$password')"); 
    } 

    function edit_data_customer($id, $nama, $alamat, $telp, $email, $password) { 
        mysqli_query($this->koneksi,  
            "UPDATE tb_customer SET  
            nama='$nama',  
            alamat='$alamat',  
            telp='$telp',  
            email='$email',  
            password='$password'  
            WHERE id_customer='$id'"); 
    } 

    function delete_data_customer($id) { 
        mysqli_query($this->koneksi,  
            "DELETE FROM tb_customer WHERE id_customer='$id'"); 
    } 

    function tampil_edit_customer($id) { 
        $data = mysqli_query($this->koneksi,  
            "SELECT * FROM tb_customer WHERE id_customer='$id'"); 
        $hasil = []; 
        while ($d = mysqli_fetch_array($data)) { 
            $hasil[] = $d; 
        } 
        return $hasil; 
    } 

    // --- CRUD SUPPLIER --- 
    function tampil_data_supplier() { 
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier"); 
        $hasil = []; 
        while ($row = mysqli_fetch_array($data)) { 
            $hasil[] = $row; 
        } 
        return $hasil; 
    } 

    function tambah_data_supplier($nama, $alamat, $telp, $email) { 
        mysqli_query($this->koneksi,  
            "INSERT INTO tb_supplier VALUES ('', '$nama', '$alamat', '$telp', '$email')"); 
    } 

    function edit_data_supplier($id, $nama, $alamat, $telp, $email) { 
        mysqli_query($this->koneksi,  
            "UPDATE tb_supplier SET  
            nama_supplier='$nama',  
            alamat='$alamat',  
            telp='$telp',  
            email='$email'  
            WHERE id_supplier='$id'"); 
    } 

    function delete_data_supplier($id) { 
        mysqli_query($this->koneksi,  
            "DELETE FROM tb_supplier WHERE id_supplier='$id'"); 
    } 

    function tampil_edit_supplier($id) { 
        $data = mysqli_query($this->koneksi,  
            "SELECT * FROM tb_supplier WHERE id_supplier='$id'"); 
        $hasil = []; 
        while ($d = mysqli_fetch_array($data)) { 
            $hasil[] = $d; 
        } 
        return $hasil; 
    } 
} 

?> 
