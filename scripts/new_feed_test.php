<?php
$output="";
if (isset($_GET['text'])){
	$feed=$_GET['text']; // $feed = "https://tribune.com.pk/feed/business";
	
	$xml=simplexml_load_file($feed);

	foreach($xml->channel->item as $item) {
		$title = $item->title;
		$link=$item->link;
		$pubDate=$item->pubDate;
		$desc=$item->description;
		$image=$item->image->img['src'][0];
		
		$output.="<a href = '$link'><h3>$title</h3></a>";
		$output.="&nbsp&nbsp&nbsp";
		$output.="$pubDate";
		$output.="&nbsp&nbsp&nbsp";
		$output.="<br />";
		$output.="$desc";
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