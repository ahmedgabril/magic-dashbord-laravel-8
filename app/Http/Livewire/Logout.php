<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.logout');
    }
    public function logout(){

        Auth::logout();
        Session::flush();
        session()->regenerate();
        return redirect('/login');;
    }
}
