# Pantoo Company Profile Web

Landing page perusahaan **Pantoo** berbasis Laravel dengan pendekatan **static-first**.  
Fokus fase ini adalah company profile yang ringan, modern, dan siap dikembangkan ke fitur aplikasi berikutnya.

## Ringkasan

Pantoo adalah platform SaaS untuk operasional perusahaan distribusi dan logistik multi-cabang, dengan fokus pada:

- HRMS (attendance, payroll, approval workflow)
- Kontrol operasional lintas cabang/divisi
- Data terpusat dalam satu ekosistem

## Tech Stack

- Laravel 12
- PHP `^8.2`
- Blade Template
- Tailwind CSS v4
- Vite 7

## Struktur Utama

- `routes/web.php` - route landing page (`/`)
- `resources/views/welcome.blade.php` - konten utama company profile
- `resources/css/app.css` - design system (token warna, komponen, dark/light mode)
- `resources/js/app.js` - bootstrap JS Vite

## Menjalankan Project

### Opsi A - Local Native

Prerequisite:

- PHP `>= 8.2`
- Composer
- Node.js `>= 20` + npm

Langkah:

```bash
cd /home/abuamar/Personal/projects/laravel/pantoo/profile
composer install
cp .env.example .env
php artisan key:generate
npm install
```

Jalankan development server:

```bash
php artisan serve
npm run dev
```

Buka:

```text
http://127.0.0.1:8000
```

### Opsi B - Docker (PHP di container)

Install dependency PHP (sekali saat awal):

```bash
docker run --rm -u $(id -u):$(id -g) \
  -v $(pwd):/app -w /app \
  composer:2 composer install
```

Jalankan Laravel server dari container:

```bash
docker run --rm -it \
  -u $(id -u):$(id -g) \
  -v $(pwd):/app \
  -w /app \
  -p 8000:8000 \
  php:8.4-cli \
  sh -lc "php artisan serve --host=0.0.0.0 --port=8000"
```

Jalankan Vite (di host):

```bash
npm install
npm run dev
```

Buka:

```text
http://localhost:8000
```

## Build & Maintenance

Build asset production:

```bash
npm run build
```

Cache ulang view (opsional, untuk validasi):

```bash
php artisan view:clear
php artisan view:cache
```