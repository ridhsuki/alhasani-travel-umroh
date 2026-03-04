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
                'company_name' => 'PT Al Hasani Tour Travel',
                'logo_path' => null,
                'address_head_office' => "Ka'kiyah Mekkah Al Mukarromah Saudi Arabia",
                'operational_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Sabtu: 09.00 - 13.00 WIB',

                'wa_number_indo' => '+6285253706721',
                'wa_number_saudi' => '+966540984736',
                'email_primary' => 'alhasaniharamaingroup@gmail.com',
                'email_secondary' => '-',

                'social_media' => [
                    'facebook' => 'https://www.facebook.com/trangkil.santri/',
                    'instagram' => 'https://www.instagram.com/santritrangkil/',
                    'youtube' => '',
                    'tiktok' => '',
                ],

                'branches' => [
                    [
                        'name' => 'Jawa Timur',
                        'address' => 'Desa Temboro kec.Karas kab.Magetan provinsi Jawa Timur Indonesia'
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
