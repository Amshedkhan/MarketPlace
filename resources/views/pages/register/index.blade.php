<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">User Register</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @csrf
       <div class="form-group">
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
       @enderror
       </div>
       <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="email" class="form-control" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>
       <div class="form-group">
        <label for="">Phone</label>
        <input name="phone" type="text" class="form-control" required>
       </div>
       <div class="form-group">
        <label for="">Address</label>
        <input name="address" type="text" class="form-control" required>
       </div>
       <div class="form-group">
        <label for="">Please Select a Role</label>
        <select name="role" id="" class="form-control">
            <option value="seller">Seller</option>
            <option value="buyer">Buyer</option>
        </select>
       </div>
       <div class="form-group">
        <label for="">Password</label>
        <input name="password" type="password" class="form-control" required>
       </div>
       <div class="form-group">
        <label for="">Confirm password</label>
        <input name="password_confirmation" type="password" class="form-control" required>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>
      
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="{{route('login.index')}}" class="text-center">Back to login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        },
    });
    </script>
    @if (session('Loginerror'))
    <script>
        Toast.fire({
             icon: 'warning',
             title: 'Invalid Email or Password',
         });
     </script>
    @endif
    @if (session('logoutSuccess'))
    <script>
        Toast.fire({
             icon: 'success',
             title: 'logged out Successfully',
         });
     </script>
    @endif
</body>
</html>
