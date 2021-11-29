<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('settings')->delete();
      $data =[
     ['key'=> 'sitename','value'=>'one click'],
     ['key'=> 'phone','value'=>'01092586526'],
     ['key'=> 'address','value'=>'كفر الشيخ '],
     ['key'=> 'phone2','value'=>'01000000140'],
     ['key'=> 'email','value'=>'ahmed@gmail.com'],
     ['key'=> 'darkmode','value'=>'false'],
     ['key'=> 'sidebar','value'=>'open'],
     ['key'=> 'logo','value'=>'/dist/img/AdminLTELogo.png'],

      ];
      DB::table('settings')->insert($data);
    }
}
