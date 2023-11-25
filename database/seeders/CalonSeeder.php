<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Calon;
class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('calons')->insert([
            ['nama_ketua' => 'Budi Alam',
            'nama_wakil' => 'Joko Ramsyah',
            'visi' => 'Mewujudkan lingkungan kampus yang religius dan inovatif',
            'foto' => 'images/man1.png'],

            ['nama_ketua' => 'Rama Sayid',
            'nama_wakil' => 'Asep Danang',
            'visi' => 'Mewujudkan lingkungan kampus yang religius dan inovatif',
            'foto' => 'images/man2.png'],

        ],
    );

    }
}
