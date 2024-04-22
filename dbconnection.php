<?php
$con=mysqli_connect("localhost:8889", "root", "root", "delivery");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

// bigmanel_delivery
// $con=mysqli_connect("localhost", "bigmanel_delivery", "delivery", "bigmanel_delivery");
// $con=mysqli_connect("localhost:8889", "root", "root", "delivery");