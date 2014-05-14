<?php session_start();
	if (isset($_SESSION['log'])) {
		header('location:home.php'); } else {
	

require('header.php');



echo '
<div class="col-md-9">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"> Регистрация</h3>
</div>
<div class="panel-body">



  <form action="reg.php" method="POST">
              <div class="input-group input-group-lg">
                <span class="input-group-addon">Nick&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="name" class="form-control" placeholder=""></div>
              <br/>
              <div class="input-group input-group-lg">
                <span class="input-group-addon">Pass&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="pass" class="form-control" placeholder=""></div>
              <br/>
              <div class="input-group input-group-lg">
                <span class="input-group-addon">Pass R&nbsp;</span>
                <input type="text" name="pass2" class="form-control" placeholder=""></div>
                <br/>
              <button style="width:100%" name="regs" type="submit" class="btn btn-default">Регистрация</button>

            </form>

</div>
</div>
</div>
'


;
require('rightm.php');
} 

if (isset($_POST['regs'])) {
				
				$log = $_POST['name'];
				$pass  = $_POST['pass'];
				$pass2 = $_POST['pass2'];


	$db_conn = new mysqli('localhost','root','123456az','auth'); 


	$qor = "SELECT * FROM author_user WHERE name='$log'";
	$our = $db_conn->query($qor);
	if ($our->num_rows >0 ) {
		   echo "<script type='text/javascript'>
window.onload = function(){ alert('Логин уже занят.');}
</script>";
		exit();
	} 

	elseif ($pass != $pass2) {
		   echo "<script type='text/javascript'>
window.onload = function(){ alert('Пароли не совпадают.');}
</script>";
exit();
	}

	

	
	
	$result = $db_conn->query("INSERT INTO author_user VALUES ('".$log."', sha1('".$pass."'))");
	
	


 }


?>
