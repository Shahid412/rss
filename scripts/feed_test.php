
<?php
$output="";
if (isset($_GET['text'])){
	$feed=$_GET['text']; // $feed = "https://tribune.com.pk/feed/business";
	
	$xml=simplexml_load_file($feed);
	for ($i=0;$i<10;$i++){
		$title=$xml->channel->item[$i]->title;
		$link=$xml->channel->item[$i]->link;
		$description=$xml->channel->item[$i]->description;
		$pubDate=$xml->channel->item[$i]->pubDate;
		$author=$xml->channel->item[$i]->children("dc", true);
		$category=$xml->channel->item[$i]->category;
		$uid=$xml->channel->item[$i]->guid;
		$content=$xml->channel->item[$i]->children("content", true);
		$image=$xml->channel->item[$i]->image->img['src'][0];
#		$image="<img src=\"" . (string)$item->enclosure['url'][0] . "\">";

		$title1=str_replace("'","\'",$title);
		$description1=str_replace("'","\'",$description);
		$author1=str_replace("'","\'",$author);
		$content1=str_replace("'","\'",$content);
		
		$output.="<a href = '$link'><h3>$title1</h3></a>";
		$output.="$author1";
		$output.="&nbsp&nbsp&nbsp";
		$output.="$pubDate";
		$output.="&nbsp&nbsp&nbsp";
		$output.="<br />";
		$output.="$description1";
		$output.="<br /><img src='$image' height= '200' width='280'><hr width='400'/>";
	}
}
?>

<html>
<head>
	<title>RSS Feed</title>
</head>
<body>
<center>
<div class="container">

<div class="contain-head">
<br />
	<h1>Feed Test</h1>
	<h3><a href = "<?php echo $_SERVER['PHP_SELF'];?>">Try a new feed</a></h3>
	<h3><a href = "feed_parse.php">Insert into Database</a></h3>

	<br />
	<hr />
	<?php echo $output;?>
</div>
<div class="form-container">
<form action ="<?php echo $_SERVER['PHP_SELF']?>" method="get">
<input type="text" name="text" size="100" placeholder="Enter feed url..." required>
<br />
<input type="submit" value="Send">
</form>
</div>
</center>

</div>
</body>
</html>