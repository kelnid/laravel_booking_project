<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin', 'email'=>'admin@admin.com','password' => '$2y$10$axezfUmDBL9NiX/1RIooJ.L8q8LkBpqelNoyRdz78nr5Blv34e6Qm','role_id' => 1]
        ]);
    }
}
