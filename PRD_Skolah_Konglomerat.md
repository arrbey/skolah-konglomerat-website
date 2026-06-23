# PRD — Product Requirements Document
# Website Skolah Konglomerat

**Versi:** 1.0  
**Tanggal:** Juni 2026  
**Status:** Draft  
**Tech Stack:** Laravel (Backend + Blade Templating)

---

## 1. Overview

### 1.1 Latar Belakang Produk

**Skolah Konglomerat** adalah platform edukasi bisnis yang dirancang untuk mempersiapkan para pengusaha dan calon pengusaha membangun *arsitektur bisnis* yang terintegrasi — bukan sekadar mengelola satu usaha, tetapi membangun kelompok usaha (konglomerat) yang tumbuh secara sistematis.

> **Definisi Konglomerat (versi Skolah Konglomerat):**
> Konglomerat adalah kelompok usaha yang mengorganisasikan berbagai bisnis dalam satu struktur yang terintegrasi untuk menciptakan pertumbuhan, efisiensi, dan nilai jangka panjang melalui tata kelola, investasi, dan sinergi yang terencana.

### 1.2 Tujuan Website

Website ini berfungsi sebagai **company profile digital sekaligus alat pemasaran** untuk program pelatihan Skolah Konglomerat. Tujuan utamanya:

1. Membangun kesadaran (awareness) tentang pentingnya membangun bisnis ala konglomerat.
2. Menarik calon peserta training melalui konten edukatif dan bukti sosial.
3. Mengonversi pengunjung menjadi leads (calon peserta) melalui CTA yang terarah.
4. Memberikan kemudahan bagi admin dalam memperbarui konten tanpa coding.

### 1.3 Target Pengguna

| Segmen | Deskripsi |
|--------|-----------|
| **Pengusaha UMKM** | Memiliki 1–3 bisnis, ingin ekspansi secara terstruktur |
| **Calon Pengusaha** | Profesional/karyawan yang ingin membangun ekosistem bisnis |
| **Investor Pemula** | Ingin belajar alokasi modal antar unit bisnis |
| **Admin Website** | Tim internal Skolah Konglomerat yang mengelola konten |

---

## 2. Scope Proyek

### 2.1 Dalam Scope (In Scope)

- Landing Page publik 1 halaman (multi-section, single scroll)
- Halaman Admin Panel untuk manajemen konten
- Sistem autentikasi admin (login/logout)
- Upload dan manajemen gambar brosur training
- Manajemen konten dinamis untuk semua section

### 2.2 Di Luar Scope (Out of Scope)

- Sistem pendaftaran peserta online (payment gateway)
- Member area / portal peserta
- Blog / artikel
- Multi-bahasa
- Mobile app

---

## 3. Struktur Halaman Landing Page

Website terdiri dari **1 halaman publik** dengan 6 section + footer, dan 1 area **Admin Panel** yang terpisah.

```
/                   → Landing Page (publik)
/admin              → Login Admin
/admin/dashboard    → Dashboard Admin
/admin/hero         → Kelola Section 1 (Hero)
/admin/masalah      → Kelola Section 2 (Masalah)
/admin/kenapa       → Kelola Section 3 (Kenapa Skolah Konglomerat)
/admin/training     → Kelola Section 4 (Training / Brosur)
/admin/faq          → Kelola Section 5 (QnA)
/admin/contact      → Kelola Section 6 (Contact Us)
/admin/footer       → Kelola Footer
```

---

## 4. Spesifikasi Fitur — Landing Page

### 4.1 Section 1 — Hero Section

**Tujuan:** Memberikan first impression yang kuat dan mengkomunikasikan value proposition utama dalam 3 detik pertama.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Headline Utama | Teks besar, bold, eye-catching (max 12 kata) |
| Sub-headline | Penjelasan singkat proposi nilai (max 2 kalimat) |
| CTA Button Utama | Tombol aksi utama (contoh: "Daftar Sekarang") — link bisa dikonfigurasi |
| CTA Button Sekunder | Tombol sekunder (contoh: "Pelajari Lebih Lanjut") — link bisa dikonfigurasi |
| Background Visual | Gambar/gradient background yang bisa diupload admin |

