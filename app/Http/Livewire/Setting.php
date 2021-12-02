<?php

namespace App\Http\Livewire;

use App\Models\setting as mysetting;
use Livewire\Component;

class Setting extends Component
{
    public $form =[
     'compnyname'=>'',
     'email'=>'',
     'phone'=>'',
     'phone2'=>'',
     'faks'=>'',
     'manger'=>'',
     'address'=>'',

    ];
    public function render()
    {
        return view('livewire.setting');
    }
    public function  mount(){

        $this->info();
    }

    public function info(){

   $getsetting = mysetting::query()->get();
   //dd( $getsetting);

    $colect['mseting'] =  $getsetting->flatMap(function($query){

    return [ $query->key =>  $query->value];

    });

    foreach ($colect['mseting'] as $key=> $value){
        if($key == "compnyname"){
        $this->form['compnyname'] = $value;
        }
       if($key == "email"){
            $this->form['email'] = $value;
        }
        if($key == "phone"){
        $this->form['phone'] = $value;
        }
        if($key == "phone2"){
        $this->form['phone2'] = $value;
        }
        if($key == "address"){
        $this->form['address'] = $value;
        }
        if($key == "manger"){
        $this->form['manger'] = $value;
      }
      if($key == "faks"){
        $this->form['faks'] = $value;
      }
    }
  }


  public function updatesetting(){

    foreach ($this->form as $key=> $value){
      $getstatus =  mysetting::where('key',$key)->update(['value'=> $value]);
      if($getstatus){
      $this->dispatchBrowserEvent("update-compny-info");

      }
    }

  }
}
