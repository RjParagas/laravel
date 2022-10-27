<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
      <div class="nav-item" style="margin:0px; padding:0px;">
        <a href="#" class="d-block">&nbsp;&nbsp;&nbsp;<img width="10px" src="https://i.ibb.co/h9pZSGz/logo.png">&nbsp;&nbsp;&nbsp; {{Auth::user()->email}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

       <li class="nav-item">
          <a href="home" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
            <i class="fa fa-home"></i>
            <p>&nbsp Dashboard</p>
          </a>
        </li>

      <li class="nav-item has-treeview menu-close">
          <a href="#" class="nav-link">
            <i class="fas fa-id-card"></i>
            <p>&nbsp Registration Details
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('hauler') }}" class="nav-link {{ request()->is('hauler') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Hauler Information</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('truck') }}" class="nav-link {{ request()->is('truck*') ? 'active' : '' }}">
                  <i class="fas fa-truck"></i>
                  <p>&nbsp Truck Details</p>
                </a>
              </li>
          </ul>
      <li class="nav-item has-treeview menu-close">

      <li class="nav-item has-treeview menu-close">
          <a href="#" class="nav-link">
            <i class="fas fa-calendar-alt"></i>
            <p>&nbsp Schedule List
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('schedule') }}" class="nav-link {{ request()->is('schedule') ? 'active' : '' }}">
                    <i class="fas fa-calendar-day"></i>
                    <p>&nbsp User's Schedule</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('assignedSchedule') }}" class="nav-link {{ request()->is('assignedSchedule*') ? 'active' : '' }}">
                  <i class="fas fa-calendar-check"></i>
                  <p>&nbsp Hauler's Assigned Schedule</p>
                </a>
              </li>
          </ul>
      <li class="nav-item has-treeview menu-close">


       <li class="nav-item">
          <a href="{{ route('report') }}" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
            <i class="far fa-calendar-times"></i>
            <p>&nbsp Report</p>
          </a>
       </li>

       <li class="nav-item">
          <a href="{{ route('ratings') }}" class="nav-link {{ request()->is('ratings*') ? 'active' : '' }}">
            <i class="fas fa-star"></i>
            <p>&nbsp Ratings</p>
          </a>
       </li>

       <li class="nav-item">
          <a href="{{ route('wasteCollected') }}" class="nav-link {{ request()->is('wasteCollected*') ? 'active' : '' }}">
            <i class="fas fa-dumpster"></i>
            <p>&nbsp Waste Collected</p>
          </a>
       </li>

        <li class="nav-item">
          <a href="{{ route('wasteRecycled') }}" class="nav-link {{ request()->is('wasteRecycled*') ? 'active' : '' }}">
            <i class="fas fa-recycle"></i>
            <p>&nbsp Waste Recycled</p>
          </a>
       </li>

         <li class="nav-item">
          <a href="{{ route('history') }}" class="nav-link {{ request()->is('history*') ? 'active' : '' }}">
            <i class="fas fa-portrait"></i>
            <p>&nbsp User History Logs</p>
          </a>
       </li>

       <li class="nav-item">
          <a href="{{ route('post') }}" class="nav-link {{ request()->is('post*') ? 'active' : '' }}">
            <i class="fas fa-mail-bulk"></i>
            <p>&nbsp Post Details</p>
          </a>
       </li>

       {{--  <li class="nav-item">
          <a href="{{ route('users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
            <i class="fa fa-check-circle"></i>
            <p>&nbsp Authorized Users</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('parking-space') }}" class="nav-link {{ request()->is('parking-space*') ? 'active' : '' }}">
            <i class="fa fa-road"></i>
            <p>&nbsp Parking Spaces</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('violations') }}" class="nav-link {{ request()->is('violations') ? 'active' : '' }}">
              <i class="fa fa-exclamation-triangle"></i>
              <p>&nbsp Driver Violations</p>
            </a>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="fas fa-money-check"></i>
            <p>&nbsp Transactions
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('payment') }}" class="nav-link {{ request()->is('payment*') ? 'active' : '' }}">
                  <i class="fa fa-wallet"></i>
                  <p>&nbsp Monthly Payments</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('transaction') }}" class="nav-link {{ request()->is('transaction*') ? 'active' : '' }}">
                  <i class="fa fa-list"></i>
                  <p>&nbsp Transaction List</p>
                </a>
              </li>
          </ul>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="fas fa-warehouse"></i>
            <p>&nbsp Landholder Verification
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('landholder') }}" class="nav-link {{ request()->is('landholder') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Landholder List</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pending') }}" class="nav-link {{ request()->is('landholder/pending*') ? 'active' : '' }}">
                  <i class="fa fa-list"></i>
                  <p>&nbsp Pending Requests</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('authorized') }}" class="nav-link {{ request()->is('landholder/authorized*') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Authorized Accounts</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('unauthorized') }}" class="nav-link {{ request()->is('landholder/unauthorized*') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Unauthorized Accounts</p>
                  </a>
              </li>
          </ul>
          <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="fas fa-car-side"></i>
            <p>&nbsp Driver Verification
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('driver') }}" class="nav-link {{ request()->is('driver') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Driver List</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pendingD') }}" class="nav-link {{ request()->is('driver/pending*') ? 'active' : '' }}">
                  <i class="fa fa-list"></i>
                  <p>&nbsp Pending Requests</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('authorizedD') }}" class="nav-link {{ request()->is('driver/authorized*') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Authorized Accounts</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('unauthorizedD') }}" class="nav-link {{ request()->is('driver/unauthorized*') ? 'active' : '' }}">
                    <i class="fa fa-list"></i>
                    <p>&nbsp Unauthorized Accounts</p>
                  </a>
              </li>
          </ul>
        </li> --}}

        <li class="nav-item">
          <a href="home/profile" class="nav-link {{ request()->is('/home/profile*') ? 'active' : '' }}">
            <i class="fa fa-cog"></i>
            <p>&nbsp Account Settings</p>
          </a>
        </li>

        <li class="nav-item">
        <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class="fa fa-sign-out-alt"></i>
                    <p>&nbsp Log Out</p>
              </a>
            </form>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