**Behavior:**
- Full-screen height (100vh) atau min-height sesuai konten.
- Animasi masuk (fade-in / slide-up) pada teks saat halaman dimuat.
- Smooth scroll ke section berikutnya saat CTA "Pelajari Lebih Lanjut" diklik.

**Dapat dikelola admin:** Headline, sub-headline, teks CTA, URL CTA, background image.

---

### 4.2 Section 2 — Masalah (Pain Points)

**Tujuan:** Membuat pengunjung merasa *dipahami* dengan mengidentifikasi masalah nyata yang mereka hadapi — yang menjadi alasan Skolah Konglomerat hadir.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Section Title | Judul section (contoh: "Mengapa Banyak Pengusaha Gagal Berkembang?") |
| Section Subtitle | Paragraf pembuka untuk konteks |
| Daftar Masalah | Kartu/item masalah (ikon + judul + deskripsi singkat), minimal 3, maksimal 6 |

**Contoh konten default:**
- Bisnis berjalan sendiri-sendiri, tidak ada sinergi antar unit
- Modal terfragmentasi, tidak ada strategi alokasi yang terintegrasi
- Tidak ada sistem tata kelola yang jelas untuk ekspansi
- Pertumbuhan stagnan karena tidak ada ekosistem bisnis yang mendukung

**Dapat dikelola admin:** Section title, subtitle, dan setiap item masalah (ikon, judul, deskripsi).

---

### 4.3 Section 3 — Kenapa Skolah Konglomerat

**Tujuan:** Menjawab pertanyaan pengunjung: *"Mengapa harus Skolah Konglomerat dan bukan yang lain?"* — membangun diferensiasi dan kepercayaan.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Section Title | Judul section |
| Section Subtitle | Paragraf nilai utama |
| Keunggulan / Value Props | Kartu fitur unggulan (ikon + judul + deskripsi), minimal 3, maksimal 6 |
| Statistik / Angka | Highlight angka pencapaian (contoh: "500+ Alumni", "10+ Kota", dll), opsional |

**Dapat dikelola admin:** Section title, subtitle, setiap item keunggulan, dan angka statistik.

---

### 4.4 Section 4 — Training Programs

**Tujuan:** Menampilkan program pelatihan yang tersedia dalam bentuk visual brosur, disertai tombol CTA untuk mendaftar atau mengetahui lebih lanjut.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Section Title | Judul section (contoh: "Program Training Kami") |
| Section Subtitle | Deskripsi singkat |
| Kartu Training | Setiap kartu berisi: gambar brosur (diupload), judul training, deskripsi singkat, tombol CTA |
| CTA Button per Training | Teks tombol dan URL tujuan yang bisa dikonfigurasi per item |

**Behavior:**
- Gambar brosur ditampilkan sebagai card dengan aspect ratio konsisten.
- Klik gambar brosur membuka modal/lightbox untuk melihat gambar lebih besar.
- Tombol CTA bisa mengarah ke: URL eksternal (WhatsApp, form, halaman lain) atau anchor di halaman yang sama.
- Kartu ditampilkan dalam grid (3 kolom desktop, 2 tablet, 1 mobile).

**Dapat dikelola admin:**
- Tambah, edit, hapus program training.
- Upload gambar brosur (format: JPG, PNG, WebP, maks 5MB).
- Atur judul, deskripsi, teks CTA, URL CTA.
- Atur urutan tampil (drag & drop atau nomor urut).
- Aktif/nonaktif per item.

---

### 4.5 Section 5 — QnA (Frequently Asked Questions)

**Tujuan:** Menjawab pertanyaan umum pengunjung secara proaktif untuk mengurangi hambatan konversi.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Section Title | Judul section (contoh: "Pertanyaan yang Sering Diajukan") |
| Section Subtitle | Teks opsional |
| Daftar FAQ | Item pertanyaan-jawaban dalam format accordion (expand/collapse) |

**Behavior:**
- Accordion: hanya satu item yang terbuka dalam satu waktu (atau bisa multi-open, dikonfigurasi).
- Animasi smooth saat accordion expand/collapse.
- Minimal 4 item FAQ, tidak ada batas maksimum.

