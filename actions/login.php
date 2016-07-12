<?php // Attogram Framework - User Module - Login Page v0.0.9

namespace attogram;

if( !class_exists('\attogram\attogram_user') ) {
  $this->log->error('login.php: attogram_user class not found');
  $this->error404('Login Disbled.  Attogram User module missing in action!');
}

$message = '';
if( isset($_POST['login']) ) { // attempt to login, buffer errors to show later
  if( \attogram\attogram_user::login( $this->log, $this->database ) ) {
    $this->event->info ($this->clientIp . ' LOGIN: id: ' . $_SESSION['attogram_id'] . ' username: ' . $_SESSION['attogram_username']);
    header('Location: ' . $this->path . '/');
    exit;
  }
  $message = '<p class="alert alert-warning">Login failed</p>';
}

$this->pageHeader('Login');
?>
<div class="container">
 <div class="col-xs-6 col-xs-offset-2">
  <?php if( $message ) { print $message; } ?>
  <form action="." method="POST">
    <div class="form-group">
      <input type="hidden" name="login" value="login">
    </div>
    <div class="form-group">
      Username: <input class="form-control" type="text" name="u">
    </div>
    <div class="form-group">
      Password: <input class="form-control" type="password" name="p">
    </div>
    <button type="submit" class="btn btn-info" style="width:50%;">
    &nbsp; &nbsp; &nbsp; &nbsp; Login &nbsp; &nbsp; &nbsp; &nbsp; </button>
  </form>
 </div>
</div>
<?php
$this->pageFooter();
