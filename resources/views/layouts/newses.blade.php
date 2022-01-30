
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>World news</title>
    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<x-header></x-header>

<main>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing" style="margin-top: 50px">
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    @yield('newses')

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
<x-footer></x-footer>
</main>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