**Contoh FAQ default:**
- Siapa yang cocok mengikuti Skolah Konglomerat?
- Berapa lama program training berlangsung?
- Apakah tersedia program online atau hanya offline?
- Apakah ada sertifikat setelah mengikuti training?

**Dapat dikelola admin:** Section title, subtitle, tambah/edit/hapus item FAQ (pertanyaan + jawaban), atur urutan.

---

### 4.6 Section 6 — Contact Us

**Tujuan:** Memberikan cara mudah bagi pengunjung untuk menghubungi tim Skolah Konglomerat.

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Section Title | Judul section |
| Section Subtitle | Ajakan untuk menghubungi |
| Info Kontak | Nomor WhatsApp, email, alamat (opsional) |
| Tombol WhatsApp | Deep link ke WhatsApp dengan pesan pre-filled |
| Form Kontak (opsional) | Nama, email, pesan — dikirim ke email admin |
| Peta Lokasi (opsional) | Embed Google Maps |

**Behavior:**
- Tombol WhatsApp membuka `https://wa.me/{nomor}?text={pesan}` di tab baru.
- Form kontak (jika diaktifkan) mengirim notifikasi ke email yang dikonfigurasi admin.
- Validasi form: nama (required), email (required, format valid), pesan (required, min 10 karakter).

**Dapat dikelola admin:** Semua info kontak, teks WhatsApp pre-filled message, aktif/nonaktif form kontak, embed Maps URL.

---

### 4.7 Footer

**Konten:**
| Elemen | Keterangan |
|--------|-----------|
| Logo + Tagline | Logo Skolah Konglomerat dan kalimat singkat |
| Link Navigasi | Anchor link ke setiap section |
| Social Media | Icon + link ke Instagram, YouTube, LinkedIn, TikTok (opsional per platform) |
| Copyright | Teks copyright yang bisa dikonfigurasi |

**Dapat dikelola admin:** Tagline, link social media (URL per platform, aktif/nonaktif), teks copyright.

---

## 5. Spesifikasi Fitur — Admin Panel

### 5.1 Autentikasi Admin

- Login dengan email + password.
- Satu akun admin (single admin, sesuai kebutuhan MVP).
- Session-based authentication menggunakan Laravel built-in Auth.
- Halaman login di `/admin/login`.
- Redirect ke `/admin/dashboard` setelah login berhasil.
- Middleware `auth` melindungi semua route `/admin/*`.
- Fitur "Remember Me" (opsional).
- Tombol Logout.

---

### 5.2 Dashboard Admin

**Konten:**
- Ringkasan cepat: jumlah training aktif, jumlah FAQ, status form kontak.
- Navigasi sidebar ke semua section yang bisa dikelola.
- Indikator konten yang belum diisi (warning badge).

---

### 5.3 Manajemen Konten Per Section

Setiap halaman admin untuk setiap section memiliki pola yang konsisten:

| Aksi | Keterangan |
|------|-----------|
| **View** | Melihat konten saat ini |
| **Edit** | Form edit dengan field sesuai konten section |
| **Save** | Simpan perubahan ke database |
| **Preview** | Link untuk melihat landing page di tab baru |

**Field editor menggunakan:**
- Input teks biasa untuk judul, teks pendek.
- Textarea atau Rich Text Editor (TinyMCE/CKEditor) untuk deskripsi panjang.
- File upload untuk gambar (dengan preview sebelum simpan).
- Toggle aktif/nonaktif untuk item yang bisa disembunyikan.
- Input URL untuk link/CTA.
- Color picker (jika diperlukan untuk kustomisasi warna per section).

---

### 5.4 Manajemen Training (Section 4) — Detail

Karena section ini paling dinamis, spesifikasinya lebih rinci:

**List View:**
- Tabel daftar semua program training.
- Kolom: Thumbnail, Judul, Status (Aktif/Nonaktif), Urutan, Aksi (Edit/Hapus).
- Tombol "Tambah Training Baru".

