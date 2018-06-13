<?php
$output = array();

//exec('git reset --hard  2>&1', $output);
//var_dump ($output);

exec('git pull origin master 2>&1', $output);
var_dump($output);
?>