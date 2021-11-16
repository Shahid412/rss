<style>
.feed-container{
	width:78%;
	text-align:left;
}
.feed-container h1{
	color:green;
	text-align: center;
	color: black;
}
a{text-decoration:none;color:black;}

a .feed-item{
	height: 340px;
	width: 30%;
	background-color:#dcdcdc;
	margin:8px;
	float:left;
	border:1px solid gray;
}

a .feed-item-image{
	width:100%;
	height:200px;
}
a .feed-item-image img{width:100%;height:100%;}
a .feed-item-title{
	margin:auto;
	height:48px;
	padding:8px;
	font-size:20px;
}
a .feed-item-info{
	height:24px;
	font-size:12px;
	padding:0 4px 0 2px;
	color:gray;
}
a .feed-item-author, .feed-item-pubdate{
	float:left;
	padding-left:4px;
}
a .feed-item-desc{
	font-size:16px;
	float:left;
	padding-left:4px;
	padding-right:4px;
	height:36px;
	overflow:hidden;
	color:#404040;
}

</style>

<?php
	$con=mysqli_connect("localhost","root","","newsfeed");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<html>
<head>
	<title>Feed Items</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<div class="feed-container">
<?php 
$result = mysqli_query($con, "SELECT * FROM feeds");
$cat = mysqli_query($con, "SELECT * FROM feeds where id!='' GROUP BY category ");
?>
<h1><?php while ($a= mysqli_fetch_array($cat)) echo $a['category'];?></h1>
<?php 
while($row = mysqli_fetch_array($result)){
?>
<a href = '<?php echo $row['link']; ?>'>
<div class="feed-item">
<div class="feed-item-image"><img src='<?php echo $row['image']; ?>' height= '200' width='280' ></div>
<div class="feed-item-title"><?php echo $row['title'];?></div>
<div class="feed-item-info">
<div class="feed-item-author">
<?php echo $row['author'];?>
</div>
&nbsp;
&nbsp;
&nbsp;
<div class="feed-item-pubdate">
<?php echo $row['pubDate'];?>
</div>
</div>
<div class="feed-item-desc"><?php echo $row['description'];?></div>
</div>
</a>
<?php 
}
?>
</div>
</center>
</body>
</html>