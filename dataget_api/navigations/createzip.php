<?php


$k_adi =$_POST['k_adi'];
$web=$_POST["web"];

$output = shell_exec('zip -r '.$k_adi.'-'.$web.'.zip fast/'.$web.'/XML_'.$web.'');
echo "<pre>$output</pre>";


?>
