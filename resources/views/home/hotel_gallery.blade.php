<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.css')
    
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        @include('home.header')
      </header>
   
      @include('home.gallery')
    
     @include('home.footer')
   </body>
</html>