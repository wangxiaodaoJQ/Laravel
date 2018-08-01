<?php

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Faker\Generator $faker 
        * 
        */
        $faker = app(Generator::class);

        $avatars = [
            'http://pcs9nw665.bkt.clouddn.com/342ac65c103853434cc02dda9f13b07eca80883a.jpg',
            'http://pcs9nw665.bkt.clouddn.com/2173542875.jpg',
            'http://pcs9nw665.bkt.clouddn.com/5ed5f27e4ee90d78f9d1e622f393685d.jpg',
            'http://pcs9nw665.bkt.clouddn.com/61.jpg',
            'http://pcs9nw665.bkt.clouddn.com/75.jpg',
            'http://pcs9nw665.bkt.clouddn.com/a16f372d86431558c0ab0a613c50ef0b.jpg',
            'http://pcs9nw665.bkt.clouddn.com/sy_45608856426.jpg',
            'http://pcs9nw665.bkt.clouddn.com/u=1301104831,2509043125&fm=27&gp=0.jpg',
            'http://pcs9nw665.bkt.clouddn.com/2032ec28e0f8efc704512286ebf6311f.jpg',
            'http://pcs9nw665.bkt.clouddn.com/cebbf66c583b2c2e31165f5c7b86c088.jpg',
        ];
        /** @var \Illuminate\Database\Eloquent\FactoryBuilder $factory */
        $factory = factory(User::class)
            ->times(15)
            ->make()
            ->each(function ($user, $index) use ($faker, $avatars) {
                // 从头像数组中随机取出一个值，并赋值给用户头像属性上。
                $user->avatar = $faker->randomElement($avatars);
            });
        // 让隐藏字段可见，并将数据集合转换为数组。
        $array = $factory->makeVisible(['password', 'remember_token'])->toArray();
        // 将数据插入到用户数据表中。
        User::insert($array);
        $user = User::find(1);
        $user->name = 'Laravel Framework';
        $user->email = 'laravel@gmail.com';
        $user->avatar = 'http://pcs9nw665.bkt.clouddn.com/342ac65c103853434cc02dda9f13b07eca80883a.jpg';
        $user->save();
    }
}