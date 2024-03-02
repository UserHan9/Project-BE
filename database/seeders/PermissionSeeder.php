<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Buat Permission disini tinggal copy past dan ganti nama
        Permission::firstOrCreate(['name' => 'users.create']);
        Permission::firstOrCreate(['name' => 'users.show']);

        //ngasih permission ke role yang sudah dibuat
        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->givePermissionTo([
            'users.create'
        ]);


        //ngasih permission ke role user 
        $userRole = Role::where('name', 'user')->first();
        $userRole->givePermissionTo([
            'users.show'
        ]);
    }
}
