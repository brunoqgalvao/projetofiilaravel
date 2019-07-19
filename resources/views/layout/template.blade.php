<!DOCTYPE html>
<html lang="en">
  @include('components.head')
<body>
  @include('layout.header.header')

  @yield('content')

  @include('layout.footer')
</body>
</html>