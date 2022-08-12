<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="rz6qhQjJTeHld1ChnQOlVAUoT0MKqIehWHUkxGRl">

    <title>Plutus Builder</title>

    <!-- Ajax and JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons https://favicon.io/-->
    <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/favicons/site.webmanifest.json">
 
    <!-- icons -->
    <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>
    
    <style>
      .customPrimaryButton{
          background-color:#48bae8;
          border-color:#48bae8;
      }
      .customPrimaryButton:hover {
          background-color: #4a61a2; 
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media screen and (min-width: 768px) {
          .mobileshow {display: none;}
      }   
      @media screen and (max-width: 767px) {
          .mobilehide {display: none;}
      } 

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>
    
    @include('partials.nav_frontend')

    <main>
      @yield('content')
    </main>

    <!--@@include('partials.footer_frontend')-->

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
