<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beauty Pageant Gallery</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand font-weight-bolder mr-3" href="index.html"><img src="{{asset('assets/img/logo.png')}}"></a>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-nav mr-auto align-items-center">
                <form class="bd-search hidden-sm-down">
                    <input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Search..." autocomplete="off">
                    <div class="dropdown-menu bd-search-results" id="search-results">
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                <a class="nav-link active" href="{{route('gallery.home')}}">Home</a>
                </li>
                @php($categories = \App\Models\GalleryCategory::all())

                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gallery.category', ['slug'=>$category->slug])}}">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
    <main role="main">

        {{$slot}}

    </main>

    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>

    <footer class="footer pt-5 pb-5 text-center">

    <div class="container">

          <div class="socials-media">

            <ul class="list-unstyled">
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-facebook"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-twitter"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-instagram"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-google-plus"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-behance"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-dribbble"></i></a></li>
            </ul>

          </div>

            <!--
              All the links in the footer should remain intact.
              You may remove the links only if you donate:
              https://www.wowthemes.net/freebies-license/
            -->
          <p>©  <span class="credits font-weight-bold">
            <a target="_blank" class="text-dark" href="/"><u>Grayson's Beauty Pageant</u> </a>
          </span>
          </p>


        </div>

    </footer>
</body>

</html>
