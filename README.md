# Sistem Pemesanan Kendaraan Perusahaan Tambang Nikel

## Deskripsi Proyek
Aplikasi web untuk manajemen pemesanan kendaraan perusahaan tambang nikel dengan fitur pemesanan, monitoring, dan pelaporan terintegrasi. Digunakan untuk technical test Sekawan Media

## Fitur Utama
### Manajemen Pengguna
- **Admin**:
  - Melakukan input pemesanan kendaraan
  - Menentukan driver 
  - Menunjuk pihak yang menyetujui pemesanan

- **Pihak Penyetuju**:
  - Sistem persetujuan berjenjang (2 level)
  - Menyetujui/menolak pemesanan kendaraan melalui aplikasi

- **User**:
  - Mengembalikan kendaraan yang telah berhasil dipesan

### Fungsionalitas Sistem
- Dashboard grafik penggunaan kendaraan
- Laporan pemesanan kendaraan dengan export Excel
- Pencatatan log aktivitas aplikasi
- Jadwal service kendaraan
- Riwayat pemakaian kendaraan

## Teknologi yang Digunakan
- **Bahasa Pemrograman**: PHP 8.1
- **Framework**: Laravel 10
- **Database**: MySQL 8.0
- **Frontend**: Tailwind CSS

## Persyaratan Sistem
- PHP 8.1 atau lebih baru
- Composer
- MySQL 8.0

## Panduan Instalasi

### Prasyarat
- Pastikan Anda telah menginstal Composer
- Miliki database MySQL siap digunakan

### Langkah Instalasi

1. Clone Repositori
```bash
git clone https://github.com/rafsanalhad/VehicleBooking_SekawanMedia.git
cd VehicleBooking_SekawanMedia
```

2. Salin Konfigurasi
```bash
cp .env.example .env
```

3. Konfigurasi Database
- Buka file `.env`
- Sesuaikan konfigurasi database:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nama_database
  DB_USERNAME=root
  DB_PASSWORD=
  ```

4. Install Dependensi
```bash
composer install
```

5. Migrasi Database & Seeder
```bash
php artisan migrate:fresh --seed
```

6. Jalankan Aplikasi
```bash
php artisan serve
```

### Usermanual
- **Link**: https://drive.google.com/file/d/1acn1IusSqq1j3LiCSbmEzqs2jjOmS0_Y/view?usp=sharing

### Activity Diagram
- **Link**: https://drive.google.com/file/d/17VhD5h2DdDkIsGCrAqwRP_9t44I2IStW/view?usp=sharing

### PDM
- **Link**: https://drive.google.com/file/d/10hPDnfj8VQAqsVzGk4PL-_PqTdK207v3/view?usp=sharing

## Akun Default

### Admin
- **Email**: admin@gmail.com
- **Password**: admin

### Penyetuju Level 1
- **Email**: rizki@gmail.com
- **Password**: rizki

### Penyetuju Level 2
- **Email**: dani@gmail.com
- **Password**: dani

### User
- **Email**: supardi@gmail.com
- **Password**: supardi

### User
- **Email**: suyatno@gmail.com
- **Password**: suyatno

### User
- **Email**: sudarmo@gmail.com
- **Password**: sudarmo

### User
- **Email**: sudarmin@gmail.com
- **Password**: sudarmin

## Kontak
harafsan22@gmail.com