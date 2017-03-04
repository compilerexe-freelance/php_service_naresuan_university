<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">
        <img src="assets/img/LogoScienceEng.jpg" style="width: 100%; height: 250px;" class=""/>
      </li>
      <li>
        <?php
          if ($_SESSION["active_menu"] == "index") {
            echo '<a class="active-menu" href="index.php"><i class="fa fa-desktop fa-3x"></i> Login</a>';
          } else {
            echo '<a href="index.php"><i class="fa fa-desktop fa-3x"></i> Login</a>';
          }
        ?>
      </li>
      <li>
        <?php
          if ($_SESSION["active_menu"] == "report") {
            echo '<a class="active-menu" href="report.php"><i class ="fa fa-table fa-3x"></i> Report</a>';
          } else {
            echo '<a href="report.php"><i class ="fa fa-table fa-3x"></i> Report</a>';
          }
        ?>
      </li>
    </ul>
  </div>
</nav>

<div id="page-wrapper" >
<div id="page-inner">
