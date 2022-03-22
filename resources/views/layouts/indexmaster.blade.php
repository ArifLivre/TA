<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('judul_halaman')</title>
  {{-- <title>@yield('judul_halaman')  &mdash; {{config('app.name')}}</title> --}}

  {{-- @stack('before-script')
  <!-- General JS Scripts -->
  <script src={{asset('assets/modules/jquery.min.js')}}></script> --}}

  <!-- General CSS Files -->
  <link rel="stylesheet" href={{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href={{asset('assets/modules/fontawesome/css/all.min.css')}}>

  <!-- CSS Libraries -->
  @stack('CSSLibs')
  
  
  @stack('page-styles')
  <!-- Template CSS -->
  <link rel="stylesheet" href={{asset('assets/css/style.css')}}>
  <link rel="stylesheet" href={{asset('assets/css/components.css')}}>
 

  <!-- Start GA -->
  <script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          @include('layouts.searchelements')
        </form>
        @include('layouts.navbar')
      </nav>
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 >@yield('judul_halaman')</h1>
          </div>

          @yield('konten')

        </section>
      </div>
      @include('layouts.footer')
    </div>
  </div>

  @stack('before-script')
  <!-- General JS Scripts -->
  <script src={{asset('assets/modules/jquery.min.js')}}></script>
  <script src={{asset('assets/modules/popper.js')}}></script>
  <script src={{asset('assets/modules/tooltip.js')}}></script>
  <script src={{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}></script>
  <script src={{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}></script>
  <script src={{asset('assets/modules/moment.min.js')}}></script>
  <script src={{asset('assets/js/stisla.js')}}></script>

  
  <!-- JS Libraies -->
  @stack('JSLib')

  <!-- Page Specific JS File -->
  @stack('JSFile')
  
  
  <!-- Template JS File -->
  <script src={{asset('assets/js/scripts.js')}}></script>
  <script src={{asset('assets/js/custom.js')}}></script>

  @stack('page-script')


</body>
</html>