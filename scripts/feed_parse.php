<html>
<head>
	<title>RSS Feed</title>
</head>
<style>

.container{height:400px;width:800px;background-color:#dcdcdc;padding:12px;color: #696969;margin:20px 20px 20px 20px;}
h1{font-style:italic;}
a{color:gray;text-decoration:none;}
a:hover{color:black;}
.form-container{float:left;height:120px;width:96%;background-color:white;padding:16px;padding-top:4px;color: #fff;margin-top:0;}
input[type=text] {
  padding: 12px 20px;
  margin: 8px 0;
  width:88%;
  box-sizing: border-box;
  border: 1px solid gray;
  border-radius: 8px;
  color: gray;
}
input[type=submit] {
  padding: 12px 20px;
  width:200px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid gray;
  border-radius: 8px;
  font-size: 24px;
  color: white;
  background-color: gray;
}

</style>
<body>
<center>
<div class="container">

<br />
<center><h1>Feed Upload into Database</h1>

<br />
<form action ="new_feed_upload.php" method="get">
<input type="text" name="text" size="100" placeholder="Enter feed url..." required>
<br />
<br />
<input type="submit" value="Upload">

<br />
<br />
<a href="index.php">Click here to go Home</a>
</form>

</div>
</center>

</body>
</html>