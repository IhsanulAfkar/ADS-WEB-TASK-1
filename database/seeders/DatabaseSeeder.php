<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataCategories = [
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur'],
            ['name' => 'Lingkungan', 'slug' => 'lingkungan'],
            ['name' => 'Layanan Publik', 'slug' => 'layanan-publik'],
            ['name' => 'Keamanan', 'slug' => 'keamanan'],
            ['name' => 'Kesehatan', 'slug' => 'kesehatan'],
            ['name' => 'Lain-lain', 'slug' => 'lain-lain'],
        ];
        foreach ($dataCategories as $data) {
            # code...
            Category::create(['name' => $data['name'], 'slug' => $data['slug']]);
        }
    }
}
