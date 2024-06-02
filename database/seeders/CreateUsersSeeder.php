<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'surname'=>'Admin',
               'email'=>'admin@gmail.com',
               'is_type'=>1,
               'password'=> bcrypt('123456'),
               'house_number'=>'H-231',
               'phone'=>'01676026364',
               'street_name'=>'DUKE Lane',
               'town'=>'modern city',
               'postcode'=>'232RBT',
            ],
            [
               'name'=>'Agent User',
               'surname'=>'agent',
               'email'=>'agent@gmail.com',
               'is_type'=> 2,
               'password'=> bcrypt('123456'),
               'house_number'=>'H-231',
               'phone'=>'01676026364',
               'street_name'=>'DUKE Lane',
               'town'=>'modern city',
               'postcode'=>'232RBT',
            ],
            [
               'name'=>'User',
               'surname'=>'user',
               'email'=>'user@gmail.com',
               'is_type'=>0,
               'password'=> bcrypt('123456'),
               'house_number'=>'H-231',
               'phone'=>'01676026364',
               'street_name'=>'DUKE Lane',
               'town'=>'modern city',
               'postcode'=>'232RBT',
            ],
            [
               'name'=>'Shakil',
               'surname'=>'shakil',
               'email'=>'shakil@gmail.com',
               'is_type'=>0,
               'password'=> bcrypt('123456'),
               'house_number'=>'H-231',
               'phone'=>'01676026364',
               'street_name'=>'DUKE Lane',
               'town'=>'modern city',
               'postcode'=>'232RBT',
            ],
            [
               'name'=>'Test',
               'surname'=>'test',
               'email'=>'test@gmail.com',
               'is_type'=>0,
               'password'=> bcrypt('123456'),
               'house_number'=>'H-231',
               'phone'=>'01676026364',
               'street_name'=>'DUKE Lane',
               'town'=>'modern city',
               'postcode'=>'232RBT',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}