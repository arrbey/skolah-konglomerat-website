<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $whatsappNumber = '6281234567890';
        $waUrl = "https://wa.me/{$whatsappNumber}";
        $heroImagePath = $this->putSvgAsset('hero/skolah-konglomerat-hero.svg', 'Skolah Konglomerat', 'Blueprint Holding Company', '#050D1A', '#C9A84C');

        User::query()->updateOrCreate(
            ['email' => 'admin@skolahkonglomerat.test'],
            [
                'name' => 'Admin Skolah Konglomerat',
                'password' => Hash::make('password'),
            ]
        );

        $settings = [
            ['hero', 'title', 'Bangun Holding Company dari Bisnis yang Sudah Anda Miliki'],
            ['hero', 'subtitle', 'Skolah Konglomerat membantu owner UMKM, founder, dan investor membangun struktur bisnis yang rapi: dari mindset konglomerasi, arsitektur holding, alokasi modal, sampai sistem tata kelola yang siap scale.'],
            ['hero', 'background_image', $heroImagePath],
            ['hero', 'cta_primary_text', 'Konsultasi Batch Terdekat'],
            ['hero', 'cta_primary_url', $waUrl.'?text='.urlencode('Halo Skolah Konglomerat, saya ingin konsultasi batch training terdekat.')],
            ['hero', 'cta_secondary_text', 'Lihat Program'],
            ['hero', 'cta_secondary_url', '#training'],
            ['masalah', 'title', 'Bisnis Ramai, Tapi Belum Menjadi Mesin Kekayaan'],
            ['masalah', 'subtitle', 'Banyak owner bekerja sangat keras, namun bisnis tetap sulit naik kelas karena keputusan, struktur, dan arus kas belum dibangun sebagai ekosistem.'],
            ['masalah', 'items', json_encode([
                ['icon' => 'building-office', 'title' => 'Semua unit bisnis masih bergantung pada owner', 'description' => 'Owner menjadi pusat approval, sales, operasional, dan pemadam kebakaran sehingga ekspansi selalu tertahan kapasitas pribadi.'],
                ['icon' => 'banknotes', 'title' => 'Profit habis tanpa strategi alokasi modal', 'description' => 'Laba usaha masuk-keluar tanpa peta investasi, cadangan likuiditas, atau prioritas portofolio yang jelas.'],
                ['icon' => 'chart-bar', 'title' => 'Cabang bertambah tapi kontrol melemah', 'description' => 'Pertumbuhan lokasi, tim, atau produk tidak diimbangi dashboard, SOP, dan governance yang membuat kualitas konsisten.'],
                ['icon' => 'shield-check', 'title' => 'Belum punya struktur holding dan kaderisasi', 'description' => 'Bisnis terlihat besar, tetapi legal, keuangan, kepemimpinan, dan suksesi belum siap untuk diwariskan atau dinaikkan valuasinya.'],
            ], JSON_UNESCAPED_UNICODE)],
            ['kenapa', 'title', 'Belajar Cara Berpikir Owner Kelas Konglomerat'],
            ['kenapa', 'subtitle', 'Materi dirancang praktis untuk pengusaha Indonesia: bukan teori kampus, tapi framework eksekusi untuk merapikan bisnis, membaca angka, dan menyusun peta ekspansi.'],
            ['kenapa', 'items', json_encode([
                ['icon' => 'squares-plus', 'title' => 'Blueprint Holding 90 Hari', 'description' => 'Peserta pulang dengan draft struktur grup usaha, peran tiap entitas, prioritas ekspansi, dan roadmap eksekusi 3 bulan.'],
                ['icon' => 'presentation-chart-line', 'title' => 'Financial Command Center', 'description' => 'Belajar membaca cashflow, margin, unit economics, dan capital allocation agar keputusan tidak sekadar berdasarkan feeling.'],
                ['icon' => 'users', 'title' => 'Kaderisasi Direktur Unit Bisnis', 'description' => 'Ubah tim operasional menjadi pemimpin unit yang bisa memegang target, laporan, dan akuntabilitas.'],
                ['icon' => 'shield-check', 'title' => 'Governance Ringan Tapi Tegas', 'description' => 'Membangun rapat bisnis, scorecard, SOP keputusan, dan kontrol risiko tanpa membuat perusahaan terasa birokratis.'],
            ], JSON_UNESCAPED_UNICODE)],
            ['kenapa', 'stats', json_encode([
                ['value' => '750+', 'label' => 'Owner & profesional belajar'],
                ['value' => '18', 'label' => 'Batch intensif berjalan'],
                ['value' => '6', 'label' => 'Modul inti konglomerasi'],
                ['value' => '90 Hari', 'label' => 'Roadmap implementasi'],
            ], JSON_UNESCAPED_UNICODE)],
            ['training', 'title', 'Program Training Skolah Konglomerat'],
            ['training', 'subtitle', 'Pilih program sesuai fase bisnis Anda: merapikan fondasi, membangun holding, menguatkan finance, atau menyiapkan ekspansi multi-unit.'],
            ['faq', 'title', 'Pertanyaan yang Sering Diajukan'],
            ['faq', 'subtitle', 'Informasi awal sebelum Anda menghubungi tim admission kami. Semua detail batch, harga, dan jadwal akan dikonfirmasi via WhatsApp.'],
            ['contact', 'title', 'Siap Mengubah Bisnis Menjadi Grup Usaha yang Terstruktur?'],
            ['contact', 'subtitle', 'Ceritakan kondisi bisnis Anda. Tim kami akan membantu merekomendasikan program yang paling relevan untuk fase pertumbuhan Anda.'],
            ['contact', 'whatsapp_number', $whatsappNumber],
            ['contact', 'whatsapp_message', 'Halo Skolah Konglomerat, saya ingin konsultasi program dan jadwal batch terdekat.'],
            ['contact', 'email', 'admission@skolahkonglomerat.id'],
            ['contact', 'address', 'Jakarta Selatan, Indonesia — tersedia program offline, online, dan in-house corporate training.'],
            ['contact', 'form_enabled', '1'],
            ['footer', 'tagline', 'Sekolah bisnis praktis untuk owner yang ingin naik kelas dari operator menjadi arsitek grup usaha.'],
            ['footer', 'copyright_text', '© 2026 Skolah Konglomerat. Semua hak dilindungi.'],
        ];

        foreach ($settings as [$section, $key, $value]) {
            SiteSetting::setValue($section, $key, $value);
        }

        $programs = [
            [
                'title' => 'Konglomerat Business Architecture',
                'description' => 'Program fondasi 2 hari untuk memetakan struktur holding, relasi antar unit bisnis, peta ekspansi, dan dashboard owner.',
                'color' => '#C9A84C',
                'sort_order' => 1,
            ],
            [
                'title' => 'Capital Allocation Masterclass',
                'description' => 'Workshop membaca cashflow, margin, unit economics, dan prioritas penggunaan profit agar bisnis tumbuh tanpa mengorbankan likuiditas.',
                'color' => '#3B82F6',
                'sort_order' => 2,
            ],
            [
                'title' => 'Scale-Up Governance System',
                'description' => 'Training membuat scorecard, rapat manajemen, SOP keputusan, delegasi direktur unit, dan kontrol risiko untuk bisnis multi-cabang.',
                'color' => '#14B8A6',
                'sort_order' => 3,
            ],
            [
                'title' => 'Private Boardroom for Founders',
                'description' => 'Sesi terbatas bersama mentor untuk membedah kondisi bisnis peserta dan menyusun roadmap 90 hari yang realistis dieksekusi.',
                'color' => '#A855F7',
                'sort_order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            TrainingProgram::query()->updateOrCreate(
                ['title' => $program['title']],
                [
                    'description' => $program['description'],
                    'image_path' => $this->putSvgAsset(
                        'trainings/'.str($program['title'])->slug().'.svg',
                        $program['title'],
                        'Skolah Konglomerat Training',
                        '#07162A',
                        $program['color']
                    ),
                    'cta_text' => 'Konsultasi Program',
                    'cta_url' => $waUrl.'?text='.urlencode('Halo, saya tertarik dengan program '.$program['title'].'.'),
                    'sort_order' => $program['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        $faqs = [
            ['Siapa yang paling cocok mengikuti program ini?', 'Owner UMKM, founder startup, pebisnis keluarga, operator multi-cabang, profesional yang sedang membangun bisnis sampingan, dan investor pemula yang ingin memahami cara membangun grup usaha secara rapi.'],
            ['Apakah program ini cocok untuk bisnis yang masih kecil?', 'Ya. Justru semakin awal struktur bisnis dirapikan, semakin mudah owner menghindari kebocoran cashflow, salah rekrut, ekspansi terlalu cepat, dan keputusan yang tidak terukur.'],
            ['Apa hasil konkret setelah mengikuti training?', 'Peserta akan membawa draft blueprint holding, daftar prioritas pembenahan, scorecard bisnis, peta alokasi modal, dan roadmap 90 hari sesuai fase bisnis masing-masing.'],
            ['Apakah training hanya offline?', 'Tersedia format offline intensif, online cohort, dan in-house training untuk tim perusahaan. Jadwal bergantung pada batch yang sedang dibuka.'],
            ['Apakah ada pendampingan setelah kelas?', 'Beberapa program memiliki opsi follow-up clinic atau private boardroom agar peserta bisa mengevaluasi implementasi setelah training selesai.'],
            ['Apakah materi membahas legal dan pajak?', 'Materi membahas prinsip struktur legal, holding, risiko, dan governance secara strategis. Untuk keputusan legal/pajak final, peserta tetap disarankan berkonsultasi dengan konsultan resmi.'],
            ['Bagaimana cara daftar batch terbaru?', 'Klik tombol konsultasi WhatsApp, ceritakan kondisi bisnis Anda, lalu tim admission akan mengirim jadwal, format kelas, investasi program, dan rekomendasi kelas yang sesuai.'],
        ];

        foreach ($faqs as $index => [$question, $answer]) {
            Faq::query()->updateOrCreate(
                ['question' => $question],
                ['answer' => $answer, 'sort_order' => $index + 1, 'is_active' => true]
            );
        }
    }

    private function putSvgAsset(string $path, string $title, string $subtitle, string $background, string $accent): string
    {
        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="720" viewBox="0 0 1200 720" role="img" aria-label="{$title}">
  <defs>
    <linearGradient id="g" x1="0" x2="1" y1="0" y2="1">
      <stop offset="0" stop-color="{$background}"/>
      <stop offset="1" stop-color="#0D1E35"/>
    </linearGradient>
    <radialGradient id="r" cx="75%" cy="20%" r="65%">
      <stop offset="0" stop-color="{$accent}" stop-opacity="0.38"/>
      <stop offset="1" stop-color="{$accent}" stop-opacity="0"/>
    </radialGradient>
  </defs>
  <rect width="1200" height="720" fill="url(#g)"/>
  <rect width="1200" height="720" fill="url(#r)"/>
  <path d="M95 560 C250 420 375 485 520 340 S820 190 1085 270" fill="none" stroke="{$accent}" stroke-width="5" stroke-opacity="0.55"/>
  <g fill="none" stroke="#FFFFFF" stroke-opacity="0.13" stroke-width="1">
    <path d="M120 120H1080M120 240H1080M120 360H1080M120 480H1080M240 80V620M480 80V620M720 80V620M960 80V620"/>
  </g>
  <rect x="95" y="92" width="1010" height="536" rx="38" fill="#020817" fill-opacity="0.38" stroke="#FFFFFF" stroke-opacity="0.16"/>
  <text x="120" y="170" fill="{$accent}" font-size="28" font-family="Arial, sans-serif" font-weight="700" letter-spacing="6">SKOLAH KONGLOMERAT</text>
  <text x="120" y="318" fill="#FFFFFF" font-size="62" font-family="Georgia, serif" font-weight="700">{$title}</text>
  <text x="120" y="382" fill="#A8B8D0" font-size="28" font-family="Arial, sans-serif">{$subtitle}</text>
  <circle cx="980" cy="505" r="74" fill="{$accent}" fill-opacity="0.18" stroke="{$accent}" stroke-width="3"/>
  <text x="930" y="518" fill="#FFFFFF" font-size="28" font-family="Arial, sans-serif" font-weight="700">2026</text>
</svg>
SVG;

        Storage::disk('s3')->put($path, $svg, ['ContentType' => 'image/svg+xml']);

        return $path;
    }
}
