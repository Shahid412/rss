<style>
.container{height:400px;width:800px;background-color:#dcdcdc;padding:12px;color: #696969;margin:20px;}
a{color:black;text-decoration:none;}

</style>

<?php

include_once "connect.php";

$url = $_GET['text']; // $feed = "https://tribune.com.pk/feed/business";
	
$xml=simplexml_load_file($url);

for ($i=0;$i<10;$i++){
	$title=$xml->channel->item[$i]->title;
	$link=$xml->channel->item[$i]->link;
	$pubDate=$xml->channel->item[$i]->pubDate;
	$description=$xml->channel->item[$i]->description;
	$author=$xml->channel->item[$i]->children("dc", true);
	$category=$xml->channel->item[$i]->category;
	$uid=$xml->channel->item[$i]->guid;
	$content=$xml->channel->item[$i]->children("content", true);
	$image=$xml->channel->item[$i]->image->img['src'][0];

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