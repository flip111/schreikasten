<?php
// todo: use an existing entry point instead creating a new one with this file
// https://github.com/szepeviktor/WPHW/blob/master/wp-entry-points.md
// e.g. /wp-admin/admin-post.php - it says: "WordPress Generic Request (POST/GET) Handler"
// or a simply hijack the request in init or in wp and exit;

header('Content-type: text/html; charset=utf-8');
require_once( '../../../wp-config.php' );

$max = 20;
if ($_GET['max']) {
  $max = $_GET['max'];
}

sk_text_domain();
echo sk_feed($max);
