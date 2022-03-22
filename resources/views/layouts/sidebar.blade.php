<!-- Sidebar outter -->
<div class="main-sidebar"> 
    <!-- sidebar wrapper -->
    <aside id="sidebar-wrapper">
      <!-- sidebar brand -->
      <div class="sidebar-brand mt-3">
        <img src="/assets/img/logo.png" alt="" style="height: 70px">
        <h5>Politeknik Negeri Banyuwangi</h5>
      </div>
      <!-- sidebar menu -->
      
      <ul class="sidebar-menu">
        <!-- menu header -->
        <li class="menu-header">Dashboard</li>
        <!-- menu item -->
        <li class=" @if (Request::segment(1) == 'dashboard' ) active @endif">
          <a href="/"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <a href="/mahasiswa"><i class="fas fad fa-user-graduate"></i><span>Data Mahasiswa</span></a>
          <a href="/kompetisi"><i class="fab fa-accusoft"></i><span>Data Kompetisi</span></a>
          <a href="/lokasi"><i class="fas fa-location-arrow"></i><span>Data Lokasi</span></a>
          <a href="/dosen"><i class="fab fa-app-store-ios"></i><span>Data Dosen</span></a>
          <a href="/prodi"><i class="fas fa-business-time"></i><span>Data Prodi</span></a>
          <a href="/group"><i class="fas fa-american-sign-language-interpreting"></i><span>Data Group</span></a>
        </li>  
        
          
        
          
        
        
      </ul>  
   

       
    </aside>
  </div> 