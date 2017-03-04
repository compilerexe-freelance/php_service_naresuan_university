<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">
        <img src="../assets/img/LogoScienceEng.jpg" style="width: 100%; height: 250px;" class=""/>
      </li>
      <li>
        <?php
          if ($_SESSION["active_menu"] == "manage_service") {
            echo '<a class="active-menu" href="insert_service.php"><i class="fa fa-plus fa-3x"></i> เพิ่มการขอบริการ</a>';
          } else {
            echo '<a href="insert_service.php"><i class="fa fa-plus fa-3x"></i> เพิ่มการขอบริการ</a>';
          }
        ?>
      </li>
      <li>
        <?php
          if ($_SESSION["active_menu"] == "manage_report") {
            echo '<a class="active-menu" href="manage_report.php"><i class ="fa fa-table fa-3x"></i> รายงานผล</a>';
          } else {
            echo '<a href="manage_report.php"><i class ="fa fa-table fa-3x"></i> รายงานผล</a>';
          }
        ?>
      </li>
        <li>
            <?php
            if ($_SESSION["active_menu"] == "manage_print") {
                echo '<a class="active-menu" href="manage_print.php"><i class ="fa fa-table fa-3x"></i> สรุปแบบประเมินความพึ่งพอใจ</a>';
            } else {
                echo '<a href="manage_print.php"><i class ="fa fa-table fa-3x"></i> สรุปแบบประเมินความพึ่งพอใจ</a>';
            }
            ?>
        </li>
      <li>
        <?php
          if ($_SESSION["active_menu"] == "manage_admin") {
            echo '<a class="active-menu" href="manage_admin.php"><i class ="fa fa-user fa-3x"></i> เพิ่มแอดมิน</a>';
          } else {
            echo '<a href="manage_admin.php"><i class ="fa fa-user fa-3x"></i> เพิ่มแอดมิน</a>';
          }
        ?>
      </li>
      <li>
        <a href="../process/logout.php"><i class ="fa fa-sign-out fa-3x"></i> ออกจากระบบ</a>
      </li>
    </ul>
  </div>
</nav>

<div id="page-wrapper" >
<div id="page-inner">
