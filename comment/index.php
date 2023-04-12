<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/comments.js"></script>

	<div class="container">		
		<br>		
		<form method="POST" id="commentForm">
			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
			</div>
			<div class="form-group">
				<textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment" rows="5" required></textarea>
			</div>
			<span id="message"></span>
			<br>
			<div class="form-group">
				<input type="hidden" name="commentId" id="commentId" value="0" />
				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment" />
			</div>
		</form>		
		<br>
		<div id="showComments"></div>   
</div>	


