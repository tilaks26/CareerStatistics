<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Career Statistics</title>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- JQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Theme CSS -->
    <!-- <link href="css/creative.min.css" rel="stylesheet"> -->
    <link href="css/creative.css" rel="stylesheet"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Career Statistics</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#"> | </a>
                    </li>
                    @if (Route::has('login'))
                        @if (Auth::check())
                            <li>
                                <a class="page-scroll" href="{{ url('/home') }}">Home</a>
                            </li>
                        @else
                            <!-- <a href="{{ url('/admin/login') }}">Admin Login</a> -->
                            <li>
                                <a class="page-scroll" href="{{ url('/login') }}">Login</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="{{ url('/register') }}">Register</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Your Source for IU's Career Statistics!</h1>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div id="accordion">
                        <h2 class="section-heading">We've got what you need!</h2>
                        <div>
                            <p>This is a website which will provide the job statistics of the Computer Science graduates (prospective, current, alumni) at the School of Informatics and Computing of Indiana University - Bloomington</p>
                        </div>
                        <h2 class="section-heading">Course Details</h2>
                        <div>
                            <p>Project for ILS-Z 532: Information Architecture for the Web</p>
                        </div>
                    </div>
                    <hr class="primary">
                    <a href="{{ url('/register') }}" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pie-chart text-primary sr-icons"></i>
                        <h3>View Statistics</h3>
                        <p class="text-muted">Confused about where to apply or just need some advice? You can view the career statistics of a particular batch by providing just the Graduation Month and Year!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pencil-square-o text-primary sr-icons"></i>
                        <h3>Register Job</h3>
                        <p class="text-muted">Got a cool job? Share it with other users so that they can benefit from it too!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>External Resources</h3>
                        <p class="text-muted">Wondering how the organization you're applying to is? Want some interview tips? One place for all your resources!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Developed By</h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <p>Sneha Tilak</p>
                </div>
                <div class="col-lg-4 text-center">
                    <p>Akshay Reddy</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-lg-offset-2 text-center">
            <h3 class="section-heading"><a href="{{URL::to('contact')}}">Contact Us</a></h3>
        </div>
    </section>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

    <!-- JQuery UI Scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>

</body>

</html>
