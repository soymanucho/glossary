<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Glossary') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>

      <div class="container">
        <header class="blog-header py-3">
          <div class="row nav flex-nowrap justify-content-between align-items-center">
            <div class="col-lg-1 col-md-1 col-sm-1 pt-1">
              <a class="btn btn-sm btn-outline-success fancybox" href="{!! route('new-glossary') !!}">Create glossary</a>
            </div>
            <div class="col-lg-5 col-md-2 col-sm-1 text-center">
              <a class="blog-header-logo text-dark" href="{!! route('home') !!}">Glossary</a>
            </div>

            <div class="col-lg-4 col-md-3 col-sm-1 d-flex justify-content-end align-items-center">
              <form class="form-inline" action="{!! route('search-glossary') !!}">
                <input class="form-control mr-sm-2 mt-1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 mt-1" type="submit">Search</button>
              </form>
            </div>
            <div class="col-lg-2 col-md-1 col-sm-1 d-flex justify-content-end align-items-center">

              @if (Route::has('login'))
                  <div class="top-right links">
                      @auth

                          <a class="btn btn-sm btn-outline-secondary" href="{!! route('user-glossaries',['user'=>Auth::user()]) !!}">My glossaries</a>

                              <a class="btn btn-sm btn-info" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>

                      @else
                          <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>

                          @if (Route::has('register'))
                              <a class="btn btn-sm btn-info" href="{{ route('register') }}">Register</a>
                          @endif
                      @endauth
                  </div>
              @endif
            </div>
          </div>
        </header>

        @yield('header')
      </div>

      <main role="main" class="container">
        @yield('content')
      </main><!-- /.container -->

      <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
          <a href="#">Back to top</a>
        </p>
      </footer>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}

      <script>
      $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
      </script>
      <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.3.1.min.js"><\/script>')</script>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}
      {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>
      {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script>
        Holder.addTheme('thumb', {
          bg: '#55595c',
          fg: '#eceeef',
          text: 'Thumbnail'
        });
      </script>
      <script type="text/javascript">
      window.addEventListener('load',function() {
      	$(".fancybox").fancybox({
      		maxWidth	: 1600,
      		maxHeight	: 600,
      		fitToView	: false,
      		width		: '80%',
      		height		: '80%',
          margin: [0, 0, 0, 100],
      		autoSize	: false,
      		closeClick	: false,
      		openEffect	: 'none',
      		closeEffect	: 'none',
          type: 'ajax',
          touch: false
      	});
        $('.select2').select2({
          placeholder: 'Seleccioná una opción',
          theme: "classic"
          });
      });
    </script>

  <svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
</html>
