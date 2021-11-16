<style>
.container{height:400px;width:800px;background-color:#dcdcdc;padding:12px;color: #696969;margin:20px;}
a{color:black;text-decoration:none;}

</style>

<?php

include_once "connect.php";

$url = $_GET['text']; // $feed = "https://tribune.com.pk/feed/business";
	
$xml=simplexml_load_file($url);

foreach($xml->channel->item as $item) {
		$title = $item->title;
		$link=$item->link;
		$pubDate=$item->pubDate;
		$description=$item->description;
		$image=$item->image->img['src'][0];
	$author=$item->children("dc", true);
	$category=$item->category;
	$uid=$item->guid;
	$content=$item->children("content", true);

	$title1=str_replace("'","\'",$title);
	$description1=str_replace("'","\'",$description);
	$author1=str_replace("'","\'",$author);
	$content1=str_replace("'","\'",$content);
	
	$sql="insert ignore into feeds (title, link, description, author, pubDate, category,uid, content, image) values ('$title1','$link','$description1','$author1','$pubDate','$category','$uid','$content','$image')";
	if ($con -> query($sql)==TRUE){
		echo  "";
	} else echo "Failed to upload!" . $con->error;

}
?>

<html>
<head>
	<title><?php echo $url;?></title>
</head>
<body>
<center>
<div class="container">
<br /><br />
<h3>Upload success !</h3>
<br />
<h3><?php echo $url;?></h3>
<br /><br />
<h3><a href="index.php">Click here!</a></h3>
</center>
</div>
</body>
</html>