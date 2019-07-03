<?php
require APPROOT . '/views/inc/header.php';
echo '<h1>' . $data['title'] . '</h1>';
echo '<p>' . $data['description'] . '</p>';
echo '<strong>Version' . APPVERSION . '</strong>';
require APPROOT . '/views/inc/footer.php';
