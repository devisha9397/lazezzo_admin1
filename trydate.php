<?php

$birthDate = '22-03-2016'; // Read this from the DB instead
$time = strtotime($birthDate);
if(date('m-d') == date('m-d', $time)) {
    // They're the same!
	echo "same";
}
else
{
	echo "not same";
}

?>