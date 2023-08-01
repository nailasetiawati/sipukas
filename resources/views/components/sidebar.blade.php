<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">SIPUKAS</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SK</a>
      </div>
      <ul class="sidebar-menu">
        <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
          <a href="/dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>            
        <li class="nav-item {{ Request::is('donors-category*') ? 'active' : '' }}">
          <a href="/donors-category" class="nav-link"><i class="fas fa-user-tag"></i><span>Kategori Donatur</span></a>
        </li>            
        <li class="nav-item {{ Request::is('incomes*') ? 'active' : '' }}">
          <a href="/incomes" class="nav-link"><i class="fas fa-money-bill-wave"></i><span>Dana Pemasukan</span></a>
        </li>            
        <li class="nav-item {{ Request::is('expenses-category*') ? 'active' : '' }}">
          <a href="/expenses-category" class="nav-link"><i class="fas fa-hand-holding-usd"></i><span>Kategori Pengeluaran</span></a>
        </li>            
        <li class="nav-item {{ Request::is('isexpense*') ? 'active' : '' }}">
          <a href="/isexpense" class="nav-link"><i class="fas fa-dollar-sign"></i><span>Dana Pengeluaran</span></a>
        </li>            
        <li class="nav-item {{ Request::is('report*') ? 'active' : '' }}">
          <a href="/report" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
        </li>            
      </ul>
       </aside>
  </div>