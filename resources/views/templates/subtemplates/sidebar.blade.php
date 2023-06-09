<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('assets/front/img/Logo Hangout.png') }}" width="130px" alt="">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{ asset('assets/front/img/Logo.png') }}" width="30px" alt="">
    </div>
    <ul class="sidebar-menu">
      @if(auth()->user()->level == 1)
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('superadmin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li><a class="nav-link" href="{{ route('superadmin.admin.index') }}"><i class="fas fa-user"></i><span>Admin</span></a></li>
      @endif
      @if(auth()->user()->level == 2)
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a></li>
      @endif
    </ul>
  </aside>
</div>