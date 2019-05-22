
    @include('includes.front_header')

    <!-- Navigation -->
    @include('includes.front_nav')

   

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                

                @yield('content')

                

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->
            </div>

            <!-- Blog Sidebar -->
          

            @if(Auth::check())

              @include('includes.front_sidebar')
              
             @endif
            
        </div>
        <!-- /.row -->

        <hr>

    </div>
        <!-- Footer -->

       @include('includes.front_footer') 