**Form Tambah / Edit:**
```
- Judul Training        [text input, required]
- Deskripsi Singkat     [textarea, max 200 karakter]
- Gambar Brosur         [file upload, JPG/PNG/WebP, maks 5MB]
                        [preview thumbnail saat file dipilih]
- Teks Tombol CTA       [text input, contoh: "Daftar Sekarang"]
- URL CTA               [url input, bisa WhatsApp link atau URL eksternal]
- Urutan Tampil         [number input]
- Status                [toggle: Aktif / Nonaktif]
```

**Hapus:**
- Konfirmasi modal sebelum hapus.
- Menghapus record dan file gambar dari storage.

---

### 5.5 Manajemen FAQ (Section 5) — Detail

**List View:**
- Daftar FAQ dalam tabel.
- Kolom: Urutan, Pertanyaan (truncated), Status, Aksi (Edit/Hapus).
- Tombol "Tambah FAQ Baru".

**Form Tambah / Edit:**
```
- Pertanyaan    [text input, required]
- Jawaban       [textarea / rich text, required]
- Urutan        [number input]
- Status        [toggle: Aktif / Nonaktif]
```

---

## 6. User Flow

### 6.1 Alur Pengunjung (Visitor Flow)

```
Buka Website (/)
    │
    ▼
[Section 1: Hero]
    Baca headline & sub-headline
    Klik CTA "Pelajari Lebih Lanjut"
    │
    ▼
[Section 2: Masalah]
    Merasa relate dengan masalah yang disebutkan
    │
    ▼
[Section 3: Kenapa Skolah Konglomerat]
    Memahami diferensiasi & value proposition
    │
    ▼
[Section 4: Training]
    Melihat program-program yang tersedia
    Klik gambar brosur → Modal/lightbox terbuka
    Klik tombol CTA → Diarahkan ke WhatsApp / Form pendaftaran
    │
    ▼
[Section 5: QnA]
    Mencari jawaban atas pertanyaan yang tersisa
    │
    ▼
[Section 6: Contact Us]
    Mengirim pesan / klik tombol WhatsApp
    │
    ▼
[Lead Acquired ✓]
```

### 6.2 Alur Admin (Admin Flow)

```
Buka /admin/login
    │
    ▼
Input email + password → Submit
    │
    ├── [Gagal] → Tampil pesan error, kembali ke form login
    │
    └── [Berhasil] → Redirect ke /admin/dashboard
                          │
                          ▼
                     Dashboard Admin
                     (Pilih section yang akan diedit)
                          │
                          ▼
                     Form Edit Section
                     (Ubah konten, upload gambar, atur CTA)
                          │
                          ▼
                     Klik "Simpan"
                          │
                          ├── [Validasi Gagal] → Tampil pesan error inline
                          │
                          └── [Berhasil] → Flash success message
                                           Landing page diperbarui otomatis
```

---

## 7. Arsitektur Sistem

### 7.1 Diagram Alur Data — Update Konten Training

```
sequenceDiagram
    participant Admin as Admin (Browser)
    participant Web as Laravel Web Routes
    participant Ctrl as TrainingController
    participant DB as Database (MySQL)
    participant Store as Storage (public/trainings)

    Admin->>Web: POST /admin/training (form + image)
    Web->>Ctrl: Dispatch ke TrainingController@store
    Ctrl->>Ctrl: Validasi input (rules validation)
    Ctrl->>Store: Simpan file gambar (Storage::put)
    Store-->>Ctrl: Return path gambar
    Ctrl->>DB: INSERT ke tabel training_programs
    DB-->>Ctrl: Konfirmasi sukses
    Ctrl-->>Web: Redirect dengan flash message
    Web-->>Admin: Tampil halaman list + notifikasi "Berhasil Disimpan"
```

### 7.2 Diagram Alur Data — Pengunjung Melihat Landing Page

```
sequenceDiagram
    participant Visitor as Pengunjung (Browser)
    participant Web as Laravel Web Routes
    participant Ctrl as LandingPageController
    participant DB as Database

    Visitor->>Web: GET /
    Web->>Ctrl: LandingPageController@index
    Ctrl->>DB: Ambil semua data konten (hero, masalah, keunggulan, training aktif, faq aktif, contact)
    DB-->>Ctrl: Return semua data
    Ctrl-->>Web: Return view dengan semua data
    Web-->>Visitor: Render landing page lengkap
```

