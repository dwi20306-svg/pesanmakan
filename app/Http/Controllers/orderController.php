<?php
// app/Controllers/OrderController.php

class OrderController {

    private $menuModel;
    private $orderModel;

    public function __construct() {
        // Inisialisasi Model
        // require_once 'app/Models/MenuModel.php';
        // require_once 'app/Models/OrderModel.php';
        $this->menuModel = new MenuModel();
        $this->orderModel = new OrderModel();
    }

    /**
     * Metode untuk menampilkan semua daftar order (order).
     */
    public function index() {
        // 1. Ambil data semua pesanan dari Model
        $data['daftar_order'] = $this->orderModel->getAllOrders();

        // 2. Tampilkan View
        $this->loadView('order/index', $data);
    }

    /**
     * Metode untuk membuat pesanan baru (new_order).
     */
    public function new_order() {
        // Cek apakah ada data yang dikirimkan (form disubmit)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Ambil data dari form (misalnya: id_menu, jumlah, nama_pelanggan)
            $id_menu = $_POST['id_menu'];
            $jumlah = $_POST['jumlah'];
            $pelanggan = $_POST['nama_pelanggan'];

            // 2. Hitung total harga (biasanya melibatkan interaksi dengan MenuModel)
            $menu = $this->menuModel->getMenuById($id_menu);
            $total_harga = $menu['harga'] * $jumlah;

            // 3. Panggil Model untuk menyimpan pesanan baru
            $result = $this->orderModel->createOrder($id_menu, $jumlah, $total_harga, $pelanggan);

            if ($result) {
                // Berhasil, arahkan kembali ke daftar order
                header('Location: /order');
                exit();
            } else {
                $data['error'] = 'Gagal membuat pesanan.';
                $data['daftar_menu'] = $this->menuModel->getAllMenu();
                $this->loadView('order/new', $data);
            }
        } else {
            // Tampilkan form pemesanan, sertakan daftar menu untuk dipilih
            $data['daftar_menu'] = $this->menuModel->getAllMenu();
            $this->loadView('order/new', $data);
        }
    }

    // Fungsi bantu sederhana untuk memuat View
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once 'app/Views/' . $viewName . '.php';
    }
}