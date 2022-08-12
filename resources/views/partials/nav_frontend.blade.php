<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <i style="padding-top:0px;font-size:25px"><span style="color:#4bb8ef;font-weight:700;">Plutus</span><span style="color:#4f5ea7;font-weight:700">Builder</span></i>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        
      </ul>

      <div class="text-end">
        @if (auth()->check())
          @if(Auth::user()->isAdmin())
            <button type="button" onclick="location.href='/admin';"  class="btn btn-outline-light me-2">Admin</button>
          @else 
            <button type="button" onclick="location.href='/scripts';"  class="btn btn-outline-light me-2">Dashboard</button>
          @endif
        @else 
          <button type="button" onclick="location.href='/auth/redirect/google';" class="btn btn-primary" style="background-color:#4285F4;"><i class="fa-brands fa-google"></i> Google Sign in</button>
        @endif

      </div>
    </div>
  </div>
</header>
    