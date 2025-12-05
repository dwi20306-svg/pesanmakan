<?php
// app/Controllers/MenuController.php

class MenuController {

    // Asumsi ada Model yang berfungsi untuk interaksi ke database
    private $menuModel;

    public function __construct() {
        // Inisialisasi Model Menu
        // require_once 'app/Models/MenuModel.php';
        $this->menuModel = new MenuModel();
    }

    /**
     * Metode utama untuk menampilkan semua daftar menu.
     * Menggantikan fungsi 'index' atau 'menu' yang Anda sebutkan.
     */
    public function index() {
        // 1. Ambil data menu dari Model
        $data['daftar_menu'] = $this->menuModel->getAllMenu();

        // 2. Tampilkan View (halaman tampilan) dan kirim data
        // require_once 'app/Views/menu/index.php';
        $this->loadView('menu/index', $data);
    }

    /**
     * Metode untuk menampilkan form dan memproses penambahan menu baru (tambah_menu).
     */
    public function tambah_menu() {
        // Cek apakah ada data yang dikirimkan (form disubmit)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Ambil data dari form
            $nama = $_POST['nama_menu'];
            $harga = $_POST['harga'];

            // 2. Panggil Model untuk menyimpan data ke database
            $result = $this->menuModel->addMenu($nama, $harga);

            if ($result) {
                // Berhasil, arahkan kembali ke halaman daftar menu
                header('Location: /menu');
                exit();
            } else {
                $data['error'] = 'Gagal menambahkan menu.';
                $this->loadView('menu/tambah', $data);
            }
        } else {
            // Tampilkan form penambahan menu
            $this->loadView('menu/tambah');
        }
    }

    // Fungsi bantu sederhana untuk memuat View
    private function loadView($viewName, $data = []) {
        // Extract data agar variabel bisa diakses langsung di file View
        extract($data);
        require_once 'app/Views/' . $viewName . '.php';
    }
}