<form action="" method="post">
    @csrf
    <div class="input-group mb-3">
      <input type="name" name="name" class="form-control" placeholder="Name">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>

  <div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
  </div>
  @if (Session::has('message_email'))
      <p class="text-danger">{{Session::get('message_email')}}</p>
  @endif
  @error('email')
    <p class="text-danger">{{$message}}</p>
  @enderror
  
  <div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  @error('password')
    <p class="text-danger">{{$message}}</p>
  @enderror

  <div class="input-group mb-3">
      <input type="password" name="password2" class="form-control" placeholder="Nhập lại Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      
    </div>
    @if (Session::has('message_password'))
          <p class="text-danger">{{Session::get('message_password')}}</p>
      @endif
  <div class="row">
    <!-- /.col -->
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </div>
    <!-- /.col -->
  </div>
</form>