<?php
if($_SERVER['HTTP_HOST'] == 'localhost') {
	$con = new mysqli("localhost","root","","vicsports");
} else {
	$con = new mysqli("localhost"," "," "," ");
}
$con->set_charset("utf8mb4");

$club  = $_POST['clubname'];
$venue = $_POST['venue'];
$size  = $_POST['size'];
$qty  = $_POST['qty'];
$price= $_POST['price'];
$contact= $_POST['phone'];

$amount= $qty*$price;

$day= date('Y-m-d');

$purchase= $con->query("INSERT into availableorders values('$day','$contact','$club','$venue','$size','$qty',$amount)");

if($purchase){
    echo "<script>alert('Your bill is: $amount. Thank you for shopping with us, we shall contact you soon.'); window.location.href='shop.php';</script>";
}
?>