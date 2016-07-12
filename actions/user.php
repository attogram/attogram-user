<?php // Attogram Framework - User Module - User Page v0.0.7

namespace attogram;

if( !class_exists('\attogram\attogram_user') ) {
  $this->log->error('modules/user/actions/user.php: attogram_user class not found');
  $this->error404('User Page Disbled.  Attogram User module missing in action!');
}

if( !\attogram_user::is_logged_in() ) {
  header('Location: ' . $this->path . '/login/');
  exit;
}

$this->pageHeader('👤 User page');

print '<div class="container"><h1>👤 User</h1><hr />'
. 'ID: <code>' . @$_SESSION['attogram_id'] . '</code>'
. '<br />username: <code>' . @$_SESSION['attogram_username'] . '</code>'
. '<br />level: <code>' . @$_SESSION['attogram_level'] . '</code>'
. '<br />email: <code>' . @$_SESSION['attogram_email'] . '</code>'
. '<br />isAdmin?:  ' . ($this->isAdmin ? 'Yes' : 'No')
. '</div>';

$this->pageFooter();
