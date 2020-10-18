@include('adminlte.layouts.header')


  <!-- Navbar -->
  @include('adminlte.layouts.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('adminlte.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  @yield('table')








  @include('adminlte.layouts.fotter')

 
