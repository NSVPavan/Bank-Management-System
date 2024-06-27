<!DOCTYPE html>
<html>
<head>
	
	<style>

	body{
		display: flex;
	}

	.left{
		width: 45%;
	}
	.right{
		width: 45%;
	}
	.container{
		margin-top: 9rem;
		position: relative;
		left: 20rem;
	}

	.btn{
		border-color: #039ee3 !important;
		color: #039ee3 !important;
	}

	.btn:hover{
		background-color: #039ee3 !important;
		border-color: #039ee3 !important;
		color: #fff !important;
	}
			/* Internal CSS for changing font color */
			.bank-name {
    color: #fff;
    /* background-color: #fff; */
	background: none;

    border-color: #004085;
}
    </style>
	<title>Banking</title>
	
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
    $con = new mysqli('localhost','root','','mybank');

	
		$error = "";
		if (isset($_POST['userLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['userId']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:index.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		if (isset($_POST['cashierLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $con->query("select * from login where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['cashId']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:cindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		if (isset($_POST['managerLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $con->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['managerId']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:mindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}

	 ?>
</head>
<body style="background: url(images/bank.webp);background-size: 100%">
<div class="left">
<h1 class="bank-name">
	<div> 
	<img src="images/logo.png" alt="Bank Logo" style="width: auto; height: auto; margin-right: 10px;">

	</div>
<!-- <img src="images/logo.png" alt="Bank Logo" style="width: auto; height: auto; margin-right: 10px;"> -->

<small class="float-right text-muted" style="font-size: 12pt;"></small></h1>
<br>
</div>

<br>
<div class="right">
<?php echo $error ?>
<div class="container">
<div id="accordion" role="tablist" class="w-50 float-right shadowBlack" style="margin-right: 222px">
	<br><h4 class="text-center text-white">Select Your Session</h4>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-success btn-block">User Login</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <form method="POST">
       	<input type="email" value="dbms@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="dbms" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Manager Login
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <form method="POST">
       	<input type="email" value="manager@manager.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="manager" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <!-- <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Cashier Login
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form method="POST">
       	<input type="email" value="cashier@cashier.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="cashier" class="form-control" required placeholder="Enter Password">
       	<button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
       </form>
      </div>
    </div>
  </div> -->
  </div>
</div>
</div>
</body>
</html>