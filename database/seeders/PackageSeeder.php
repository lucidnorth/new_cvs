<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            ['name' => 'Normal', 'amount' => 30, 'search_limit' => 50],
            ['name' => 'Medium', 'amount' => 60, 'search_limit' => 100],
            ['name' => 'Pro', 'amount' => 90, 'search_limit' => 150],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
