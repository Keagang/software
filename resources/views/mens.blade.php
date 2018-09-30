<html>

  <head>

    <link href="{{ asset('css/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/css/ken-burns.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/css/animate.min.css') }}" type="text/css" media="all" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="ONLINE SHOPPING">
    <script type="application/x-javascript">
      addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      }

    </script>
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/js/jquery.min.js') }}"></script>

    <link href="//fonts.googleapis.com/css?family=Cagliostro" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <style type="text/css">
      body {
        background-image: url(images/background.jpg);
        /* fallback for old browsers */
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

    </style>

  </head>

  <body bgcolor="#E6E6FA">
    <div class="header">
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <div class="navbar-brand">
                <h1><a href="">Online Shopping</a></h1>
              </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <nav class="link-effect-4" id="link-effect-4">
                <ul class="nav navbar-nav">
                  @guest
                 
                 

                  @else
                  <li>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div>
                                    <a class="dropdown-item" style='display: block;' href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                  </li>
                  @endguest
                </ul>                
              </nav>
            </div>
          </div>
        </nav>
      </div>
    </div>





    <title>Men's Wear</title>
    <style>
      div.box {
        width: 300px;
        height: 430px;
        border-style: solid;
        border-radius: 15px;
        border-color: grey;
        padding-top: 15px;
        padding-right: 25px;
        padding-left: 25px;
        padding-bottom: 370px;
        margin: 5px;
        text-align: center;
        background-color: #d6ebd9;
      }

      div.box img {
        width: 100%;
        height: 200px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.5s;
      }

      div.box img:hover {
        transform: scale(1.2);
      }

      div.box h3 {
        text-align: center;
        font-family: arial;
        padding-top: 20px;
      }

      div.box h4 {
        text-align: center;
        font-family: Times New Roman;
        padding-top: 20px;
      }

      div.box input {
        text-align: center;
        align-content: center;
        float: center;
        margin-bottom: 30px;
        background-color: #4CAF50;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
      }

      div.box input:hover {
        background-color: #367477;
        color: white;
      }

      .gallery {
        width: 200px;
        height: 200px;
        padding: 35px;
      }

      .sidenav {
        height: relative;
        width: 300px;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #404040;
        overflow-x: hidden;
        padding-top: 20px;
        margin-top: 160px;
        vertical-align: center;
        color: #FFF;
      }

      .sidenav a {
        padding: 10px 8px 10px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #FFF;
        display: block;
      }

      .sidenav a:hover {
        color: #000;
      }

      .main {
        margin-left: 300px;
        /* Same as the width of the sidenav */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
        text-align: center;
      }

      .sidenav h3 {
        font-weight: bold;
        color: white;
        font-family: "Lato", sans-serif;
        margin-left: 16px;
        width: 200px;
        margin-bottom: 5px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {
          padding-top: 15px;
        }
        .sidenav a {
          font-size: 18px;
        }
      }

    </style>



    <br><br>

    <div class="sidenav">
      <h3><u>CATEGORIES</u></h3>
      <a href="#">Men</a>
      <a href="women.php?login=1">Women</a>
      <a href="books.php?login=1">Books</a>
      <a href="sports.php?login=1">Sports</a>
      <a href="gadgets.php?login=1">Gadgets</a>
    </div>

    <div class="main">
      <table align="center">
        <tbody>
            @foreach($mens->chunk(3) as $chunk)
            <tr>
            @foreach($chunk as $men)
            <td>
              <div class="box"><img src="{{ asset('images/men/'.$men->image.'') }}" alt="no img">
                <h4><b>{{ $men->pname }}<b></b></b>
                </h4><b><b>
    <h3>Price: <b>{{ $men->price }}</b></h3>
                <br>
                <a href="{{ url('product/'.$men->pid) }}" class="btn btn-primary">Buy</a>
                </b>
                </b>
              </div>
            </td>
            @endforeach
          </tr>
            @endforeach
          </tr>
         
        </tbody>
      </table>
    </div>



    <br>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style type="text/css">
      div.social {
        margin-bottom: 0px;
      }

      div.social a {
        width: 32px;
        height: 32px;
        background: #F58703;
        display: inline-block;
        margin: 0 0.2em;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        -ms-transition: 0.5s all;
        border-radius: 20px;
      }

      div.social i {
        padding-top: 20%;
      }

    </style>



    <div class="copy-section">
      <div class="container">
        <div class="social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
      </div>
    </div>

  </body>

</html>
