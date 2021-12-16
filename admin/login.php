<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding Zone | Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4">
  	<form action="action.php" method="POST">
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" name="email" class="form-control" id="email">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" name="password" class="form-control" id="pwd">
	  </div>
	  <div class="checkbox">
	    <label><input type="checkbox"> Remember me</label>
	  </div>
	  <button type="submit" name="submit" class="btn btn-default">Submit</button>
	</form>
  </div>
  <div class="col-md-4"></div>
</div>

</body>
</html>
