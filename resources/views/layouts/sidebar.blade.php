<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        
         @if(\Auth::user()->role == null || \Auth::user()->role == 1)
        <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-dashboard"></span> Beranda Dashboard</span></a></li>


        <li class="header">SISWA</li>

        <li class="menu-sidebar"><a href="{{ url('/biodata') }}"><span class="fa fa-file-zip-o"></span>  Persyaratan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/hasil-analisa') }}"><span class="fa fa-bar-chart"></span> Hasil Analisa Penilaian</span></a></li>
        @endif


        @if(\Auth::user()->role == 2 || \Auth::user()->role == 1)
        <li class="header">GURU</li>

        <li class="menu-sidebar"><a href="{{ url('/siswapkl') }}"><span class="fa fa-fire"></span> Siswa PKL</span></a></li>


        <li class="menu-sidebar"><a href="{{ url('/hasil-analisa') }}"><span class="fa fa-bar-chart"></span> Hasil Analisa Penilaian</span></a></li>

        @endif



        @if(\Auth::user()->role == 1)
        <li class="header">ADMIN</li>

        <li class="menu-sidebar"><a href="{{ url('/verifikasi') }}"><span class="fa fa-users"></span> Daftar Siswa PKL</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/hasil-analisa') }}"><span class="fa fa-bar-chart"></span> Hasil Analisa Penilaian</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status') }}"><span class="fa fa fa-unlock"></span> Status</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/statuspenilaian') }}"><span class="fa fa-star"></span> Status Penilaian</span></a></li>

        <li class="treeview">
              <a href="#"><span>Master Data</span> <i class="fa fa-angle-left"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/industri') }}">Data Tempat PKL</a></li>
                <li><a href="{{ url('/bobotkriteria') }}">Data Bobot Kriteria</a></li>
              </ul>
        </li>
        @endif


        <li class="header">OTHER</li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>