---

## 8. Database Schema

### 8.1 Entity Relationship Diagram

```
erDiagram
    users {
        id BIGINT PK
        name VARCHAR
        email VARCHAR
        password VARCHAR
        remember_token VARCHAR
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    site_settings {
        id BIGINT PK
        section VARCHAR
        key VARCHAR
        value TEXT
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    training_programs {
        id BIGINT PK
        title VARCHAR
        description TEXT
        image_path VARCHAR
        cta_text VARCHAR
        cta_url VARCHAR
        sort_order INT
        is_active BOOLEAN
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    faqs {
        id BIGINT PK
        question VARCHAR
        answer TEXT
        sort_order INT
        is_active BOOLEAN
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    contact_messages {
        id BIGINT PK
        name VARCHAR
        email VARCHAR
        message TEXT
        is_read BOOLEAN
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }
```

### 8.2 Deskripsi Tabel

| Tabel | Deskripsi |
|-------|-----------|
| **users** | Akun admin. Menggunakan tabel default Laravel Auth. |
| **site_settings** | Key-value store untuk semua konten dinamis per section (hero title, hero subtitle, nomor WA, dll). Diakses dengan `SiteSetting::get('hero.title')`. |
| **training_programs** | Data program training: judul, deskripsi, path gambar brosur, CTA, urutan, status aktif. |
| **faqs** | Data pertanyaan dan jawaban: urutan, status aktif. |
| **contact_messages** | Pesan yang masuk dari form kontak di Section 6. |

### 8.3 Contoh Data `site_settings`

| section | key | value |
|---------|-----|-------|
| hero | title | Bangun Imperium Bisnis Anda Seperti Konglomerat |
| hero | subtitle | Pelajari sistem, strategi, dan tata kelola untuk membangun ekosistem bisnis yang terintegrasi |
| hero | cta_primary_text | Daftar Training Sekarang |
| hero | cta_primary_url | https://wa.me/628xxxx |
| hero | cta_secondary_text | Pelajari Lebih Lanjut |
| hero | background_image | images/hero-bg.jpg |
| contact | whatsapp_number | 628xxxxxxxxxx |
| contact | whatsapp_message | Halo, saya tertarik dengan program Skolah Konglomerat |
| footer | copyright_text | © 2026 Skolah Konglomerat. All rights reserved. |

---

## 9. Spesifikasi Teknis

### 9.1 Tech Stack

| Layer | Teknologi |
|-------|-----------|
| **Backend Framework** | Laravel 11.x |
| **Templating** | Laravel Blade |
| **Database** | MySQL 8.x |
| **ORM** | Eloquent ORM |
| **Authentication** | Laravel Breeze (Admin Only) |
| **File Storage** | Laravel Storage (local / `public` disk) |
| **Frontend Styling** | Tailwind CSS 3.x |
| **JavaScript** | Alpine.js (untuk interaksi ringan: accordion, modal) |
| **Rich Text Editor** | TinyMCE atau Quill.js (untuk field deskripsi panjang di admin) |
| **Icons** | Heroicons atau FontAwesome |
| **Fonts** | Geist Mono (sans), JetBrains Mono (mono) |

### 9.2 Struktur Direktori Laravel (Relevan)

```
app/
  Http/
    Controllers/
      LandingPageController.php       ← Render landing page
      Admin/
        AuthController.php            ← Login/logout admin
        DashboardController.php       ← Dashboard admin
        HeroController.php
        MasalahController.php
        KeunggulanController.php
        TrainingController.php        ← CRUD training + upload gambar
        FaqController.php             ← CRUD FAQ
        ContactController.php
        FooterController.php
  Models/
    TrainingProgram.php
    Faq.php
    SiteSetting.php
    ContactMessage.php

resources/
  views/
    landing/
      index.blade.php                 ← Landing page utama
      sections/
        _hero.blade.php
        _masalah.blade.php
        _kenapa.blade.php
        _training.blade.php
        _faq.blade.php
        _contact.blade.php
        _footer.blade.php
    admin/
      layouts/
        app.blade.php                 ← Layout admin (sidebar + topbar)
      dashboard.blade.php
      hero/
        edit.blade.php
      masalah/
        index.blade.php
        edit.blade.php
      training/
        index.blade.php
        create.blade.php
        edit.blade.php
      faq/
        index.blade.php
        create.blade.php
        edit.blade.php
      contact/
        edit.blade.php
      footer/
        edit.blade.php
    auth/
      login.blade.php

routes/
  web.php                             ← Semua route web (landing + admin)

storage/
  app/
    public/
      trainings/                      ← Gambar brosur training
      hero/                           ← Background hero
```

