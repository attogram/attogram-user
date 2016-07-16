<?php // Attogram Framework - User Module - User Admin v0.2.7

namespace Attogram;

$this->pageHeader('👥 User Admin');

print '<div class="container"><h1 class="squished">👥 User Admin</h1>';

$this->database->tabler(
    $table = 'user',
    $tableId = 'id',
    $nameSingular = 'user',
    $namePlural = 'users',
    $publicLink = false,
    $col = array(
        array('class'=>'col-md-1', 'title'=>'<code>ID</code>', 'key'=>'id'),
        array('class'=>'col-md-5', 'title'=>'username', 'key'=>'username'),
        array('class'=>'col-md-2', 'title'=>'password', 'key'=>'password'),
        array('class'=>'col-md-2', 'title'=>'email', 'key'=>'email'),
        array('class'=>'col-md-1', 'title'=>'level', 'key'=>'level'),
    ),
    $sql = 'SELECT * FROM user ORDER BY id',
    $adminLink = '../users/',
    $showEdit = true,
    $perPage = 20
);

print '</div>';
$this->pageFooter();
