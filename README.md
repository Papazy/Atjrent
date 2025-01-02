
# Atjrent (Atjeh Rental)

Atjrent adalah aplikasi yang dirancang untuk mempermudah masyarakat dalam menyewa atau membeli alat camping untuk sekitaran Aceh. Platform ini bertujuan untuk mendukung kegiatan camping atau outdoor lainnya, dengan menyediakan alat dan akses yang cepat ke berbagai alat camping.

## Fitur
Atjrent memiliki dua antarmuka,`client` dan `admin`

### client**
- **Katalog Produk**: menyediakan katalog lengkap dari alat camping, disertai dengan *filter* barang dan harga
- **Penyewaan dan Pembelian**: Sistem keranjang untuk mempermudah proses checkout sewa/jual.
- **Notifikasi**: Memberikan notifikasi email setelah melakukan checkout

### admin**
- **Manajemen Produk**: Tambah, edit, dan hapus alat camping di katalog.
- **Manajemen Pesanan**: Pantau status penyewaan dan pembelian.
- **Manajemen Pengguna**: Lihat dan kelola pengguna.

** Terdapat beberapa fitur dalam pengembangan


## Teknologi yang Digunakan

### client
- Laravel 11 (php 8.2)
- Ajax
- Mysql
- [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/)
- [Sweet Alert](https://sweetalert2.github.io/)
- [Midtrans](https://midtrans.com)

### admin
- Laravel 11 (php 8.2)
- Ajax
- Mysql
- [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/)
- [Sweet Alert](https://sweetalert2.github.io/)

## Struktur Projek

```
├─ Atjeh_Camping/
│   ├─── app/
│   │ ├─── Models/         # model
│   │ └─── Http/
│   │     └── Controllers/ 
│   ├─── routes/
│   │ └── web.php          # routes
│   ├─── resources/
│   │ └─── views/           
│   ├─── public/           # folder simpan asset
│   ├─── storage/          
│   └─── database/
│       ├─── migrations/   # File migrasi database
│       └─── seeders/      # Seeder untuk data awal
│   
├── Atjeh_Camping_Admin/
│   ├─── app/
│   │ ├─── Models/         
│   │ └─── Http/
│   │     └── Controllers/ 
│   ├─── routes/
│   │ └── web.php         
│   ├─── resources/
│   │ └─── views/          
│   ├─── public/  
│   │ └─── uploads/        # Folder uploads gambar       
│   ├─── storage/          
│   └─── database/
│       ├─── migrations/  
│       └─── seeders/     
│
└── atjrent.sql            # database.sql

```

## Instalasi

### Prasyarat
Pastikan telah menginstal:  
- **PHP**: Versi 8.x atau lebih tinggi.  
- **Composer**: Untuk mengelola dependensi PHP.  
- **Database**: MySQL atau MariaDB.  
- **phpMyAdmin**: Untuk mengelola database melalui antarmuka GUI.


1. **Clone Repository**  
   Jalankan perintah berikut di terminal:  
   ```bash
   git clone https://github.com/Papazy/Atjrent.git
   ```
2. **Setup Project**
Setup dilakukan pada folder ``Atjeh_Camping`` dan ``Atjeh_Camping_Admin`` 
```bash
cd Atjeh_Camping            # masuk ke project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate         # jika tidak pakai .sql yang diberikan
```
3. **Setup Project Admin**
pada terminal sebelumnya lakukan
```bash
cd ..
cd Atjeh_Camping_Admin      # masuk ke project admin
.. # lanjutkan seperti step sebelumnya
```
4. **Setup Environment**
edit file ``.env`` pada kedua project :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=atjrent
DB_USERNAME=root
DB_PASSWORD=your_password
```
5. **Jalankan Server**
Buka 2 Terminal, (untuk client dan admin).
#### client (Atjrent\Atjeh_Camping)
```bash
 php artisan serve
```
#### admin (Atjrent\Atjeh_Camping_Admin)
```bash
 php artisan serve --port 8001
```
## Going To do

**client**
- [x] Landing Page
- [x] Katalog Barang
- [x] Filter Barang di Katalog 
- [x] Pencarian
- [X] Register dan Login
   - [X] Menambahkan Alamat di Register
- [x] Penyewaan
   - [x] Handle Simpan KTP
   - [X] Fix Keranjang terbayar tidak bisa dipakai sewa lagi
   - [ ] Menampilkan Harga Ongkir
- [ ] Pembelian
   - [ ] Membuat Halaman History Pembelian 
- [x] Pembayaran
   - [x] Integrasi Midtrans
   - [x] Update status setelah pembayaran berhasil
- [ ] Notifikasi Email setelah transaksi
- [x] Profile
   - [x] Update Profile
   - [x] Fix bug style
- [ ] Update Stok setiap transaksi dilakukan atau pengembalian barang
- [x] Membuat Observers
   - [x] Observer Pemantauan Jumlah Harga Keranjang

**admin**
- [x] Manajemen barang
- [ ] Dashboard informasi Penyewaan dan Penjualan
   - [x] Halaman dan Fitur
   - [x] Menampilkan KTP di penyewaan
   - [x] Halaman Detail Pembayaran
   - [X] Fix Stok Barang dan Harga Total
   - [ ] Tambahkan lokasi pengambilan barang (jual/sewa)
- [x] Manajemen User
- [x] Dashboard Admin
   - [x] Pantauan Stok Barang
   - [x] Menampilkan informasi barang, user, transaksi

## Kontribusi

Kontribusi adalah apa yang membuat komunitas open source menjadi tempat yang luar biasa untuk belajar, menginspirasi, dan menciptakan. Setiap kontribusi yang Anda berikan akan sangat **dihargai**.

Jika Anda memiliki saran untuk membuat proyek ini lebih baik, silakan fork repository ini dan buat pull request. Anda juga dapat membuka issue dengan tag "enhancement".  
Jangan lupa untuk memberikan bintang pada proyek ini! Terima Kasih!

1. Fork repository ini  
2. Buat Branch untuk Fitur Anda (`git checkout -b feature/FiturAnda`)  
3. Commit perubahan Anda (`git commit -m 'Tambah fitur X'`)  
4. Push ke Branch tersebut (`git push origin feature/FiturAnda`)  
5. Buat Pull Request


# Terima Kasih 😊














