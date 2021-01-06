<!DOCTYPE html>
<html lang="en">

  <head>

    @include('frontend.include.header')
    @include('frontend.include.css')

  </head>
  <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1"> 
      @include('frontend.include.topbar')

      @include('frontend.include.menubar')
      
    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="row"> 
          @yield('body')
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
    </div>
    <!-- /#top-banner-and-menu --> 

    @include('frontend.include.footer')

    <!-- For demo purposes – can be removed on production --> 

    <!-- For demo purposes – can be removed on production : End --> 

    @include('frontend.include.script')
  </body>

</html>