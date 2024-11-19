<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = config('regionConfig.regions');

        foreach($regions as $regionData){
            $region = Region::create([
                'name' => $regionData['name'],
                'slug' => Str::slug($regionData['name']),
                'code' => $regionData['code'],
                'description' => $regionData['description'],
            ]);
            foreach ($regionData['communities'] as $communityName) {
                $region->communities()->create([
                    'name' => $communityName,
                    'slug' => Str::slug($communityName),
                    'description' => "Community in {$regionData['name']}",
                ]);
            }
        }
    }
}
