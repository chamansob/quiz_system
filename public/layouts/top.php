<?php
$cost = 0;
$xp = 'ml-auto';
if (isset($_GET['action'])) {
  $xp = '';
  $action = '';
}
?>
<ul class="navbar-nav flex-row <?= $xp ?>">
  <!-- <li class="nav-item more-dropdown">
    <div class="dropdown  custom-dropdown-icon"> <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
      <polyline points="6 9 12 15 18 9"></polyline>
      </svg></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown"> 
      <a href="<?= TP_BACK_SIDE ?>video/daily" target="_blank" class="dropdown-item" data-value="Daily Update Videos">Test</a> 
      
    </div>
  </li> -->
</ul>