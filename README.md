
# Coffee Cashier: Aplikasi Kasir Multifungsi untuk Usaha Kuliner

### Apa itu Coffee Cashier?
**Coffee Cashier** adalah aplikasi kasir berbasis Laravel yang dirancang untuk mempermudah pengelolaan bisnis kuliner, terutama untuk kedai kopi. Aplikasi ini tidak hanya terbatas pada produk kopi, tetapi dapat digunakan untuk mengelola berbagai jenis produk kuliner seperti makanan berat, ringan, hingga produk titipan pihak ketiga.

---

### Fitur Utama:

- **Manajemen Produk Komprehensif:**
  - Katalog produk yang fleksibel untuk berbagai jenis produk.
  - Variasi produk berdasarkan ukuran, rasa, dan tambahan.
  - Manajemen stok otomatis.

- **Transaksi Penjualan Efisien:**
  - Pembuatan invoice otomatis.
  - Mendukung berbagai metode pembayaran.
  - Diskon dan promosi.

- **Manajemen Pelanggan yang Efektif:**
  - Database pelanggan yang terintegrasi.
  - Program loyalitas untuk meningkatkan repeat customer.

- **Manajemen Karyawan Terperinci:**
  - Data karyawan lengkap.
  - Sistem absensi yang mudah dikelola.

- **Laporan Keuangan yang Akurat:**
  - Laporan penjualan harian, bulanan, laba rugi, dan manajemen stok.

- **Fitur Tambahan:**
  - Integrasi dengan POS.
  - Pemesanan online.

---

### Teknologi yang Digunakan:
- **Bahasa Pemrograman:** PHP, Javascript
- **Framework:** Laravel
- **Database:** Mysql

---

### Cara Penggunaan:

1. **Instalasi:**
   - Clone repository ini:  
     ```bash
     git clone https://github.com/Rofiq354/coffee-cashier-app.git
     cd coffee-cashier-app
     ```
   - Install dependensi:  
     ```bash
     composer install
     ```

2. **Konfigurasi:**
   - Atur database dan buat environment file (.env) dengan detail database Anda:
     ```bash
     DB_NAME=nama_database
     DB_USER=user_database
     DB_PASSWORD=password
     DB_HOST=localhost
     ```
   - Migrasikan database:
     ```bash
     php artisan migrate --seed
     ```

3. **Penggunaan:**
   - Jalankan server:
     ```bash
     php artisan serve
     ```
   - Akses aplikasi melalui browser di `http://localhost:8000` dan mulai tambahkan produk, lakukan transaksi, serta lihat laporan penjualan.

---

### Kontribusi:
Kontribusi sangat terbuka! Silakan fork repo ini dan kirimkan pull request untuk perbaikan atau fitur tambahan.

---
