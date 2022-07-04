<?php
$connect = mysqli_connect('localhost', 'enes', '123456', 'birbedenbuyuk');

if (!$connect) {
    echo 'Connection error:' . mysqli_connect_error();
}
