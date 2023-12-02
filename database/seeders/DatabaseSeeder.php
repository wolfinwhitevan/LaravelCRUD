<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subjects;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        //User::factory(10)->create();
        $subj = [
            [
                'sub_title' => 'ITELECT4100',
                'sub_room'=>'comlab 101',
            ],
        ];

        foreach($subj as $key => $sub){
            Subjects::create($sub);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
