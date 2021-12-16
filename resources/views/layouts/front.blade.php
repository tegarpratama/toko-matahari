<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Toko Matahari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('includes.front.style')
  @stack('after-style')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('includes.front.navbar')
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('includes.front.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('includes.front.script')
    @stack('after-script')
</body>

</html>
