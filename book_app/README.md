# Soal No 3 API CRUD

- Aplikasi API CRUD dibangun menggunakan :
    1. Laravel 8
    2. MySQL
 
- Untuk menggunakan Aplikasi ini, clone repository ini :
    - `https://github.com/marcellbs/TTg-Developer-Test/book_app/`
 
- Instalasi Dependency menggunakan perintah
  - `composer install`
- Copy file `.env`
  - `cp .env.example .env`
- Generete key menggunakan perintah
    - `php artisan key:generate`
- Copy File SQL ke dalam Database XAMPP
- kemudian buka 2 terminal :
    1. Ketikkan pada terminal 1 :
          `php artisan serve`
    2. Di terminal 2 ketikkan :
           `php artisan serve --port:8001`
- Setalah itu aplikasi bisa dijalankan dengan mengunjung :
    - laman `http://localhost:8000/api/buku` digunakan untuk melihat isi daripada api yang dibuat
    - laman `http://localhost:8001/buku` digunakan untuk halaman frontend
 
- Informasi
    - Laravel tidak dapat menjalankan 2 route sekaligus, dikarenakan laravel hanya bisa menangani 1 thread sehingga akan terjadi infinite loading yang menyebabkan aplikasi tidak dapat dipakai.
    - Teknologi yang digunakan adalah
        1. HTML
        2. Bootstrap
        3. PHP

