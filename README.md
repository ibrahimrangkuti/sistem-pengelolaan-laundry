<h1 align="center">Selamat Datang di Sistem Pengelolaan Laundry! 👋</h1>

## Tentang projek

Projek ini adalah sistem pengelolaan laundry berbasis website dengan menggunakan PHP dan Framework Laravel 10. Dibuat menggunakan Framework CSS Bootstrap 4 dan Template Admin LTE.

## Fitur apa saja yang tersedia?

-   Autentikasi 3 Level (Admin, Owner, Kasir)
-   Dashboard
    -   Statistik
    -   Chart Total Transaksi & Total Pendapatan
-   CRUD Pengguna
-   CRUD Pelanggan
-   CRUD Outlet
-   CRUD Paket
-   CRUD Transaksi
    -   Buat Transaksi Baru (Admin & Kasir)
-   Report
-   Ubah Profil
-   Logout

## Tanggal Rilis

**14 September 2023**

---

## Akun yang disediakan

**Admin**

-   Email: admin@gmail.com
-   Password: admin123

**Owner**

-   Email: owner1@gmail.com
-   Password: owner1

**Kasir**

-   Email: kasir1@gmail.com
-   Password: kasir1

---

## Install

1. **Clone Repository**

```bash
git clone https://github.com/ibrahimrangkuti/laravel-laundry.git
cd laravel-laundry
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan website**

```bash
php artisan serve
```

## Author

-   Instagram : <a href="https://instagram.com/ranqkuty">Ibrahim Rangkuti</a>

## Contributing

Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi. **Berhubung Project ini saya sudah selesaikan sendiri, namun banyak fitur yang kalian dapat tambahkan silahkan berkontribusi yaa!**

## License

-   Copyright © 2023 Ibrahim Rangkuti.
-   **Sistem Pengelolaan Laundry is open-sourced software licensed under the MIT license.**
