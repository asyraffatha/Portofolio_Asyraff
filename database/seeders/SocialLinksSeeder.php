<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLinksSeeder extends Seeder
{
    public function run(): void
{
    DB::table('social_links')->truncate(); // Hapus semua data lama dulu

    DB::table('social_links')->insert([
        [
            'platform' => 'whatsapp',
            'url' => 'https://wa.me/6289662650108',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'platform' => 'instagram',
            'url' => 'https://instagram.com/asyraff.ath',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'platform' => 'github',
            'url' => 'https://github.com/asyraffatha',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'platform' => 'linkedin',
            'url' => 'https://www.linkedin.com/in/rizqyasyraffathallah',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}