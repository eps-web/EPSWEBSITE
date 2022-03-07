

 <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="{{Route::currentRouteName()=='dashboard' }} ? 'active':'' }}">
                        <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>

    @if ((Auth::user()->user_role == 'superadmin'))


                  <!-- <li class="{{(Route::currentRouteName()=='about.index')? 'ok' : '' }}">
                      <a href="{{route('about.index')}}"><i class="fas fa-info"></i> <span>About Us</span></a>
                  </li> -->
                  <li class="{{ (Route::currentRouteName()=='backend-home.index')? 'ok' : '' }}">
                      <a href="{{route('backend-home.index')}}"><i class="fas fa-home"></i> <span>Home Page</span></a>
                  </li>

                    <!-- <li class="submenu">
                        <a href="#"><i class="fas fa-home"></i> <span>Home Page</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Slider Section</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Benifits</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Features</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>App Functionality</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Download</a></li>


                        </ul>
                    </li> -->
                    <li class="">
                        <a href="{{ route('post.index')}}"><i class="fas fa-list-ul"></i> <span>Blog Page</span></a>
                    </li>
                    <!-- <li class="submenu">
                      <a href="#"> <i class="fas fa-list-ul"></i><span>Blog</span> <span class="menu-arrow"></span></a>
                      <ul style="display: none;">
                        <li class="{{ (Route::currentRouteName()=='post.create')? 'ok' : '' }}"><a href="{{ route('post.create') }}"> <i class="fas fa-caret-right"></i> Add New post</a></li>
                        <li class="{{ (Route::currentRouteName()=='post.index')? 'ok' : '' }}"><a href="{{ route('post.index') }}"> <i class="fas fa-caret-right"></i> All Post</a></li>
                        <li class="{{ (Route::currentRouteName()=='postCategory.index')? 'ok' : '' }}"><a href="{{ route('postCategory.index') }}"> <i class="fas fa-caret-right"></i> Categories</a></li>
                        <li class="{{ (Route::currentRouteName()=='postTag.index')? 'ok' : '' }}"><a href="{{ route('postTag.index') }}"> <i class="fas fa-caret-right"></i> Tags</a></li>
                      </ul>
                    </li> -->



                    <!-- Menu!-->
                        <li class="{{ (Route::currentRouteName()=='backend-career.index')? 'ok' : '' }}"><a href="{{ route('backend-career.index') }}"><i class="fas fa-caret-right"></i> Career</a></li>

                    <li class="submenu">
                        <a href="#"><i class='fas fa-file'></i> <span>Footer Sections</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                          <li><a href="{{ route('about.index')}}"> <i class="fas fa-caret-right"></i>About Us</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Tearms & condition</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Privacy Policy</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Site Maps</a></li>
                           <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Cookie Policy</a></li>


                        </ul>
                    </li>

                    <!-- Menu!-->
                        <!-- <li class="{{ (Route::currentRouteName()=='feature.index')? 'ok' : '' }}"><a href="{{ route('feature.index') }}"><i class="fas fa-caret-right"></i> Nav Menu</a></li> -->

                    <li class="{{Route::currentRouteName()=='user.index' }}">
                        <a href="{{ route('user.index')}}"><i class="fas fa-user"></i> <span> Users</span></a>
                        <!-- <ul style="display: none;">
                           <li><a href="{{ route('user.index')}}"> <i class="fas fa-caret-right"></i> All Users</a></li>


                        </ul> -->
                    </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-cog"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="{{ url('/settings') }}"> <i class="fas fa-caret-right"></i>Social Icons</a></li>
                            <li><a href="{{ url('/settings-logo') }}"> <i class="fas fa-caret-right"></i>Logo</a></li>
                            <li><a href="{{ url('/settings-map') }}"> <i class="fas fa-caret-right"></i>Map</a></li>

                        </ul>
                    </li>



     @endif
    @if ((Auth::user()->user_role == 'admin'))


                      <!-- <li class="{{(Route::currentRouteName()=='about.index')? 'ok' : '' }}">
                          <a href="{{route('about.index')}}"><i class="fas fa-info"></i> <span>About Us</span></a>
                      </li> -->
                      <li class="{{ (Route::currentRouteName()=='benifit.index')? 'ok' : '' }}">
                          <a href="{{route('benifit.index')}}"><i class="fas fa-home"></i> <span>Home Page</span></a>
                      </li>

                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-home"></i> <span>Home Page</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Slider Section</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Benifits</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Features</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>App Functionality</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Download</a></li>


                            </ul>
                        </li> -->
                        <li class="">
                            <a href="{{ route('post.index')}}"><i class="fas fa-list-ul"></i> <span>Blog Page</span></a>
                        </li>
                        <!-- <li class="submenu">
                          <a href="#"> <i class="fas fa-list-ul"></i><span>Blog</span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                            <li class="{{ (Route::currentRouteName()=='post.create')? 'ok' : '' }}"><a href="{{ route('post.create') }}"> <i class="fas fa-caret-right"></i> Add New post</a></li>
                            <li class="{{ (Route::currentRouteName()=='post.index')? 'ok' : '' }}"><a href="{{ route('post.index') }}"> <i class="fas fa-caret-right"></i> All Post</a></li>
                            <li class="{{ (Route::currentRouteName()=='postCategory.index')? 'ok' : '' }}"><a href="{{ route('postCategory.index') }}"> <i class="fas fa-caret-right"></i> Categories</a></li>
                            <li class="{{ (Route::currentRouteName()=='postTag.index')? 'ok' : '' }}"><a href="{{ route('postTag.index') }}"> <i class="fas fa-caret-right"></i> Tags</a></li>
                          </ul>
                        </li> -->



                        <!-- Menu!-->
                            <li class="{{ (Route::currentRouteName()=='backend-career.index')? 'ok' : '' }}"><a href="{{ route('backend-career.index') }}"><i class="fas fa-caret-right"></i> Career</a></li>

                        <li class="submenu">
                            <a href="#"><i class='fas fa-file'></i> <span>Footer Sections</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                              <li><a href="{{ route('about.index')}}"> <i class="fas fa-caret-right"></i>About Us</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Tearms & condition</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Privacy Policy</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Site Maps</a></li>
                               <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Cookie Policy</a></li>


                            </ul>
                        </li>

                        <!-- Menu!-->
                            <!-- <li class="{{ (Route::currentRouteName()=='feature.index')? 'ok' : '' }}"><a href="{{ route('feature.index') }}"><i class="fas fa-caret-right"></i> Nav Menu</a></li> -->

                        <li class="{{Route::currentRouteName()=='user.index' }}">
                            <a href="{{ route('user.index')}}"><i class="fas fa-user"></i> <span> Users</span></a>
                            <!-- <ul style="display: none;">
                               <li><a href="{{ route('user.index')}}"> <i class="fas fa-caret-right"></i> All Users</a></li>


                            </ul> -->
                        </li>
                         <li class="submenu">
                            <a href="#"><i class="fas fa-cog"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                               <li><a href="{{ url('/settings') }}"> <i class="fas fa-caret-right"></i>Social Icons</a></li>
                                <li><a href="invoice-report.html"> <i class="fas fa-caret-right"></i>Logo</a></li>
                                <li><a href="invoice-report.html"> <i class="fas fa-caret-right"></i>Map</a></li>

                            </ul>
                        </li>


     @endif

     @if ((Auth::user()->user_role == 'editor'))
     <li class="{{ (Route::currentRouteName()=='benifit.index')? 'ok' : '' }}">
         <a href="{{route('benifit.index')}}"><i class="fas fa-home"></i> <span>Home Page</span></a>
     </li>
