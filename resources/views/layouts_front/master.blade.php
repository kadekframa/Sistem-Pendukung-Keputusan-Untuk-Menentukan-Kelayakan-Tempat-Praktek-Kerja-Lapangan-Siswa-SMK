
<!doctype html>
<html lang="en">
  <head>

    @include('layouts_front.head')

  </head>

  <body>

    @include('layouts_front.menu_bar')
    

    <main role="main">

      @yield('content')

    </main>

    @include('layouts_front.footer')

    @include('layouts_front.script')
  </body>
</html>