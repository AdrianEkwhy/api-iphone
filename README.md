# 📱 iPhone Store

Aplikasi **iPhone Store** merupakan proyek Ujian Akhir Semester (UAS) berbasis **Laravel** yang menerapkan konsep **E-Commerce** sederhana untuk penjualan produk iPhone.

Website ini menyediakan dua jenis pengguna, yaitu **Admin** dan **User**, dengan hak akses yang berbeda. User dapat melihat katalog produk, menambahkan produk ke keranjang, melakukan checkout, melihat riwayat pesanan, serta mengelola profil. Admin dapat mengelola data produk, pengguna, dan pesanan melalui dashboard admin.

---

# 🚀 Fitur

## User

* Login
* Register
* Melihat katalog iPhone
* Detail produk
* Keranjang belanja
* Checkout
* Metode pembayaran
* Riwayat pesanan
* Detail pesanan
* Profil pengguna
* Responsive Mobile

## Admin

* Login Admin
* Dashboard Admin
* CRUD Produk
* Melihat daftar pengguna
* Melihat daftar pesanan
* Statistik Dashboard

---

# 🛠 Teknologi yang Digunakan

* Laravel 10
* PHP 8.x
* MySQL
* Blade Template
* HTML5
* CSS3
* JavaScript
* Bootstrap (Laravel Default)
* Git & GitHub

---

# 📂 Struktur Project

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
artisan
composer.json
package.json
```

---

# 📊 Database

Database menggunakan **MySQL** dengan beberapa tabel utama:

* users
* iphones
* orders
* order_items
* migrations
* personal_access_tokens

---

# ⚙️ Cara Menjalankan Project

## 1. Clone Repository

```bash
git clone https://github.com/AdrianEkwhy/api-iphone.git
```

## 2. Masuk ke Folder Project

```bash
cd api-iphone
```

## 3. Install Dependency

```bash
composer install
```

## 4. Install Dependency Frontend

```bash
npm install
```

## 5. Salin File Environment

```bash
cp .env.example .env
```

## 6. Generate Application Key

```bash
php artisan key:generate
```

## 7. Konfigurasi Database

Sesuaikan konfigurasi database pada file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

## 8. Jalankan Migration

```bash
php artisan migrate
```

Jika tersedia seeder:

```bash
php artisan db:seed
```

## 9. Jalankan Server

```bash
php artisan serve
```

Kemudian buka:

```
http://127.0.0.1:8000
```

---

# 📱 Responsive Design

Website telah mendukung tampilan:

* Desktop
* Tablet
* Mobile

Dengan fitur **Mobile Sidebar Navigation** untuk memudahkan navigasi pada perangkat mobile.

---

# 🔐 Hak Akses

### Admin

* Dashboard
* Kelola Produk
* Kelola Pesanan
* Kelola User

### User

* Katalog
* Detail Produk
* Keranjang
* Checkout
* Riwayat Pesanan
* Profil

---

# 📸 Tampilan Aplikasi

Beberapa halaman utama:

* Login
* Register
* Dashboard Admin
* Katalog Produk
* Detail Produk
* Keranjang
* Checkout
* Riwayat Pesanan
* Profil

---

# 👨‍💻 Author

**Adrian Ekwhy**

Project Ujian Akhir Semester (UAS)

Universitas Singaperbangsa Karawang

---

# 📄 License

Project ini dibuat untuk keperluan pembelajaran dan penyelesaian tugas Ujian Akhir Semester (UAS).
