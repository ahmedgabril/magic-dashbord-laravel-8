<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
      $getpremation = [
        'اداره اصدار الترخيص',
        'اصدار التراخيص',
        'النماذج',
        'انشاء نموذج',
        'تقارير',
        'الموظفين والصلاحيات',
        'اداره المستخدمين',
        'الصلاحيات',
        'الاعدادت',
       ];
       foreach( $getpremation as $getpre){

        Permission::create(['name'=> $getpre]);
       }


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'owner']);

        $role1->givePermissionTo($getpremation);

        $role2 = Role::create(['name' => 'Super-Admin']);
        $role2->givePermissionTo("الاعدادت");

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@test.com',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'ahmed',
            'email' => 'ahmed@test.com',
            'password' => bcrypt('ahmed'),
        ]);
        $user->assignRole($role2);
    }
}

