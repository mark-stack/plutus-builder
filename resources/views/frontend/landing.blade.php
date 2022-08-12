@extends('layouts.frontend')

@section('content')

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="/images/screen.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Plutus low-code Smart contract builder</h1>
            <p class="lead">
                Build smart contracts in Cardano's Plutus script a lot faster with a pre-structure and catalogued code snippets.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary" style="width:100%;background-color:#4285F4;"><i class="fa-brands fa-google"></i> Google Sign in</a>
            </div>
        </div>
        </div>
    </div>

  
@endsection


