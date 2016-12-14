<html>
	<body>
		<div class="container">
			<form role="form" class="form-horizontal" action="post.php" method="POST">
				<fieldset>
					<legend><h3 class="form-signin-heading">Post Article</h3></legend>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_title">Title</label>
						<div class="col-sm-10">
							<input class="form-control" id="article_title" type="text" name="article_title" placeholder="title" required autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_body">Content</label>
						<div class="col-sm-10">
							<textarea name="article_body" class="form-control" rows="15" placeholder="content" id="article_body" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_tags">Tags</label>
						<div class="col-sm-10">
							<input class="form-control" id="article_tags" type="text" name="article_tags" placeholder="enter tags separated by commas">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="send">Post</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</body>
</html>

<?php
session_start();
include '../dbconfig.php';
if(isset($_POST['send'])) {

	$title = htmlspecialchars($_POST['article_title']);
	$content = htmlspecialchars($_POST['article_body']);
	$tag = htmlspecialchars($_POST['article_tags']);
	$newid = uniqid(rand(), false);
	$user = $_SESSION['username'];
	$sql = "INSERT INTO posts (id, author, title, content, tag) VALUES ('$newid', '$user', '$title', '$content', '$tag');";
	$result = mysql_query($sql);
	echo ' You have succesfully posted ' ;
}
?>
