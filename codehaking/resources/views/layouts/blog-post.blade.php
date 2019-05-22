   
   @include('includes.front_header')

    <!-- Navigation -->
    @include('includes.front_nav')

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                
                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @if(Auth::check())

              @include('includes.front_sidebar')

            @endif
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

<script src="{{asset('public/js/libs.js')}}"></script>

@yield('script')

</body>

</html>
