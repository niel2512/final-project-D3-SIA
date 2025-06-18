# Sistem Prediksi Financial Distress dengan Model Zmijewski

## 📜 Deskripsi Proyek

Proyek ini merupakan sebuah **Sistem Informasi untuk Menganalisis dan Memprediksi Potensi Kebangkrutan (Financial Distress)** pada perusahaan. Aplikasi ini dibangun sebagai syarat kelulusan program Diploma 3 (D3) Sistem Informasi Akuntansi.

Fokus utama dari aplikasi ini adalah implementasi **Model Zmijewski (X-Score)**, sebuah model statistik yang digunakan untuk memprediksi kemungkinan sebuah perusahaan mengalami kesulitan keuangan. Sistem ini memungkinkan pengguna untuk memasukkan data dari laporan keuangan perusahaan dan secara otomatis menghitung skor Zmijewski serta memberikan interpretasi hasilnya.

---

## 🔬 Model Zmijewski

Aplikasi ini menggunakan model Zmijewski X-Score untuk menilai kesehatan finansial perusahaan. Model ini didasarkan pada tiga rasio keuangan utama:

**Formula:**
`X = -4.3 - 4.5(X1) + 5.7(X2) - 0.4(X3)`

* **X1 (Return On Assets / ROA):** `Laba Bersih / Total Aset`
* **X2 (Debt Ratio / DAR):** `Total Hutang / Total Aset`
* **X3 (Current Ratio):** `Aset Lancar / Hutang Lancar`

**Interpretasi Hasil:**
* Jika **X > 0**, perusahaan dikategorikan sebagai **Non-Financial Distress** (Sehat).
* Jika **X < 0**, perusahaan dikategorikan sebagai **Financial Distress** (Berpotensi Bangkrut).

## ✨ Fitur Utama

* **👤 Manajemen Pengguna:** Sistem autentikasi untuk mengamankan akses.
* **🏢 Manajemen Data Perusahaan:** Mengelola daftar perusahaan yang akan dianalisis.
* **🔢 Input Laporan Keuangan:** Form untuk memasukkan data-data kunci dari laporan keuangan (Total Aset, Total Hutang, Laba Bersih, Aset Lancar, Hutang Lancar).
* **⚙️ Kalkulasi Otomatis:** Sistem secara otomatis menghitung rasio keuangan dan skor Zmijewski berdasarkan data yang diinput.
* **📊 Hasil dan Interpretasi:** Menampilkan hasil skor dengan jelas beserta kesimpulan apakah perusahaan berada dalam kondisi *financial distress* atau tidak.
* **🗂️ Riwayat Analisis:** Menyimpan dan menampilkan riwayat analisis yang pernah dilakukan.

## 🛠️ Teknologi yang Digunakan

* **Bahasa Pemrograman:** PHP 8+
* **Framework:** Laravel 12
* **Database:** MySQL
* **Frontend:** Blade Engine & Tailwindcss
* **Server Lokal:** XAMPP / Laragon / Laravel Herd

## ⚙️ Panduan Instalasi Lokal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan pengembangan lokal Anda.

#### 1. Prasyarat

* Pastikan Anda sudah menginstal **Composer**.
* Pastikan Anda sudah menginstal **PHP** (versi 8.1 atau lebih baru).
* Pastikan Anda memiliki server database **MySQL**.

#### 2. Instalasi Proyek

1.  **Clone Repositori**
    Buka terminal atau Git Bash dan jalankan perintah berikut:
    ```bash
    git clone [https://github.com/niel2512/final-project-D3-SIA.git](https://github.com/niel2512/final-project-D3-SIA.git)
    cd final-project-D3-SIA
    ```

2.  **Instal Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Salin File Environment**
    Buat file `.env` dengan menyalin dari file contoh.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Kunci Aplikasi**
    Perintah ini penting untuk keamanan aplikasi Laravel.
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan konfigurasi database Anda.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_prediksi_zmijewski
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    Pastikan Anda sudah membuat database kosong dengan nama yang sesuai.

6.  **Jalankan Migrasi dan Seeder**
    Perintah ini akan membuat semua struktur tabel dan mengisi data awal yang diperlukan (seperti data user admin).
    ```bash
    php artisan migrate --seed
    ```
---
Proyek ini dibuat oleh **Nathaniel Yusuf Langelo** sebagai bagian dari pemenuhan Tugas Akhir program studi D3 Sistem Informasi Akuntansi.
