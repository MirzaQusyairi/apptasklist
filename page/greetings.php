<?php

date_default_timezone_set("Asia/Jakarta");

$b = time();
$jam = date("G",$b);

if ($jam>=0 && $jam<=11)
{
echo "Selamat Pagi";
}
elseif ($jam >=12 && $jam<=14)
{
echo "Selamat Siang";
}
elseif ($jam >=15 && $jam<=17)
{
echo "Selamat Sore";
}
elseif ($jam >=17 && $jam<=18)
{
echo "Selamat Petang";
}
elseif ($jam >=19 && $jam<=23)
{
echo "Selamat Malam";
}

?>