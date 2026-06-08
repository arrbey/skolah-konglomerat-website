# Design Spec — Website Skolah Konglomerat

Tanggal: 2026-06-08
Status: Disetujui untuk review pengguna

## 1. Tujuan

Membangun website Skolah Konglomerat sebagai landing page publik + admin panel dinamis berbasis Laravel. Website harus terasa premium, otoritatif, dan aspiratif: seperti ruang meeting C-Suite holding company, bukan landing page kursus biasa.

## 2. Scope MVP

Dalam scope:
- Laravel 11 monolith.
- Landing page publik satu halaman di `/`.
- Admin panel `/admin/*` dengan autentikasi.
- Konten dinamis untuk Hero, Masalah, Kenapa, Training, FAQ, Contact, Footer.
- CRUD Training dengan upload gambar ke MinIO object storage.
- CRUD FAQ.
- Form kontak publik opsional.
- Styling Dark Luxury Navy sesuai dokumen desain existing.

Di luar scope MVP:
- Payment gateway.
- Member area.
- Blog.
- Multi-bahasa.
- Mobile app.

## 3. Pendekatan Terpilih

Pendekatan: Laravel monolith lengkap.

Stack:
- Backend: Laravel 11.
- Auth: Laravel Breeze, disesuaikan untuk admin-only.
- Template: Blade.
- Styling: Tailwind CSS.
- Interaksi ringan: Alpine.js.
- Database: MySQL via XAMPP.
- Object storage: MinIO S3-compatible via Laravel `s3` disk.

Alasan:
- Sesuai PRD.
- Cepat dikembangkan.
- Mudah dijalankan di XAMPP.
- Storage tetap siap production karena memakai interface S3-compatible.

## 4. Arsitektur Aplikasi

Route publik:
- `/` → landing page.
- `/contact` POST → submit form kontak.

Route admin:
- `/admin/login` → login.
- `/admin/dashboard` → dashboard.
- `/admin/hero` → edit hero.
- `/admin/masalah` → edit pain points.
- `/admin/kenapa` → edit value props/statistik.
- `/admin/training` → CRUD training.
- `/admin/faq` → CRUD FAQ.
- `/admin/contact` → edit contact.
- `/admin/footer` → edit footer.

Komponen backend:
- `LandingPageController`: mengambil semua konten aktif dan render landing.
- `Admin\DashboardController`: ringkasan konten.
- `Admin\HeroController`: update settings hero.
- `Admin\MasalahController`: update settings + item masalah.
- `Admin\KeunggulanController`: update settings + value props.
- `Admin\TrainingController`: CRUD training + upload/delete object MinIO.
- `Admin\FaqController`: CRUD FAQ.
- `Admin\ContactController`: update contact settings.
- `Admin\FooterController`: update footer settings.

Model:
- `SiteSetting` untuk konten key-value.
- `TrainingProgram` untuk program training.
- `Faq` untuk FAQ.
- `ContactMessage` untuk pesan kontak.
- `User` untuk admin.

## 5. Data Model

### `site_settings`

Untuk konten non-list dan konfigurasi section.

Kolom utama:
- `id`
- `section`
- `key`
- `value`
- timestamps

Contoh key:
- `hero.title`
- `hero.subtitle`
- `hero.cta_primary_text`
- `hero.cta_primary_url`
- `hero.background_image`
- `contact.whatsapp_number`
- `contact.whatsapp_message`
- `footer.tagline`
- `footer.copyright_text`

### `training_programs`

Kolom:
- `id`
- `title`
- `description`
- `image_path`
- `cta_text`
- `cta_url`
- `sort_order`
- `is_active`
- timestamps

### `faqs`

Kolom:
- `id`
- `question`
- `answer`
- `sort_order`
- `is_active`
- timestamps

### `contact_messages`

Kolom:
- `id`
- `name`
- `email`
- `message`
- `is_read`
- timestamps

## 6. MinIO Object Storage

Laravel memakai disk `s3` untuk MinIO.

Environment variable disimpan di `.env` lokal dan tidak boleh dicommit:

```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=__MINIO_ACCESS_KEY__
AWS_SECRET_ACCESS_KEY=__MINIO_SECRET_KEY__
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=__MINIO_BUCKET__
AWS_URL=__MINIO_PUBLIC_BUCKET_URL__
AWS_ENDPOINT=__MINIO_ENDPOINT__
AWS_USE_PATH_STYLE_ENDPOINT=true
```

Object path:
- `hero/` untuk background hero.
- `trainings/` untuk brosur training.
- `site/` untuk logo dan asset umum.

Aturan:
- DB hanya menyimpan path relatif, contoh `trainings/brosur-abc.webp`.
- Render URL memakai `Storage::disk('s3')->url($path)`.
- Saat training dihapus, object terkait ikut dihapus.
- Saat image training diganti, object lama dihapus setelah upload baru sukses.
- Validasi upload: JPG, JPEG, PNG, WebP, maksimal 5MB.

## 7. Landing Page

Section:

1. Hero
   - Fullscreen/min-height besar.
   - Headline serif besar.
   - Subtitle singkat.
   - CTA primary dan secondary.
   - Background dari MinIO atau gradient fallback.

2. Masalah
   - Title + subtitle.
   - 3–6 kartu pain point.
   - Ikon SVG konsisten.

3. Kenapa Skolah Konglomerat
   - Value proposition 3–6 item.
   - Statistik opsional.
   - Penekanan authority dan sistem bisnis terintegrasi.

