<?php
// Attogram Framework - User Module - User Page v0.0.11

namespace Attogram;

if (!class_exists('\Attogram\AttogramUser')) {
    $this->log->error('modules/user/actions/user.php: AttogramUser class not found');
    $this->error404('User Page Disbled.  Attogram User module missing in action!');
}

if (!\Attogram\AttogramUser::isLoggedIn()) {
    header('Location: ' . $this->path . '/login/');
    $this->shutdown();
}

$this->pageHeader('👤 User page');

print '<div class="container"><h1>👤 User</h1><hr />'
    . 'ID: <code>' . @$_SESSION['attogram_id'] . '</code>'
    . '<br />username: <code>' . @$_SESSION['AttogramUsername'] . '</code>'
    . '<br />level: <code>' . @$_SESSION['attogram_level'] . '</code>'
    . '<br />email: <code>' . @$_SESSION['attogram_email'] . '</code>'
    . '<br />isAdmin?:  ' . ($this->isAdmin ? 'Yes' : 'No')
    . '</div>';

$this->pageFooter();