### 9.3 Routes

```php
// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Admin Auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Panel (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Section editors (single-record edit)
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // Training CRUD
    Route::resource('training', TrainingController::class);
    Route::patch('training/{training}/toggle', [TrainingController::class, 'toggle'])->name('training.toggle');

    // FAQ CRUD
    Route::resource('faq', FaqController::class);
    Route::patch('faq/{faq}/toggle', [FaqController::class, 'toggle'])->name('faq.toggle');

    // Contact Settings
    Route::get('/contact', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');

    // Footer Settings
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
});

// Contact Form Submission (Public)
Route::post('/contact', [LandingPageController::class, 'sendContact'])->name('contact.send');
```

---

## 10. Design & UI Guidelines

### 10.1 Color Palette (Blue Navy Theme)

| Nama | Hex | Penggunaan |
|------|-----|-----------|
| **Navy Primary** | `#0A1628` | Background utama, hero section |
| **Navy Deep** | `#060E1A` | Section gelap, footer |
| **Navy Mid** | `#112240` | Card backgrounds, section alternating |
| **Blue Accent** | `#1A5FFF` | CTA button, link, highlight utama |
| **Blue Light** | `#4D8FFF` | Hover state, secondary accent |
| **Gold Accent** | `#F0A500` | Angka statistik, ikon highlight, emphasis |
| **White** | `#FFFFFF` | Teks utama di background gelap |
| **White Muted** | `#A8B8D8` | Teks sekunder, subtitle |
| **White Subtle** | `#4A5A78` | Border, divider, placeholder |

### 10.2 Typography

```css
/* Font Variables */
--font-sans: 'Plus Jakarta Sans', 'Geist', ui-sans-serif, system-ui;
--font-mono: 'JetBrains Mono', monospace;
--font-display: 'Sora', 'Plus Jakarta Sans', sans-serif;

/* Scale */
--text-hero: clamp(2.5rem, 5vw, 4.5rem);   /* Hero headline */
--text-h1: clamp(2rem, 3.5vw, 3rem);        /* Section titles */
--text-h2: clamp(1.5rem, 2.5vw, 2rem);      /* Sub-section */
--text-body: 1rem;                           /* Body text */
--text-small: 0.875rem;                      /* Caption, label */
```

### 10.3 Spacing & Layout

- **Container max-width:** 1200px, center aligned.
- **Section padding:** `py-20 md:py-28` (80px–112px atas-bawah).
- **Card border-radius:** `rounded-2xl` (16px).
- **Grid system:** Tailwind CSS grid utilities.
- **Shadow:** `shadow-lg` dengan warna navy untuk card di background gelap.

### 10.4 Animasi

- **Page load:** Fade-in + slide-up untuk elemen hero (CSS keyframes).
- **Scroll animations:** Intersection Observer API — elemen fade-in saat masuk viewport.
- **Hover states:** Scale transform `hover:scale-105` untuk kartu training.
- **Accordion (FAQ):** Smooth height transition via Alpine.js.
- **Modal/lightbox brosur:** Alpine.js dengan overlay backdrop.

### 10.5 Responsivitas

| Breakpoint | Lebar | Keterangan |
|-----------|-------|-----------|
| Mobile | < 768px | 1 kolom, navigasi hamburger |
| Tablet | 768px – 1024px | 2 kolom untuk grid |
| Desktop | > 1024px | 3 kolom untuk grid training |

---

## 11. Validasi & Error Handling

### 11.1 Validasi Form Kontak (Public)

