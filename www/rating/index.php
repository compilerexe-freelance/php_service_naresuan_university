<?php
  include "header.php";
  $_SESSION["active_menu"] = "index";
  include "navbarside.php";
?>

<div class="row">

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <h1>ระบบจัดเก็บข้อมูลและประเมินผลความพึงพอใจ</h1>
    </div>
    <div class="form-group">
      <h4>คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</h4>
    </div>
    <div class="form-group">
      <hr>
    </div>
  </div>

  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
  <form action="process/check_login.php" method="post">
    <fieldset>
      <h2>Please Sign In</h2>
      <hr class="colorgraph">
      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
      </div>
      <span class="button-checkbox">
        <input type="checkbox" name="remember_me" id="remember_me" checked="checked" cltass="hidden"> Remember Me
        <a href="" class="btn btn-link pull-right">Forgot Password?</a>
      </span>
      <hr class="colorgraph">
      <div class="form-group">
        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
      </div>
    </fieldset>
  </form>

  </div>
</div>

<?php include "footer.php"; ?>
