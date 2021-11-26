<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class Getuser extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['getval','delete'];
    protected $queryString = ['searsh'=> ['except' => '']];
    public $idfordelete ;
    public $dispatechupdate = "add" ;
    public $getpaginateindex;
     public $globalids;
    public $showmodelf = false;
    public $orderby = 'desc';
    public $pagenate = 10;
    public $searsh;
    public $email;
    public $form = [

        'name' => '',

        'status' => '',
        'password' => '',
        'password_confirmation'=>'',
    ];

    public function render()
    {
       //app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::query()

        ->where("name","LIKE", "%" . $this->searsh . "%")
        ->Orwhere("email","LIKE", "%" . $this->searsh . "%")
        ->Orwhere("status","LIKE", "%" . $this->searsh . "%")
        ->orderBy("id",$this->orderby)
        ->latest()
        ->paginate($this->pagenate);
        return view('livewire.getuser', ['data'=> $user,

        "counts" => User::count(),
        "getpre" => Permission::paginate(),
        "getrole" => Role::paginate(),



    ]);


 }
 public function updatedsearsh(){
    $this->resetPage();
 }


 public function updated($propertyName)
 {
     $this->validateOnly($propertyName, [

        'form.name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'form.password' => 'required|confirmed',
        'form.password_confirmation' => 'required',
         'form.status'  => 'alpha_num'

    ],[

  "form.name.required" => "اسم المستخدم مطلوب",
  "form.name.string" => "اسم المستخدم حروف وارقام فقط",
  "form.name.max" => "الحد المسموح به 255 حرف فقط",
  "email.required" => "البريد الالكترونى مطلوب",
  "email.unique" => "البريد الالكترونى مسجل من قبل",

  "form.password.required" =>"كلمه السر مطلوبه",
  "form.password.confirmed" =>"كلمه السر غير مطابقه",
  "form.password_confirmation.required" =>"تاكيد كلمه السر مطلوب",
  'form.status.alpha'  => "حاله المستخدم ارقام فقط"
    ]);




 }
 public function showmodel(){
    $this->showmodelf=false;


 if($this->showmodelf==false){


    $this->dispatchBrowserEvent("show-model");
 //$this->modeltitle = true;



 }
}
 public function add(){

    $this->validate([

        'form.name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'form.password' => 'required|confirmed',
        'form.password_confirmation' => 'required',
         'form.status'  => 'alpha_num'

    ],[

  "form.name.required" => "اسم المستخدم مطلوب",
  "form.name.string" => "اسم المستخدم حروف وارقام فقط",
  "form.name.max" => "الحد المسموح به 255 حرف فقط",
  "email.required" => "البريد الالكترونى مطلوب",
  "email.unique" => "البريد الالكترونى مسجل من قبل",

  "form.password.required" =>"كلمه السر مطلوبه",
  "form.password.confirmed" =>"كلمه السر غير مطابقه",
  "form.password_confirmation.required" =>"تاكيد كلمه السر مطلوب",
  'form.status.alpha'  => "حاله المستخدم ارقام فقط"
    ]);


   $setuser =  User::create([
        'name' => $this->form['name'],
        'email' => $this->email,
        'password' => Hash::make($this->form['password']),
        'status'   => $this->form['status']
    ]);


     $this->reset();

    $this->dispatchBrowserEvent("add",['message'=> "تمت  اضافه البيانات بنجاح 🙂"]);
    //$this->dispatchBrowserEvent("resid");

   // session()->flash("message", "تم اضافه بيانات الفرع  بنجاح ");
/*
    $getlog = new loge();
    $getlog->loges_action_id =  $addrole->id;
    $getlog->loges_action_type =  "اضافه وظيفه";
    $getlog->loges_action_by = auth()->user()->name;
    $getlog->loges_action_des = "تم اضافه وظيفه من قبل ".auth()->user()->name;
    $getlog->save();

*/
}


public function getval()
{
    $this->resetErrorBag();
    $this->resetValidation();

}



}//end of class
