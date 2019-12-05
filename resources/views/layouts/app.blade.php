<!DOCTYPE html>
<html lang="en">

<head>

 @include('layouts.head')
 @yield('head')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('layouts.nav')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-3">
              <h1 class="h3 mb-4 text-gray-800">{{ $section_name }}</h1>
            </div>
            <div class="col-9">
              
              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Great!</strong> The process has finished successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> El proceso no ha terminado, verifica tu información.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

            </div>
          </div> 
          


          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @yield('modals')

  @include('layouts.scripts')
  @yield('scripts')
</body>

</html>
