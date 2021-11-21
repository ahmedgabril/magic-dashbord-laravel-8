<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $data = [

        'email' => '',
        'password' => '',
        'remember_token' => ''

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'data.email' => 'required|email',
            'data.password' => 'required',
        ],[


            'data.email.required' => 'البريد الالكترونى مطلوب',
            'data.email.email' =>'ادخل بريد الكترونى صحيح يحتوى على @ و.',
            'data.password.required' =>'كلمه المرور مطلوبه',



        ]);
    }
    public function render()
    {
        return view('livewire.login')->layout('layouts.custom');

    }
    public  function login()
    {
        $this->validate([
            'data.email' =>'required|email',
            'data.password' =>'required',
        ],[


            'data.email.required' => 'البريد الالكترونى مطلوب',
            'data.password.required' =>'كلمه المرور مطلوبه',
            'data.email.email' => 'ادخل بريد الكترونى صحيح يحتوى على @ و.',



        ]);
    Auth::attempt();
    if (Auth::attempt(['email' => $this->data['email'], 'password' => $this->data['password']], $this->data['remember_token'])) {
        return redirect()->route('home');
    }


    }
}
