<?php
// app/Controllers/OrderController.php (Fokus pada fungsi new_order)

class OrderController {

    private $menuModel;
    private $orderModel;
    // Asumsi konstruktor sudah menginisialisasi kedua Model

    // ... Metode index() akan ada di sini ...

    /**
     * 🛒 Metode untuk membuat pesanan baru.
     * Route/URL yang diakses: /order/new_order
     */
    public function new_order() {
        
        // --- Cek POST Request (Formulir disubmit) ---
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Ambil dan validasi data dari POST
            $id_menu = filter_input(INPUT_POST, 'id_menu', FILTER_VALIDATE_INT);
            $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_VALIDATE_INT);
            $pelanggan = filter_input(INPUT_POST, 'nama_pelanggan', FILTER_SANITIZE_STRING);
            
            if ($id_menu === false || $jumlah === false || $jumlah <= 0 || empty($pelanggan)) {
                 $data['error'] = 'Input pesanan tidak valid. Periksa menu dan jumlah.';
                 goto load_form; // Lompat ke bagian tampilkan form
            }

            // 2. Ambil harga menu dari Model untuk menghitung total
            $menu = $this->menuModel->getMenuById($id_menu);
            
            if (!$menu) {
                 $data['error'] = 'Menu yang dipilih tidak ditemukan.';
                 goto load_form; // Lompat ke bagian tampilkan form
            }

            $total_harga = $menu['harga'] * $jumlah;

            // 3. Panggil Model untuk menyimpan pesanan
            $result = $this->orderModel->createOrder([
                'id_menu' => $id_menu,
                'jumlah' => $jumlah,
                'total' => $total_harga,
                'pelanggan' => $pelanggan
            ]);
            
            // 4. Tangani hasil
            if ($result) {
                header('Location: /order?status=created');
                exit();
            } else {
                $data['error'] = 'Gagal menyimpan pesanan ke database.';
            }
        }
        
        // --- Jika Request GET atau gagal (melalui goto load_form) ---
        load_form:
        
        // Ambil daftar menu untuk ditampilkan di dropdown form
        $data['daftar_menu'] = $this->menuModel->getAllMenu();
        $this->loadView('order/new', $data);
    }
    
    // ... Fungsi bantu loadView() akan ada di sini ...
}