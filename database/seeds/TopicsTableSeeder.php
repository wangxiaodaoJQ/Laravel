<?php

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有用户 IDs。
        $userIds = User::all()->pluck('id')->toArray();

        // 获取所有分类 IDs。
        $categoryIds = Category::all()->pluck('id')->toArray();

        /** 
        * @var \Faker\Generator $faker  
        */
        $faker = app(Generator::class);

        /** 
        * @var \Illuminate\Database\Eloquent\FactoryBuilder $factory 
        */
        $factory = factory(Topic::class)
            ->times(100)
            ->make()
            ->each(function ($topic, $index) use ($faker, $userIds, $categoryIds) {
                $topic->user_id = $faker->randomElement($userIds);
                $topic->category_id = $faker->randomElement($categoryIds);
            });
        $array = $factory->toArray();
        Topic::insert($array);
    }
}