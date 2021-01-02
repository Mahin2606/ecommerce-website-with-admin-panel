<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.include.header')

    @include('backend.include.css')
  </head>

  <body>

    @include('backend.include.menu')

    @include('backend.include.topbar')

    @include('backend.include.rightPanel')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

      @yield('body')

      @include('backend.include.footer')
      
    </div>
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.include.script')
  </body>
</html>
