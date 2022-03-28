<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RolePermission::truncate();
        Role::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles = [
            [
                'name' => 'Super Admin',
                'children' => [
                    [
                        'name' => 'Root',
                    ],
                ],
                'permissions'=>[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]

            ],
            [
                'name' => 'Admin',
                'children' => [
                    [
                        'name' => 'Super Admin',
                    ],
                ],
                'permissions'=>[5,6,7,8,9,10,11,12,17]

            ],
            [
                'name' => 'Person in charge',
                'children' => [
                    [
                        'name' => 'Admin',
                    ],
                ],
                'permissions'=>[9,10,11,12,17]

            ],
            [
                'name' => 'Member',
                'children' => [
                    [
                        'name' => 'Person in charge',
                    ],
                ],
                'permissions'=>[17]

            ]
        ];

        foreach ($roles as $role) {
            $child = $role['children'];
            $model = Role::create([
                'name' => $role['name'],
                'children' => $child,
            ]);
            $model->permissions()->sync($role['permissions']);
        }
    }
}