```php
[
    'name'    => 'required|string|max:100',
    'email'   => 'required|email|max:150',
    'message' => 'required|string|min:10|max:2000',
]
```

### 11.2 Validasi Upload Training (Admin)

```php
[
    'title'       => 'required|string|max:200',
    'description' => 'nullable|string|max:500',
    'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:5120', // 5MB
    'cta_text'    => 'required|string|max:50',
    'cta_url'     => 'required|url|max:500',
    'sort_order'  => 'nullable|integer|min:0',
    'is_active'   => 'boolean',
]
```

### 11.3 Error Handling Umum

- **404:** Custom 404 page dengan link kembali ke landing page.
- **500:** Custom 500 page dengan pesan ramah.
- **Validasi admin:** Error ditampilkan inline di bawah field yang bermasalah (Laravel default validation).
- **Upload gagal:** Flash error message di halaman admin.

---

## 12. Security Considerations

| Risiko | Mitigasi |
|--------|---------|
| Akses tidak sah ke admin | Middleware `auth` di semua route `/admin/*` |
| CSRF | Laravel CSRF token wajib di semua form POST/PUT/DELETE |
| SQL Injection | Eloquent ORM / Query Builder (parameterized queries) |
| XSS | Blade `{{ }}` auto-escape. Rich text content di-sanitize sebelum simpan |
| File Upload Berbahaya | Validasi MIME type dan ekstensi. File disimpan di luar `public/` dengan symlink Storage |
| Brute Force Login | Laravel rate limiting pada route login (`throttle:5,1`) |

---

## 13. Milestones & Prioritas Pengembangan

### Phase 1 — Foundation (Sprint 1)
- [ ] Setup project Laravel + Tailwind CSS + Alpine.js
- [ ] Konfigurasi database + migration semua tabel
- [ ] Sistem autentikasi admin (login/logout)
- [ ] Layout admin panel (sidebar, topbar, responsif)
- [ ] Model + Seeder data default untuk semua section

### Phase 2 — Landing Page (Sprint 2)
- [ ] Blade template landing page (semua 6 section + footer)
- [ ] Styling lengkap dengan blue navy theme
- [ ] Animasi scroll dan hover states
- [ ] Responsivitas mobile/tablet/desktop
- [ ] Lightbox untuk gambar brosur training

### Phase 3 — Admin Panel Content (Sprint 3)
- [ ] Form edit Hero, Masalah, Kenapa
- [ ] CRUD Training (termasuk upload gambar)
- [ ] CRUD FAQ
- [ ] Form edit Contact + Footer
- [ ] Dashboard admin

### Phase 4 — Finalisasi (Sprint 4)
- [ ] Form kontak publik (submit + email notification)
- [ ] Testing & bug fixing
- [ ] Optimasi performa (image compression, lazy loading)
- [ ] SEO dasar (meta title, description, Open Graph)
- [ ] Deployment & konfigurasi production

---

## 14. Acceptance Criteria (Definition of Done)

- [ ] Landing page dapat diakses di `/` dan semua 6 section + footer tampil dengan benar.
- [ ] Semua konten di landing page bersumber dari database (tidak ada hardcode).
- [ ] Admin dapat login dengan email + password yang valid.
- [ ] Admin dapat mengedit semua section melalui admin panel.
- [ ] Admin dapat menambah, mengedit, dan menghapus program training beserta gambar brosur.
- [ ] Admin dapat mengatur CTA URL per training.
- [ ] Gambar brosur tampil di landing page dan bisa dibuka dalam lightbox.
- [ ] Accordion FAQ berfungsi dengan animasi smooth.
- [ ] Tombol WhatsApp di Contact mengarah ke nomor yang dikonfigurasi admin.
- [ ] Website responsif di mobile (375px), tablet (768px), dan desktop (1280px).
- [ ] Semua form memiliki validasi dan menampilkan pesan error yang jelas.
- [ ] Route admin tidak dapat diakses tanpa login (redirect ke `/admin/login`).

---

*Dokumen ini adalah panduan hidup. Setiap perubahan scope atau requirement harus direvisi dan diberi nomor versi baru.*
