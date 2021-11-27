<div style="margin-top: 100px">

    <div class="login-logo">
    <a href="../../index2.html"><b>ahmed</b>gbril</a>
  </div>


  <!-- /.login-logo -->
  <div class="card" style="min-width: 450px;max-width:450">
    <div class="card-body login-card-body">
      <p class="login-box-msg">سجل الدخول لتبداء رحلتك</p>

      <form wire:submit.prevent="login" novalidate>
        <div class="input-group mb-3">
          <input type="email" wire:model="data.email" class=" form-control @error('data.email') is-invalid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>

          </div>
          @error('data.email')
          <div class="invalid-feedback text-right">
              <strong>{{ $message }}</strong>
          </div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" wire:model="data.password" class="form-control @error('data.password') is-invalid @enderror" placeholder="Password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>

            </div>
          </div>
          @error('data.password')
          <div class="invalid-feedback text-right" >
              <strong>{{ $message }}</strong>
          </div>
           @enderror
        </div>
        <div class="row">
                  <!-- /.col -->
          <div class="col-8">
            <p class="mb-1">
                <a href="forgot-password.html">نسيت كلمه السر</a>
              </p>
              </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="icheck-primary">
              <input type="checkbox" wire:model="data.remember_token" id="remember">
              <label for="remember">
                تذكرنى
              </label>
            </div>
          </div>

        </div>


      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <button type="submit" class="btn btn-block btn-primary">
            <i class="fas fa-arrow-circle-left mr-2"></i>تسجيل الدخول
        </button>

      </div>
      <!-- /.social-auth-links -->
    </form>
    {{--}}
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
      {{--}}
    </div>
    <!-- /.login-card-body -->
  </div>

<div>
@push('sc')

<script>
  $(function() {
    window.addEventListener('errorhand',function(event){



Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'البيانات المدخله غير صحيحه او ربما تم ايفاق حسابك',

//footer: '<a href="">Why do I have this issue?</a>'
});




  });
/*
  Livewire.on('statuserror',function(event){


Swal.fire({
icon: 'info',
title: 'تنبيه',
text: 'تم ايقاف حسابك راجع الادره  لمعرفه السبب',

//footer: '<a href="">Why do I have this issue?</a>'
});




  });
  */
  });
</script>
 @endpush
