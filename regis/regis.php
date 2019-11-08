<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SuperTest</title>
	<link href="../css/index.css" rel="stylesheet" type="text/css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<body class="body">

  <form class="form-horizontal was-validated" action="regis_stock.php" method="POST">
  <div class="container" style="padding: 80px 0 0 0">
  <div class="col-lg-6 offset-lg-3">
  <div class="form-group ">
    <label for="firstname" class="control-label col-sm-4">First name</label>
    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First name" required>
  </div>
  <div class="form-group ">
    <label for="lastname" class="control-label col-sm-4">Last name</label>
    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name" required>
  </div>
  <div class="form-group ">
    <label class="control-label col-sm-2" for="lastname">Gender</label>
    <select class="custom-select"  type="text" name="gender" id="gender" required>
    <option value="" selected>Select</option>
    <option>Male</option>
    <option>Female</option>
  </select>
  </div>
  <div class="form-group ">
    <label for="email" class="control-label col-sm-2">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required>
  </div>
  <div class="form-group ">
    <label for="password" class="control-label col-sm-2">Password</label>
    <input type="password" name="password" class="form-control" id="pwd" placeholder="password" required>
  </div>
  <div class="form-group ">
    <label for="confirm" class="control-label col-sm-6">Confirm password</label>
    <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Confirm password" required>
  </div>
  <div class="form-group ">
    <label for="address" class="control-label col-sm-6">Phone number</label>
    <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone number" required>
  </div>
  <div class="form-group ">
    <label for="address" class="control-label col-sm-2">Address</label>
    <textarea name="address" class="form-control" id="address" placeholder="Address" required></textarea>
  </div>
  </form>

  

  
  <div style="padding: 30px 0 0 0">
  </div>
  <button type="submit" class="btn btn-primary btn-block " >Register</button>
</div>
</div>



	
	<nav class="navbar navbar-expand-lg navbar-dark topbar" style="position: fixed; width: 100%; top: 0;" >	
		
  <a href="../index.php"><img src="../logo.png" class="navbar-brand pos"></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>


  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav ml-auto">
      			<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Sign In
        			</a>

			<form class="was-validated" action="../login/checklogin.php" method="post">
        		<div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown" >
        		<div class="widthxheight">
        			<div class="hwemail">
          			<label for="email">Email address</label></div>
          			<input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" required>
          			

          			<div class="hwpass">
          			<label for="exampleDropdownFormPassword1">Password</label></div>
          			<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>


            <div 
              style="padding: 18px 0 0 0">
            </div>


            <div class="hwbtn">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button></div>
            </div>
  				</div>
				</div>
			</form>
      			</li>
    			</ul>
  		</div>
	</nav>






</head>
<body class="body">

 



</body>
</html>