4. Training
   - Grid responsive.
   - Card berisi brosur, title, deskripsi, CTA.
   - Klik gambar membuka lightbox Alpine.
   - CTA bisa ke WhatsApp, form, atau URL eksternal.

5. FAQ
   - Accordion smooth.
   - Minimal 4 seed FAQ.
   - Item aktif saja tampil di public.

6. Contact
   - WhatsApp CTA dengan pre-filled message.
   - Info email/alamat opsional.
   - Form kontak opsional dengan validasi.

7. Footer
   - Logo/tagline.
   - Anchor navigation.
   - Social links opsional.
   - Copyright configurable.

## 8. Visual & UX Direction

Style utama: Dark Luxury Navy “C-Suite / holding company”.

Prinsip:
- Background navy gelap berlapis.
- Gold hanya sebagai aksen premium tertinggi.
- Blue hanya untuk aksi/CTA.
- Serif display untuk headline premium.
- Sans modern untuk body dan UI.
- Mono untuk label kecil/statistik.
- Whitespace luas, grid presisi, noise/glow sangat halus.

UX rules:
- Mobile-first.
- 1 kolom mobile, 2 tablet, 3 desktop untuk grid training.
- Touch target minimal 44px.
- Contrast minimal WCAG AA.
- Focus ring jelas.
- Tidak mengandalkan hover saja.
- Animasi hanya `opacity` dan `transform`.
- Respect `prefers-reduced-motion`.
- Lazy-load gambar non-hero.
- Aspect ratio eksplisit untuk mencegah layout shift.

## 9. Admin Panel

Layout:
- Sidebar navigation.
- Topbar dengan user + logout.
- Responsive untuk tablet/mobile.
- Flash message sukses/error.

Menu:
- Dashboard.
- Hero.
- Masalah.
- Kenapa.
- Training.
- FAQ.
- Contact.
- Footer.

Form pattern:
- Label terlihat jelas.
- Helper text untuk field kompleks.
- Error inline di bawah field.
- Preview gambar sebelum simpan.
- Tombol Save dan Preview Landing.
- Toggle aktif/nonaktif untuk item list.

Dashboard:
- Jumlah training aktif.
- Jumlah FAQ aktif.
- Status contact form.
- Warning badge untuk konten penting yang kosong.

Training admin:
- Tabel list: thumbnail, judul, status, urutan, aksi.
- Create/edit form.
- Toggle aktif.
- Delete confirmation.
- Upload image ke MinIO.

FAQ admin:
- Tabel list: urutan, pertanyaan, status, aksi.
- Create/edit form.
- Toggle aktif.
- Delete confirmation.

## 10. Security & Validation

Security:
- Semua route `/admin/*` memakai middleware `auth` kecuali login.
- Login memakai throttle.
- CSRF token di semua form mutasi.
- Eloquent ORM untuk DB.
- Blade escape default memakai `{{ }}`.
- Rich text disanitasi sebelum simpan/tampil bila HTML diizinkan.
- Upload dibatasi MIME, extension, ukuran.
- Credential MinIO tidak dicommit.

Validation:

Contact form:
```php
[
    'name' => 'required|string|max:100',
    'email' => 'required|email|max:150',
    'message' => 'required|string|min:10|max:2000',
]
```

Training create:
```php
[
    'title' => 'required|string|max:200',
    'description' => 'nullable|string|max:500',
    'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
    'cta_text' => 'required|string|max:50',
    'cta_url' => 'required|url|max:500',
    'sort_order' => 'nullable|integer|min:0',
    'is_active' => 'boolean',
]
```

Training update sama seperti create, tetapi `image` nullable.

## 11. Error Handling

- Validation error tampil inline.
- Upload gagal tampil flash error.
- Object delete gagal dicatat ke log dan tidak merusak request utama jika record sudah dihapus.
- 404 custom dengan CTA kembali ke landing.
- 500 custom dengan pesan ramah.
- Form kontak gagal validasi kembali ke section contact dengan error.

## 12. Testing

Feature tests:
- Admin tidak bisa akses dashboard tanpa login.
- Admin bisa login/logout.
- Landing page render konten dari DB.
- Training CRUD sukses dengan `Storage::fake('s3')`.
- Training delete menghapus object fake disk.
- FAQ CRUD sukses.
- Contact form validasi gagal/sukses.

Manual QA:
- Test mobile 375px.
- Test tablet 768px.
- Test desktop 1280px.
- Test keyboard navigation.
- Test lightbox close via tombol dan Escape.
- Test MinIO URL gambar tampil.

## 13. Acceptance Criteria

- Landing page `/` tampil lengkap: Hero, Masalah, Kenapa, Training, FAQ, Contact, Footer.
- Semua konten utama berasal dari database.
- Admin dapat login.
- Route admin terlindungi auth.
- Admin dapat edit semua section.
- Admin dapat CRUD training dan upload gambar ke MinIO.
- Admin dapat CRUD FAQ.
- Gambar training tampil dan bisa dibuka lightbox.
- FAQ accordion berfungsi.
- WhatsApp CTA memakai nomor dan pesan dari settings.
- Website responsive di mobile/tablet/desktop.
- Form memiliki validasi dan error jelas.
- Credential rahasia tidak tertulis dalam file tracked.

## 14. Catatan Implementasi

- Jangan commit `.env`.
- Gunakan placeholder credential di dokumentasi/config example.
- Jalankan migrasi dan seeder default setelah setup.
- Gunakan komponen Blade reusable untuk admin form field, card, button, dan flash message agar UI konsisten.
