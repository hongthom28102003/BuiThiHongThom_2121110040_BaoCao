<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++){
            Link::insert([
                'user_id'=>1,
                'table_id' => 21,
                'type' => 'ht',
                'slug'=>'danh-muc-',
            ]);
    }
    }
}
