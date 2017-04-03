<?php

$cnx = mysqli_connect('localhost', 'root', 'simplon62200', 'osccop') or die('error='.mysqli_connect_errno());

$res = mysqli_query($cnx, 'SELECT * FROM console');
$data = mysqli_fetch_assoc($res);

 ?>
