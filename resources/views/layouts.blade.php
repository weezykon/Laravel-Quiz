@include('layouts/header')
    <body>
        <!--header start-->
        @include('layouts/nav')
        <!--header end-->

        <!--main content start-->
        <div class="container">
            @yield('home')
        </div>
        <!--main content end-->

        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2018 &copy; Laravel Quiz.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="toastr/toastr.js"></script>
    @yield('footer')
</html>