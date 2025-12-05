<?php
// app/Controllers/MenuController.php (Fokus pada fungsi tambah_menu)

class MenuController {

    private $menuModel;
    // Asumsi konstruktor sudah menginisialisasi $this->menuModel

    // ... Metode index() akan ada di sini ...

    /**
     * 🍔 Metode untuk menampilkan form dan memproses penambahan menu baru.
     * Route/URL yang diakses: /menu/tambah_menu
     */
    public function tambah_menu() {
        // Cek jika permintaan menggunakan metode POST (Form disubmit)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // --- 1. Ambil dan validasi data ---
            $nama = filter_input(INPUT_POST, 'nama_menu', FILTER_SANITIZE_STRING);
            $harga = filter_input(INPUT_POST, 'harga', FILTER_VALIDATE_INT);

            if (empty($nama) || $harga === false || $harga <= 0) {
                $data['error'] = 'Nama menu atau harga tidak valid.';
                $this->loadView('menu/tambah', $data);
                return; // Berhenti eksekusi
            }

            // --- 2. Panggil Model untuk menyimpan data ---
            $result = $this->menuModel->addMenu([
                'nama' => $nama,
                'harga' => $harga
            ]);

            // --- 3. Tangani hasil ---
            if ($result) {
                // Redirect jika berhasil
                header('Location: /menu?status=success');
                exit();
            } else {
                // Tampilkan pesan error jika gagal simpan ke DB
                $data['error'] = 'Gagal menyimpan menu ke database.';
                $this->loadView('menu/tambah', $data);
            }

        } else {
            // Jika permintaan GET, tampilkan formulir penambahan menu
            $this->loadView('menu/tambah');
        }
    }
    
    // ... Fungsi bantu loadView() akan ada di sini ...
}