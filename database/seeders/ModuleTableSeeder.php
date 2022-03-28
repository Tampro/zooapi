<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\ModulePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ModulePermission::truncate();
        Permission::truncate();
        Module::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        

        $modules = [
            [
                'name' => 'role',
                'actions' => [0,1,2,3]
            ],
            [
                'name' => 'department',
                'actions' => [0,1,2,3]
            ],
            [
                'name' => 'user',
                'actions' => [0,1,2,3]
            ],
            [
                'name' => 'meeting',
                'actions' => [0,1,2,3,4]
            ],
            
        ];
        
        $actions = [
            'view',
            'create',
            'update',
            'delete',
            'assignment'
        ];

        foreach ($modules as $module) {
            $moduleName = $module['name'];
            Module::create([
              'name' => $moduleName
            ]);
           
            foreach ($module['actions'] as $key) {
                $actionName = $actions[$key];
                $permission = ['name'=>"$moduleName-$actionName"];
                Permission::create($permission);
            }
        }
    }
}
