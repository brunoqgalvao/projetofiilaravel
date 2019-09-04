<!DOCTYPE html>
<html lang="en">
  @include('components.head')
<body class="vh-100">
  @include('layout.header.header')

  @yield('content')

  @include('layout.footer')
</body>
</html>