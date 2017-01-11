<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- normalize -->
    <link href="css/normalize.css" rel="stylesheet">
	<!-- main style -->
    <link href="css/style.css" rel="stylesheet">
	<!-- main style -->
    <link href="css/animate.css" rel="stylesheet">
	<!--font awesome-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		
		
		
		
		
		<section class="login-container">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-xs-12">
						<div class="login-wrapper">
							<div class="inner_logo text-center">
								<a href="#"><img src="img/inner_logo.png" alt="" title=""/></a>
							</div>
							<form>
							  <div class="form-group">
								<label for="exampleInputEmail1">Emaillll address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							  </div>
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							  </div>
							 
							  <button type="submit" class="btn btn-login">Login</button>
							  <ul class="list-inline">
							  <li> <a href="#" data-toggle="modal" data-target="#myModal">Forgot Password</a></li>
							  <li> <a href="#">Sign Up</a></li>
							  <ul>
							 
							</form>
						</div>
					</div>
				</div>
			</div>	
		</section>
		
		
		
		<footer>
			<div class="container">
				<div class="col-dm-12 col-sm-12 col-xs-12">
					<div class="footer-text text-center">
						<p>&copy; 2016  Travel. All Right Reserved.</p>
					</div>
				</div>
			</div>
		
		</footer>
		
		
		<!-- Modal -->
		<div class="forgot_password">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
				  </div>
				  <div class="modal-body">
							<form class="form-inline" id="forget">
							  <div class="form-group">
								
								<input type="email" class="form-control required" id="exampleInputEmail1" placeholder="Email Your Email Address">
							  </div>
							 
							  <button type="submit" class="btn btn-reset">Send Password</button>
							  
							</form>
				  </div>
				 
				</div>
			  </div>
			</div>
		</div>
		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
	var rowCount = 1;
	function addMoreMRows(frm) {
	rowCount ++;
	var mngRow = '<div class="add-more row" id="rowCount'+rowCount+'"><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">Address:</label><input type="email" class="form-control" id="" placeholder="Company Name"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">Country:</label><input type="email" class="form-control" id="" placeholder="Company Type"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">State:</label><input type="email" class="form-control" id="" placeholder="Founded On"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">City:</label><input type="email" class="form-control" id="" placeholder="Past Experience"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label for="">PIN:</label><input type="email" class="form-control" id="" placeholder="PAN"> </div></div><div class="col-md-4 col-sm-4 col-xs-12"> <div class="form-group"><label><input type="checkbox"> Do not Send Mail</label> </div></div><button type="button" title="Delete row" onclick="removeRow('+rowCount+');" class="btn btn-danger"><i class="fa fa-minus"></i></button></div>';
	jQuery('#addedfRows').append(mngRow);
	}

	
	function removeRow(removeNum) {
	jQuery('#rowCount'+removeNum).remove();
	}
</script>
  </body>
</html>