<div>

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-4">
              <h1 class="m-0">اداره الوظائف</h1>
            </div><!-- /.col -->
            <div class="col-sm-8">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a class="ml-3" href="/home">الرئيسه</a>/</li>

                <li class="breadcrumb-item active"> <a href="">الصلاحيات</a></li>
                <li class="breadcrumb-item active"> <a href="{{route('role')}}">الوظائف</a></li>

                <li class="breadcrumb-item active"> <a href="{{route('getuser')}}">المستخدمين</a></li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


   <section class="content">
       <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">


                  <div class="row">
                      <div class="col-12">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>

                            <div class="btn-group">
                              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-wrench"></i>
                              </button>

                              <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                <a href="#" class="dropdown-item">طباعه</a>

                                <a class="dropdown-divider"></a>
                                <a href="#" class="dropdown-item"> ....</a>
                              </div>
                            </div>

                          </div><!--enddivclassaction-->
                      </div>

                    <div class=" col-sm-3 form-group" style="margin-top:32px">
                        <button type="button"  wire:click.prevent="showmodel"
                        class="btn btn-block btn-outline-success"><i class="fas fa-plus-circle"></i>
                         اضافه وظيفه </button>
                    </div>



                        <div class="input-group input-group-sm col-sm-4"
                        style="margin-top:32px; border-right: 1px !important;">

                          <input class="form-control form-control-navbar"
                          wire:model.debounce.200ms="searsh"
                          type="search" placeholder="بحث" aria-label="Search">

                        </div>






              <div class="col-sm-3 form-group " style="margin-top:32px">

                <select class="custom-select" wire:model="orderby">
                    <option value="asc" {{ $orderby == 'asc'? 'selected':'' }}>من الاقدم </option>
                    <option value="desc"  {{ $orderby == 'desc'? 'selected':'' }}>من الاحدث  </option>

                  </select>
                </div>

                <div class="col-sm-2 form-group"style="margin-top:32px" >

                    <select class="custom-select" wire:model="pagenate">
                      <option selected>5</option>
                        <option >10</option>
                        <option> 20</option>
                        <option> 30</option>
                        <option> 100</option>
                        <option> 150</option>
                        <option> 200</option>


                      </select>
                    </div>

                   </div> <!-- /.end-row-card-header -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                  <div class="row">

                    <table class="table table-head-fixed text-nowrap table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th> اسم الوظيفه</th>
                            <th> تاريخ الانشاء</th>
                            <th><i class="fas fa-wrench"></i></th>

                          </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $getdata )
                          <tr>

                            <td>{{ $data->firstItem() + $index}}</td>
                            <td>{{ $getdata->name }}</td>

                            </td>



                            <td>{{ $getdata->created_at->format('Y/m/d') }}</td>


                            <td style="display: none">{{ $getpaginateindex = $index }}</td>

                             <td>

                                <div class="col-12">
                                    <div class="card-tools">


                                        <div class="btn-group">
                                          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                             <i class="fas fa-cogs"></i>

                                        </button>

                                          <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                            <a href="#"   class="dropdown-item" data-target="#modal-showdes" data-toggle="modal" wire:click.prevent="showdes({{$getdata->id}})" >
                                                <i  class="fa fa-eye text-primary"></i>
                                                صلاحيات الوظيفه
                                            </a>
                                            <a href="#"  class="dropdown-item" wire:click.prevent="edit({{$getdata->id}})" >
                                                <i style="margin-left: 4px;" class="fa fa-edit text-success">
                                                    </i>
                                                تعديل الوظيفه
                                                </a>
                                            <a href="#" class="dropdown-item" wire:click.prevent="getcurantid({{ $getdata->id }})">
                                                <i style="margin-left: 4px;" class="fas fa-trash text-danger"></i>
                                            حذف الوظيفه
                                            </a>

                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item"> ......</a>
                                          </div>
                                        </div>

                                      </div><!--enddivclassaction-->

                                  </div>


                              </td>
                          </tr>
                          @empty
                          <tr class="text-center" style="background-color: rgb(235 79 79)!important;">
                          <td colspan="5" style="height:33px">
                            <p class="text-center text-light"style="font-size:15px">لاتوجد  نتائج</p>

                            <img src="{{ asset('dist/img/empty.svg') }}" style= "width: 69px; height: 33px;">

                          </td></tr>
                          @endforelse



                        </tbody>

                      </table>
                    <!-- /.col -->



                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer" style="display: block;">
                  <div class="row">
                    <div class=" col-12  d-flex justify-content-sm-between ">
                        <div class="col-sm-8">{{$data->links()}}</div>
                        <div class="col-sm-4 mt-2 shows" style="font-size: 13px">
                         عرض <span class="text-success text-bold">{{ $data->firstItem() + $getpaginateindex}}</span> من اجمالى السجلات <span class="text-primary text-bold">{{ $counts }}</span>

                        </div>

                    </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
         </div><!--end col-12-->
            <!--model add -->
  <div class="modal fade"  wire:ignore.self id="modal-role"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          @if (!$showmodelf)
          <h4 class="modal-title">اضافه  وظيفه جديده</h4>
          @else
          <h4 class="modal-title">تحديث بيانات وظيفه </h4>

          @endif

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

            <form wire:submit.prevent="{{!$showmodelf ? 'add' :'updateone'}}">
               <div class="row">
                 <div class="col-sm-12 form-group">
                 <label for="">اسم الوظيفه</label>
                   <input class="form-control @error("name")  is-invalid

                  @enderror" type="text" wire:model="name" placeholder="(اجبارى*)اسم الوظيفه  "/>
                   @error('name')
                  <div class="invalid-feedback">
                   {{$message}}
                 </div>

                  @enderror

              </div>

              <div class=" col-sm-12 form-group" wire:ignore>

                <div class=" col-12  pl-0  text-bold text-primary">
                    الصلاحيات
                </div>

                 @foreach ($getpre as $index=> $item)
                 <div class=" col-6 icheck-success d-inline pl-0">
                    <label>
                        {{$item->name}}
                    </label>
                    <input  wire:model="prename.{{$item->id}}" value="{{$item->id}}" type="checkbox">

                  </div>
                 @endforeach

              </div>


        <div class="justify-content-sm-center modal-footer">
          @if (!$showmodelf)
          <button type="submit"  class="btn btn-primary"> <i class="ml-2 fa fa-save"></i> حفظ</button>
          @else
          <button type="submit"  class="btn btn-primary"> <i class="ml-2 fa fa-save"></i>    حفظ التغيرات</button>

          @endif

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ml-2 fa fa-times"></i> الغاء</button>
        </div>
      </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!--end model add-->
