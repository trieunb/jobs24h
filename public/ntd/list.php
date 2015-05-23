<?php
$dir    = 'C:\xampp\htdocs\vnjobs\public\ntd';
$files1 = scandir($dir);

foreach ($files1 as $value) {
	echo "<a href='".$value."'>$value</a></br>";
}
?>