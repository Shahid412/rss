<html>
<style>
.container{height:400px;width:800px;background-color:#dcdcdc;padding:4px;color: #696969;}
h1{font-style:italic;}
a{color:gray;text-decoration:none;}
a:hover{color:black;}

</style>

<head>
	<title>RSS Feed</title>
</head>
<body onload="JavaScript:load()">
<center>

<br />

<div class="container">
<br />
<h1>Welcome to RSS live feeds tester</h1><br />
<h3><a href = "new_feed_test.php">Live Feed Tester</a></h3><br />
<h3><a href = "feed_parse.php">Insert feed into Database</a></h3><br />
<h3><a href = "feed_load.php">View Feed</a></h3><br />
</div>
</center>

</body>

<script>
function load()
{
	var str=new String("First time visit?? \nGo create database tables! \n(DOES NOTHING YET!)");
	alert(str);
}
</script>

</html>