<li class="">
           <a href="{{ route('post.index')}}"><i class="fas fa-list-ul"></i> <span>Blog Page</span></a>
       </li>
<li class="submenu">
           <a href="#"><i class='fas fa-file'></i> <span>Footer Sections</span> <span class="menu-arrow"></span></a>
           <ul style="display: none;">
             <li><a href="{{ route('about.index')}}"> <i class="fas fa-caret-right"></i>About Us</a></li>
              <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Tearms & condition</a></li>
              <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Privacy Policy</a></li>
              <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Site Maps</a></li>
              <li><a href="{{ route('feature.index')}}"> <i class="fas fa-caret-right"></i>Cookie Policy</a></li>


           </ul>
       </li>

     @endif


     @if ((Auth::user()->user_role == 'hr'))

  <li class="{{ (Route::currentRouteName()=='backend-career.index')? 'ok' : '' }}"><a href="{{ route('backend-career.index') }}"><i class="fas fa-caret-right"></i> Career</a></li>


     @endif



                   {{--  <li class="menu-title">
                        <span>Pages</span>
                    </li>
                    <li>
                        <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="login.html"> Login </a></li>
                            <li><a href="register.html"> Register </a></li>
                            <li><a href="forgot-password.html"> Forgot Password </a></li>
                            <li><a href="lock-screen.html"> Lock Screen </a></li>
                        </ul>
                    </li> --}}



                </ul>
            </div>
        </div>
    </div>
  
