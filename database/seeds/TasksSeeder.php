<?php

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example2',
                'email' => 'example2@gmail.com',
                'text' => 'example2 example2 example2',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example3',
                'email' => 'example@gmail.com',
                'text' => 'example3 example3 example3',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example4',
                'email' => 'example@gmail.com',
                'text' => 'example4 example4 example4',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
            [
                'name' => 'example',
                'email' => 'example@gmail.com',
                'text' => 'example example example',
                'status' => rand(0, 1)
            ],
        ];
        foreach ($data as $item) {
            Task::create($item);
        }
    }
}
