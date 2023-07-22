<?php

require_once('model.php');

$pdo = db_connect();
$view = get_all_posts($pdo);

require_once('templates/list.php');