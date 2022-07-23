<?php

$con = mysqli_connect('localhost','root','','webdevproject');

$sql = mysqli_query($con, "SELECT * FROM  `users`");

$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);


exit(json_encode($result));
