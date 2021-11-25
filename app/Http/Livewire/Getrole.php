<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class Getrole extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['getval','delete'];
    protected $queryString = ['searsh'=> ['except' => '']];
    public $realidfordelete ;
    public $dispatechupdate = "add" ;
    public $getpaginateindex;

    public $showmodelf = false;
    public $orderby = 'desc';
    public $pagenate = 10;
    public $searsh;
    public $handelprem;
    public $name,$prename = [];

    public function render()
    {
       //app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::query()

        ->where("name","LIKE", "%" . $this->searsh . "%")

        ->orderBy("id",$this->orderby)
        ->latest()
        ->paginate($this->pagenate);
        return view('livewire.getrole', ['data'=> $role ,

        "counts" => Role::count(),
        "getpre" => Permission::paginate(),


    ]);


 }
 public function updatedsearsh(){
    $this->resetPage();
 }


 public function updated($propertyName)
 {
     $this->validateOnly($propertyName, [
           'name' => 'required|unique:roles',

    ],[

  "name.required" => "اسم الوظيفه مطلوب",
  "name.unique" => "اسم الوظيفه مسجل من قبل",




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
        'name' => 'required|unique:roles',

    ],[

  "name.required" => "اسم الوظيفه مطلوب",
  "name.unique" => "اسم الوظيفه مسجل من قبل",




    ]);


    if($this->prename==null){
        $addrole = new Role();
        $addrole->name = $this->name;
        $addrole->save();
       //$this->handelprem = $addrole->latest();
    }
         $addrole = new Role();
        $addrole->name = $this->name;
        $addrole->save();
        $addrole->givePermissionTo($this->prename);
        /*
        $this->handelprem = $addrole;
    foreach ($this->prename as $getpremation){
        $this->handelprem->givePermissionTo($getpremation);

    }*/

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
return  redirect()->back();
}

/*
public function edit($bid){
    $this->showmodelf= true;
    if($this->showmodelf){
        $this->dispatchBrowserEvent("show-model");
        $this->globalids = $bid;
        $getdata = genry::findOrFail($bid);
        $this->gen_number = $getdata->gen_number;
        $this->gen_date_start = $getdata->gen_date_start;
        $this->gen_date_end = $getdata->gen_date_end;
        $this->prensh_id = $getdata->prensh_id;
        $this->gen_des =  $getdata->gen_des;
        $this->gen_status =  $getdata->gen_status;



    }
    //

}


public function showdes($bid){

    $getdata = genry::findOrFail($bid);
    $this->gen_number = $getdata->gen_number;
    $this->gen_date_start = $getdata->gen_date_start;
    $this->gen_date_end = $getdata->gen_date_end;
    $this->prensh_id = $getdata->prensh_id;
    $this->gen_des =  $getdata->gen_des;
    $this->gen_status =  $getdata->gen_status;

}

public function updateone(){
    $this->validate([
        'gen_number' => 'required|unique:genries,gen_number,'.$this->globalids,
        'gen_date_start' => 'required',
        'prensh_id' => 'required',



    ],[

  "gen_number.required" => "رقم الرحله مطلوب",
  "gen_number.unique" => "رقم الرحله مسجل من قبل",
  "gen_date_start.required" => "تاريخ  الرحله مطلوب ",

  "prensh_id.required" => "اسم الفرع مطلوب",



    ]);



  $updatedata = genry::findOrFail($this->globalids);
  $updatedata->gen_number =   $this->gen_number;
  $updatedata->gen_des = $this->gen_des;
  $updatedata->gen_date_start = $this->gen_date_start;
  $updatedata->prensh_id = $this->prensh_id;
 $updatedata->gen_status  = $this->gen_status;


   if(  $updatedata->gen_status == 2){
    $updatedata->gen_date_end = Carbon::today();

   }else {
    $updatedata->gen_date_end = null;
   }


  $updatedata->save();
  $this->dispatchBrowserEvent("add",['message'=> "تمت  تحديث البيانات بنجاح 🙂"]);
  // session()->flash("message", "تم اضافه بيانات الفرع  بنجاح ");
  $this->resetval();

   $getlog = new loge();
   $getlog->loges_action_id =  $updatedata->id;
   $getlog->loges_action_type =  "تعديل بيانات  رحله";
   $getlog->loges_action_by = auth()->user();
   $getlog->loges_action_des = "تم اضافه التعديل  من قبل ".auth()->user();
   $getlog->save();

}
public function getcurantid($getcurantid){
$this->realidfordelete = $getcurantid;
$this->dispatchBrowserEvent("getconfirm",['title'=> 'هل انت متأكد ??','message'=> 'لن تتمكن من استرجاع البيانات مره اخرى !']);


}
public function delete(){


    genry::destroy($this->realidfordelete);
    $this->dispatchBrowserEvent("getdel",['message'=> "تمت  حذف  البيانات بنجاح 🙂"]);
    $getlog = new loge();
    $getlog->loges_action_id =  $this->realidfordelete;
    $getlog->loges_action_type =  "حذف  بيانات رحله";
    $getlog->loges_action_by = auth()->user();
    $getlog->loges_action_des = "تمت عمليه الحذف من قبل ".auth()->user();
    $getlog->save();
}

*/

public function getval()
{
    $this->resetval();
    $this->resetErrorBag();
    $this->resetValidation();

}
public function resetval(){

    $this->name = "";



}


}//end of class
