<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'PT Al Hasani',
                'logo_path' => null,
                'address_head_office' => "Jln. Mesjid Taqwa no.57 Dusun Seulawah Gampong Seutui Kecamatan Baiturrahmah Kota Banda Aceh",
                'operational_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Sabtu: 09.00 - 13.00 WIB',

                'wa_number_indo' => '+6285253706721',
                'wa_number_saudi' => '+966540984736',
                'email_primary' => '-',
                'email_secondary' => '-',

                'social_media' => [
                    'facebook' => 'https://www.facebook.com/trangkil.santri/',
                    'instagram' => 'https://www.instagram.com/santritrangkil/',
                    'youtube' => '',
                    'tiktok' => '',
                ],

                'branches' => [
                    [
                        'name' => 'Aceh',
                        'address' => 'Jln. Mesjid Taqwa no.57 Dusun Seulawah Gampong Seutui Kecamatan Baiturrahmah Kota Banda Aceh'
                    ],
                ],

                'stats' => [
                    'jamaah' => 5000,
                    'satisfaction' => 98,
                    'experience' => 10,
                    'departures' => 200,
                ],
            ]
        );
    }
}