<!--model show description -->

<div class="modal fade"  wire:ignore.self id="modal-showdes" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">

            <form>
               <div class="row">


                 <div class="col-sm-12 form-group">
                    <label for="">اسم الوظيفه</label>
                      <input disabled class="form-control" type="text" wire:model="name" placeholder="(اجبارى*)اسم الوظيفه  "/>


                 </div>
                 <div class=" col-sm-12 text-center pl-0  mb-4 text-bold role">
                    الصلاحيات الحاصله عليها هذه الوظيفه
                </div>


                 <div class="row ">
                    @foreach ($getpre as $index=> $item)
                     <div class="col-sm-4 ">

                           <span class="">
                            {{$index+1}} - {{$item->name}}
                            </span>

                     </div>
                     @endforeach

                  </div>


              </div>







        <div class="justify-content-sm-center modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ml-2 fa fa-times"></i> الغاء</button>
        </div>
      </div>
    </form>
      </div>
      <!--modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!--end model show-->


        </div><!--end mainrow-->
       </div> <!--end container-->


   </section>

</div>
@push('styles')
{{--}}

<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">


<style>
    .gethandel{
    margin-top: auto;
    margin-right: auto;
    font-size: 13px;
    position: absolute;
    top: 63px;
    left: auto;
    right: 251px;
    }
    @media (max-width: 575px){
        .gethandel{
    margin-top: auto;
    margin-right: auto;
    font-size: 13px;
    position: absolute;
    top: 137px;
    left: auto;
    right: 9px;
 }
}

</style>
{{--}}
@endpush

@push('scripts')
{{--}}
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

     $('#reservationdate').datetimepicker({
      defaultDate: "2021/10/17",
      format: 'yyy/MM/DD',
      locale :'Ar'
        });

       $('.select2').select2();

       $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "---",
        allowClear: true
       });
       Livewire.hook('message.processed', (message, component) => {
        $('.select2').select2();
       })
       $(".select2bs4").on("change",function(){

        @this.set("prensh_id", $(this).val());
       });

        $("#reservationdate").on("change.datetimepicker",function(){

        @this.set("gen_date_start", $('.getval').val());
       });

    });

{{--}}

<script>
    $(document).ready(function() {

  $('#modal-role,#modal-showdes').on('hidden.bs.modal',function () {
        livewire.emit('getval');

     });

window.addEventListener('add',function(event){
  $("#modal-role").modal("hide");

  Swal.fire({
  position: 'top-start',
  icon: 'success',
  title: event.detail.message,
  showConfirmButton: false,
  timer: 3000
})
})
window.addEventListener('show-model',function(){
  $("#modal-role").modal("show");
});

window.addEventListener("getconfirm",function(event){
      Swal.fire({
      title: event.detail.title,
      text: event.detail.message,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم , اريد الحذف !'
    }).then((result) => {
      if (result.isConfirmed) {

        livewire.emit('delete')
      }
    })
})

window.addEventListener("getdel",function(event){
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title:   event.detail.message
})
  /*  Swal.fire({
  position: 'top-start',
  icon: 'success',
  title: event.detail.message,
  showConfirmButton: false,
  timer: 3000
})*/
});

});
</script>
@endpush
