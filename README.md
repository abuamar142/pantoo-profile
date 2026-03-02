# Pantoo Landing Web

Landing page awal untuk Pantoo yang dibangun menggunakan Laravel dengan pendekatan **static-first**.

## Project Overview

Pantoo adalah platform SaaS untuk perusahaan distribusi dan logistik yang menggabungkan:

- HRIS
- attendance/compliance
- operasional distribusi multi-cabang

dalam satu ekosistem data terintegrasi.

## Tech Stack

- Laravel 12
- PHP 8.4+
- Blade template

## Cara Menjalankan Project

Karena environment init awal menggunakan container, cara paling aman adalah menjalankan via Docker.

### Opsi 1 (Recommended): Jalankan via Docker

1. Masuk ke root project:

```bash
cd /home/abuamar/Personal/projects/laravel/pantoo/profile
```

2. Jalankan server Laravel dari container PHP 8.4:

```bash
docker run --rm -it \
  -u $(id -u):$(id -g) \
  -v $(pwd):/app \
  -w /app \
  -p 8000:8000 \
  php:8.4-cli \
  sh -lc "php artisan serve --host=0.0.0.0 --port=8000"
```

3. Buka di browser:

```text
http://localhost:8000
```

### Opsi 2: Jalankan secara lokal (tanpa Docker)

Prerequisite:
- PHP `>= 8.4`
- Composer

Langkah:

```bash
cd /home/abuamar/Personal/projects/laravel/pantoo/profile
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Lalu buka:

```text
http://127.0.0.1:8000
```

## Struktur Penting

- `routes/web.php` -> route halaman utama
- `resources/views/welcome.blade.php` -> konten landing page statis

## Status Saat Ini

- [x] Laravel project initialized
- [x] Single index page untuk landing
- [ ] Fitur produk (next phase)
