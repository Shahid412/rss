<?php

require "connect.php";

$sqlCommand = "CREATE TABLE feeds (
id int(12) NOT NULL auto_increment,
pubDate varchar(225) NOT NULL,
title varchar(225) NOT NULL,
description text NOT NULL,
link varchar(225) NOT NULL,
author varchar(225) NOT NULL,
category varchar(225) NOT NULL,
uid varchar(225) NOT NULL,
content longtext NOT NULL,
image varchar(225) NOT NULL,
PRIMARY KEY (id)
)";

if ($con -> query($sqlCommand)==TRUE){
	echo  "<h1>Table 'feeds' is created!</h1>";
} else echo "Failed to generate table!" . $con->error;
?>
