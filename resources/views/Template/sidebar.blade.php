<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
          {{-- <img src="{{ Auth::user()->image}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{ getBasicProfile() }}</a> --}}
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <a href="#" class="d-block">{{ Auth::user()->email }}</a>
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/" class="nav-link {{ set_active('beranda') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Dashboard
                  </p>
                </a>
              </li>
          <li class="nav-item menu-close">
              <a href="#" class="nav-link {{ set_active('dataCustomer') }} {{ set_active('tambahCust1') }} {{ set_active('tambahCust2') }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Customer
                    <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dataCustomer" class="nav-link {{ set_active('dataCustomer') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tambahCust1" class="nav-link {{ set_active('tambahCust1') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tambahCust2" class="nav-link {{ set_active('tambahCust2') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
                <a href="/barang" class="nav-link {{ set_active('barang') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Cetak label TnJ 108
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/barcode" class="nav-link {{ set_active('scanbarcode') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Barcode Scanner
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kunjungan-toko" class="nav-link {{ set_active('kunjungan-toko') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Kunjungan Toko
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/scan-kunjungan-toko" class="nav-link {{ set_active('scan-kunjungan-toko') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Scan Kunjungan Toko
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/excel" class="nav-link {{ set_active('import-excel') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Excel
                  </p>
                </a>
              </li>
              <li class="nav-item menu-close">
                  <a href="#"
                      class="nav-link {{ set_active('consolesc') }} {{ set_active('viewsc') }}">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          Scoreboard
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>

                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/scoreboard-console" class="nav-link {{ set_active('consolesc') }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Console</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/scoreboard-view" class="nav-link {{ set_active('viewsc') }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View</p>
                          </a>
                      </li>
                     
                  </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->