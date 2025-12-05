document.addEventListener("DOMContentLoaded", function() {

    const searchInput = document.getElementById("searchInput");
    
    const orderList = document.getElementById("orderList");
    const orderItems = orderList.getElementsByClassName("order-item");

   
    searchInput.addEventListener("keyup", function() {
       
        const filterValue = searchInput.value.toLowerCase();

        Array.from(orderItems).forEach(function(item) {
            
            const customerNameElement = item.querySelector(".customer-name");
            const customerName = customerNameElement.textContent.toLowerCase();

            if (customerName.includes(filterValue)) {
                // Jika ya, tampilkan item
                item.style.display = "flex";
            } else {
                item.style.display = "none";
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    
    // Temukan semua link navigasi
    const navLinks = document.querySelectorAll('.navigation li a');

    // Fungsi untuk mengatur link aktif
    function setActiveLink(event) {
        // Hapus kelas 'active' dari semua link
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Tambahkan kelas 'active' ke link yang diklik
        event.currentTarget.classList.add('active');
    }

    // Tambahkan event listener ke setiap link
    navLinks.forEach(link => {
        link.addEventListener('click', setActiveLink);
    });

});
document.addEventListener('DOMContentLoaded', function() {
    
    // Temukan semua link navigasi
    const navLinks = document.querySelectorAll('.navigation li a');

    // Fungsi untuk mengatur link aktif saat diklik
    function handleNavClick(event) {
        
        // Cek dulu apakah link ini sudah aktif
        if (event.currentTarget.classList.contains('active')) {
            return; // Jangan lakukan apa-apa jika sudah aktif
        }

        // Hapus kelas 'active' dari semua link
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Tambahkan kelas 'active' ke link yang baru saja diklik
        event.currentTarget.classList.add('active');
        
        // Catatan: Ini hanya untuk efek visual di sisi klien.
        // Saat halaman dimuat ulang, kelas 'active' dari HTML-lah yang akan digunakan.
    }

    // Tambahkan event listener ke setiap link
    navLinks.forEach(link => {
        link.addEventListener('click', handleNavClick);
    });
});
// Menunggu sampai seluruh konten HTML dimuat
document.addEventListener("DOMContentLoaded", function() {
    
    // Ambil elemen input pencarian
    const searchInput = document.getElementById("searchInput");
    
    // Ambil semua item dalam daftar pesanan
    // Kita ambil parent-nya (ul) agar lebih efisien
    const orderList = document.getElementById("orderList");
    const orderItems = orderList.getElementsByClassName("order-item");

    // Tambahkan event listener 'keyup' (dijalankan setiap kali tombol dilepas)
    searchInput.addEventListener("keyup", function() {
        // Ambil nilai input, ubah ke huruf kecil untuk pencarian case-insensitive
        const filterValue = searchInput.value.toLowerCase();

        // Loop melalui setiap item pesanan
        Array.from(orderItems).forEach(function(item) {
            
            // Ambil teks nama pelanggan dari dalam item
            const customerNameElement = item.querySelector(".customer-name");
            const customerName = customerNameElement.textContent.toLowerCase();

            // Periksa apakah nama pelanggan mengandung teks yang dicari
            if (customerName.includes(filterValue)) {
                // Jika ya, tampilkan item
                // Kita gunakan 'flex' karena layout item menggunakan flexbox
                item.style.display = "flex";
            } else {
                // Jika tidak, sembunyikan item
                item.style.display = "none";
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    
    // Temukan semua link navigasi
    const navLinks = document.querySelectorAll('.navigation li a');

    // Fungsi untuk mengatur link aktif saat diklik
    function handleNavClick(event) {
        
        // Cek dulu apakah link ini sudah aktif di HTML
        if (event.currentTarget.classList.contains('active')) {
            // Jika sudah aktif (karena kita di halaman itu), jangan lakukan apa-apa
            // Biarkan browser mengikuti link (jika href-nya beda)
            return;
        }

        // Hapus kelas 'active' dari semua link
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Tambahkan kelas 'active' ke link yang baru saja diklik
        event.currentTarget.classList.add('active');
    }

    // Tambahkan event listener ke setiap link
    navLinks.forEach(link => {
        link.addEventListener('click', handleNavClick);
    });
});
document.addEventListener('DOMContentLoaded', function() {
    
    // Temukan semua link navigasi
    const navLinks = document.querySelectorAll('.navigation li a');

    // Fungsi untuk mengatur link aktif saat diklik
    function handleNavClick(event) {
        // Hapus kelas 'active' dari semua link
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Tambahkan kelas 'active' ke link yang baru saja diklik
        event.currentTarget.classList.add('active');
        
        // Catatan: Ini tidak akan 'tersimpan' saat pindah halaman.
        // Untuk menyimpan, Anda perlu logika di sisi server
        // atau hardcode kelas 'active' di setiap file HTML (seperti yg kita lakukan).
    }

    // Tambahkan event listener ke setiap link
    navLinks.forEach(link => {
        // Cek agar tidak menambahkan event ke link yang sudah aktif
        if (!link.classList.contains('active')) {
            link.addEventListener('click', handleNavClick);
        }
    });
});
// Tunggu hingga seluruh dokumen HTML siap
document.addEventListener("DOMContentLoaded", function() {

    // Ambil elemen-elemen yang diperlukan
    const modal = document.getElementById("addMenuModal");
    const openModalBtn = document.getElementById("addMenuBtn");
    const closeModalBtn = document.getElementById("closeBtn");
    const addMenuForm = document.getElementById("addMenuForm");
    const menuList = document.getElementById("menuList");

    // --- FUNGSI UNTUK MEMBUKA & MENUTUP MODAL ---

    // Buka modal saat tombol "+ tambahkan menu" diklik
    openModalBtn.addEventListener("click", function() {
        modal.classList.add("show"); // Tambahkan kelas 'show' untuk menampilkan
    });

    // Tutup modal saat tombol 'X' (close button) diklik
    closeModalBtn.addEventListener("click", function() {
        modal.classList.remove("show"); // Hapus kelas 'show' untuk menyembunyikan
    });

    // Tutup modal jika pengguna mengklik di luar area modal (latar belakang gelap)
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.classList.remove("show");
        }
    });

    // --- FUNGSI UNTUK MENANGANI SUBMIT FORM ---
    
    addMenuForm.addEventListener("submit", function(event) {
        // Hentikan aksi default form (yang akan me-reload halaman)
        event.preventDefault(); 

        // 1. Ambil nilai dari input form
        const namaMenu = document.getElementById("namaMenu").value;
        const hargaMenu = document.getElementById("hargaMenu").value;
        const gambarMenu = document.getElementById("gambarMenu").value;

        // 2. Format harga ke format mata uang (contoh: 25,000.00)
        const formattedPrice = parseFloat(hargaMenu).toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // 3. Buat elemen HTML baru untuk item menu
        const newItem = document.createElement("li");
        newItem.classList.add("menu-item");
        newItem.classList.add("new-item"); // Kelas untuk animasi fade-in

        // Isi HTML untuk item baru
        newItem.innerHTML = `
            <img src="${gambarMenu}" alt="${namaMenu}" class="menu-item-image">
            <div class="menu-item-details">
                <h3 class="item-name">${namaMenu.toLowerCase()}</h3>
            </div>
            <span class="item-price">${formattedPrice}</span>
        `;

        // 4. Tambahkan item baru ke bagian atas daftar menu
        // Gunakan .prepend() agar item baru muncul di paling atas
        menuList.prepend(newItem);

        // 5. Tutup modal dan reset (kosongkan) form
        modal.classList.remove("show");
        addMenuForm.reset();
        
        // Hapus kelas animasi setelah selesai agar bisa dipakai lagi
        setTimeout(() => {
            newItem.classList.remove("new-item");
        }, 500); // 500ms = durasi animasi di CSS
    });

});