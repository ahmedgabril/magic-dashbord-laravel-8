<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class premation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* app()[PermissionRegistrar::class]->forgetCachedPermissions();

    $getpremation = [
        'اداره اصدار الترخيص',
        'اصدار التراخيص',
        'تقارير',
        'النماذج',
        'انشاء نموذج',
        'المستخدمين',
        'اداره المستخدمين',
        'الصلاحيات',
        'الاعدادات'
       ];
       foreach( $getpremation as $getpre){

        Permission::create(['name'=> $getpre]);
       }*/
    }
}
