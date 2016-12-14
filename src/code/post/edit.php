<html>
	<body>
		<div class="container">
			<form role="form" class="form-horizontal" action="edit.php" method="POST">
				<fieldset>
					<legend><h3 class="form-signin-heading">Post Article</h3></legend>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_title">New Title</label>
						<div class="col-sm-10">
							<input class="form-control" id="article_title" type="text" name="article_title" placeholder="title" required autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_body">New Content</label>
						<div class="col-sm-10">
							<textarea name="article_body" class="form-control" rows="15" placeholder="content" id="article_body" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="article_tags">New Tags</label>
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
	$id = $_SESSION['id'];
	$author = $_SESSION['author'];
	$new_content = htmlspecialchars($_POST['article_body']);
	$new_title = htmlspecialchars($_POST['article_title']);
	$new_tag = htmlspecialchars($_POST['article_tags']);
	$user = $_SESSION['username'];
	if ($user != $author) {
		echo ' Only the author can edit the post';
	} else {
		$sql = "UPDATE posts SET content='$new_content', title='$new_title', tag='$new_tag'
				WHERE id = '$id'";
		$result = mysql_query($sql);
		echo ' You have edited your post';
	}
}