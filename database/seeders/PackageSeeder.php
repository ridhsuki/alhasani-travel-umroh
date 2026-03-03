<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // 10 Paket yang sudah dipetakan dengan gambar dari PDF masing-masing halaman
        $packages = [
            [
                'name' => 'Paket Umrah Hemat Bintang 3 (9 Hari) - Sama Al Mani & Talat Ajyad',
                'image' => 'packages/La_Al_Hasani_Group_x_PTA__page-0001.jpg', // PDF 1 - Hal 1
                'price' => '8.000.000',
                'duration' => 9,
                'star' => '3',
                'hotel_madinah' => 'Sama Al mani',
                'hotel_makkah' => 'Talat Ajyad',
            ],
            [
                'name' => 'Paket Umrah Spesial Bintang 3 (12 Hari) - Salsabil Al Fadi & Fuad Tower',
                'image' => 'packages/No.pdf_page-0001.jpg', // PDF 2 - Hal 1
                'price' => '9.800.000',
                'duration' => 12,
                'star' => '3',
                'hotel_madinah' => 'Salsabil Al Fadi',
                'hotel_makkah' => 'Fuad Tower',
            ],
            [
                'name' => 'Paket Umrah Nyaman Bintang 3/4 (9 Hari) - Durrat Almadinah & Snood Ajyad',
                'image' => 'packages/La_Al_Hasani_Group_x_PTA__page-0002.jpg', // PDF 1 - Hal 2
                'price' => '8.500.000',
                'duration' => 9,
                'star' => '3/4',
                'hotel_madinah' => 'Durrat Almadinah',
                'hotel_makkah' => 'Snood Ajyad',
            ],
            [
                'name' => 'Paket Umrah Eksklusif Bintang 3/4 (12 Hari) - Jawharat Ar Rasheed & Almassa Grand',
                'image' => 'packages/No.pdf_page-0002.jpg', // PDF 2 - Hal 2
                'price' => '10.900.000',
                'duration' => 12,
                'star' => '3/4',
                'hotel_madinah' => 'Jawharat Ar Rasheed',
                'hotel_makkah' => 'Almassa Grand',
            ],
            [
                'name' => 'Paket Umrah Reguler Bintang 4 (9 Hari) - Rua International & Azka Al Sofa',
                'image' => 'packages/La_Al_Hasani_Group_x_PTA__page-0003.jpg', // PDF 1 - Hal 3
                'price' => '10.000.000',
                'duration' => 9,
                'star' => '4',
                'hotel_madinah' => 'Rua International',
                'hotel_makkah' => 'Azka Al Sofa',
            ],
            [
                'name' => 'Paket Umrah Premium Bintang 4 (12 Hari) - Sanabel Hotel & Prestige/Elaf Mashaeer',
                'image' => 'packages/No.pdf_page-0003.jpg', // PDF 2 - Hal 3
                'price' => '13.500.000',
                'duration' => 12,
                'star' => '4',
                'hotel_madinah' => 'Sanabel Hotel',
                'hotel_makkah' => 'Prestige/ Elaf Mashaeer',
            ],
            [
                'name' => 'Paket Umrah Executive Bintang 4/5 (9 Hari) - Al Anshor Golden Tulip & Ajyad Makareem',
                'image' => 'packages/La_Al_Hasani_Group_x_PTA__page-0004.jpg', // PDF 1 - Hal 4
                'price' => '11.500.000',
                'duration' => 9,
                'star' => '4/5',
                'hotel_madinah' => 'Al Anshor Golden Tulip',
                'hotel_makkah' => 'Ajyad Makareem',
            ],
            [
                'name' => 'Paket Umrah VIP Bintang 4/5 (12 Hari) - Grand Plaza Madinah & Anjum Hotel',
                'image' => 'packages/No.pdf_page-0004.jpg', // PDF 2 - Hal 4
                'price' => '14.500.000',
                'duration' => 12,
                'star' => '4/5',
                'hotel_madinah' => 'Grand Plaza Madinah',
                'hotel_makkah' => 'Anjum Hotel',
            ],
            [
                'name' => 'Paket Umrah VVIP Bintang 5 (9 Hari) - Golden Tulip Zahabi & Safwah Hotel',
                'image' => 'packages/La_Al_Hasani_Group_x_PTA__page-0005.jpg', // PDF 1 - Hal 5
                'price' => '13.500.000',
                'duration' => 9,
                'star' => '5',
                'hotel_madinah' => 'Golden Tulip Zahabi',
                'hotel_makkah' => 'Safwah Hotel',
            ],
            [
                'name' => 'Paket Umrah Royal Bintang 5 (12 Hari) - Frontel Al Harithia & Makkah Tower',
                'image' => 'packages/No.pdf_page-0005.jpg', // PDF 2 - Hal 5
                'price' => '18.000.000',
                'duration' => 12,
                'star' => '5',
                'hotel_madinah' => 'Frontel Al Harithia',
                'hotel_makkah' => 'Makkah Tower/Hotel',
            ],
        ];

        foreach ($packages as $pkg) {
            Package::create([
                'name' => $pkg['name'],
                'slug' => Str::slug($pkg['name']),
                'image' => $pkg['image'], // Menambahkan mapping image ke DB
                'description' => $this->formatDescription($pkg),
                'is_active' => true,
            ]);
        }
    }

    private function formatDescription($data)
    {
        return <<<HTML
<h2>{$data['name']}</h2>
<p>Wujudkan niat suci Anda ke Tanah Haram bersama <strong>Al Hasani Tour & Travel</strong>. Kami menghadirkan program Umrah eksklusif berdurasi <strong>{$data['duration']} Hari</strong> dengan layanan bintang <strong>{$data['star']}</strong>. Fokus ibadah dengan tenang, kami yang urus persiapannya.</p>

<h3>Informasi Paket Utama</h3>
<ul>
    <li><strong>Harga Land Arrangement (LA):</strong> Rp {$data['price']}</li>
    <li><strong>Durasi Perjalanan:</strong> {$data['duration']} Hari</li>
    <li><strong>Minimal Pemesanan:</strong> 35 Pax (Tersedia request Private Group kecil)</li>
    <li><strong>Tipe Kamar Dasar:</strong> Kamar Quad (Sekamar untuk berempat)*</li>
</ul>
<p><em>*Upgrade kamar (*Triple/Double*) tersedia dengan penyesuaian harga sesuai request.</em></p>

<h3>Akomodasi Hotel Pilihan</h3>
<ul>
    <li>🏨 <strong>Hotel Makkah:</strong> {$data['hotel_makkah']}</li>
    <li>🏨 <strong>Hotel Madinah:</strong> {$data['hotel_madinah']}</li>
</ul>

<h3>Fasilitas & Layanan Termasuk (Include)</h3>
<ul>
    <li>✅ Visa Umrah + BRN Bus + BRN Hotel</li>
    <li>✅ Transportasi Bus AC New Model</li>
    <li>✅ Porter bandara, bellboy hotel, tip supir dan tip muassasah</li>
    <li>✅ Layanan Handling di Makkah, Madinah, dan Jeddah</li>
    <li>✅ Didampingi oleh <strong>Muthowwif Profesional</strong></li>
    <li>✅ Muthowwifah khusus Raudhah</li>
    <li>✅ Tasreh Raudhah (Dari Muassasah)</li>
    <li>✅ City Tour lengkap: Makkah, Madinah, dan Jeddah</li>
    <li>✅ Konsumsi Full Board: Makan 3x Sehari (Breakfast, Lunch, Dinner)</li>
    <li>✅ Meal Box 2x (Saat kedatangan dan kepulangan)</li>
    <li>✅ Snack 4x (City Tour Madinah, Perjalanan Madinah-Makkah, City Tour Makkah, Perjalanan Makkah-Jeddah)</li>
    <li>✅ Air Zamzam 5 Liter (Sesuai regulasi dan izin maskapai)</li>
</ul>

<h3>Syarat & Ketentuan Pembayaran</h3>
<ol>
    <li>Pembayaran Deposit sebesar <strong>50%</strong> dari harga paket setelah konfirmasi reservasi Hotel (OK).</li>
    <li>Pelunasan sisa tagihan <strong>50%</strong> wajib diselesaikan maksimal <strong>1 minggu sebelum tanggal keberangkatan</strong> grup.</li>
    <li>Biaya pembatalan akan disesuaikan dengan peraturan yang berlaku dari pihak hotel terkait.</li>
    <li>Harga dapat berubah sewaktu-waktu menyesuaikan kurs dan kebijakan maskapai/pemerintah Saudi.</li>
</ol>

<h3>Hubungi Kami untuk Konsultasi & Pendaftaran</h3>
<p>Jangan tunda niat baik Anda. Segera amankan *seat* Anda dan dapatkan pelayanan "Pelayan Tamu Allah" terbaik dari kami.</p>
<ul>
    <li>📞 <strong>Nomor Indonesia:</strong> <a href="https://wa.me/6285253706721" target="_blank">+62 852-5370-6721</a></li>
    <li>📞 <strong>Nomor Saudi:</strong> <a href="https://wa.me/966540984736" target="_blank">+966 54 098 4736</a></li>
</ul>
HTML;
    }
}
