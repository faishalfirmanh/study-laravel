<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KaryawanSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('karyawans')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'created_at'=> \Carbon\Carbon::now()
            ]);
        }
    }
}
