

<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
              <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{url('/home')}}"> <i class="icon-home"></i>Home </a></li>
                
                <li class="{{ request()->is('create_room') || request()->is('view_rooms') ? 'active' : '' }}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-bed">

                </i>Hotel Rooms </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('create_room')}}"><i class="fas fa-plus-square"></i>
                    Add Room</a></li>
                    <li><a href="{{url('view_rooms')}}"><i class="fas fa-door-open"></i>
                    </i>
                    View Room</a></li>
                 
                  </ul>
                </li>
                <li class="{{ request()->is('bookings') ? 'active' : '' }}">
                  <a href="{{url('bookings')}}"> <i class="fas fa-book"></i>Bookings </a></li>
                <li class="{{ request()->is('view_gallery') ? 'active' : '' }}">
                  <a href="{{url('view_gallery')}}"> <i class="fas fa-images"></i>Gallery </a></li>
                <li class="{{ request()->is('all_message') ? 'active' : '' }}">
                  <a href="{{url('all_message')}}"> <i class="fas fa-envelope"></i>Messages </a></li>
                
        </ul>
      </nav>