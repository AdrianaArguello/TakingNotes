<?php
$link = mysqli_connect("localhost","root","","onlinenotes");

if(mysqli_connect_error()){
    die("ERROR: unable to connect"  . mysqli_connect_error());
}
?>