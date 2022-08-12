<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Plutus Builder</title>
		 
		<!-- Admin theme CSS -->
        <link href="/css/admintheme2.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
        <!-- Original -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <!-- fonts -->
        <link rel="stylesheet" href="/fonts/opensans/stylesheet.css">
        <link rel="stylesheet" href="/fonts/bebas/stylesheet.css">
        
        <!--original-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
        
        <!-- Ajax -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons https://favicon.io/-->
        <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/favicons/site.webmanifest.json">

        <!-- icons -->
        <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>
        
        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

        <style>
            .customPrimaryButton{
                background-color:#48bae8;
                border-color:#48bae8;
            }
            .customPrimaryButton:hover {
                background-color: #7f8eb9; 
            }
            .customPrimaryButtonOpposite{
                background-color: #4a61a2; 
                border-color:#4a61a2;
            }
            .customPrimaryButtonOpposite:hover {
                background-color:#7f8eb9;
            }
            @media screen and (min-width: 768px) {
                .mobileshow {display: none;}
            }   
            @media screen and (max-width: 767px) {
                .mobilehide {display: none;}
                .big_mobile_logo{font-size:1.8rem} 
            }   
            .bebas{
                font-family: "Bebas Neue", sans-serif;
                letter-spacing: 0.2em; 
            }
            </style>

    </head>



    @if(isset($collapse))
        <body class="sb-nav-fixed sb-sidenav-toggled">
    @else
        <body class="sb-nav-fixed"> 
    @endif

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <a class="navbar-brand big_mobile_logo" href="/">
                <i style="padding-top:10px;font-size:25px"><span style="color:#4bb8ef;font-weight:700;">Plutus</span><span style="color:#4f5ea7;font-weight:700">Builder</span></i>
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars" style="height: 2em; width:2em;color:white"></i></button>
            @if(isset($collapse))
                <i class="far fa-hand-point-left mobilehide" style="height: 2em; width:2em;color:dodgerblue"></i>
            @endif
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
              
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0" style="color:white; margin-right:10px">
            <div class="mobilehide">
            
              
            </div>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:#343a40">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="/scripts">
                                <div class="sb-nav-link-icon" style="margin-right:12px"><i class="fas fa-list"></i></div>
                                Scripts
                            </a>

                            @if(Auth()->check())
                                @if(auth()->user()->isAdmin())
                                    <br>
                                    <span style="margin-left:17px;color:rgb(104, 103, 103);font-size:20px">
                                        <b>Admin</b>
                                    </span>
                                    <a class="nav-link" href="/admin/codeblocks">
                                        <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                                        Code blocks
                                    </a>
                                    <a class="nav-link" href="/admin/users">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Users ({{ (App\Models\User::all()->count())-1 }})
                                    </a>
                                @endif
                            @endif

                            @if (auth()->check())
                            <br>
                                <a style="margin-left:15px">
                                    <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                        <input type="submit" style="width:170px" class = "btn btn-secondary btn-sm" value="Logout">
                                    </form>
                                </a>
                            @endif

                        </div>
                    </div>

                </nav>
            </div>

            <div id="layoutSidenav_content">

                <!-- Main Content -->
                <div class="container-fluid" style="margin-top:35px">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

        <script src="/js/admintheme2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Data tables -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
        <script>
            window.addEventListener('DOMContentLoaded', event => {
                // Simple-DataTables
                // https://github.com/fiduswriter/Simple-DataTables/wiki

                const datatablesSimple = document.getElementById('datatablesSimple');
                if (datatablesSimple) {
                    new simpleDatatables.DataTable(datatablesSimple,{
                        "columns": [
                            null,
                            null,
                            null,
                            null,
                            { "width": "20%" }
                        ]
                    });
                }
            });

        </script>
    </body>
</html>
