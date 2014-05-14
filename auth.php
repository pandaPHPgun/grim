<?php 	
		
session_start();

if (isset($_POST['log']) && (isset($_POST['pass']))) {
	$log = $_POST['log'];
	$pass = $_POST['pass']; 

	$db_conn = new mysqli('localhost','root','123456az','auth');

	 if (mysqli_connect_errno()) {
		echo "Cann`t connect to db .";
	exit();
	 }
	
	$query = "SELECT * FROM author_user WHERE name='$log' and password=sha1('$pass')";

	$result = $db_conn->query($query);
	
	if ($result->num_rows > 0 ) {
		$_SESSION['log'] = $log ; 
	} 
	

} 
?>
<?php
 if(isset($_SESSION['log'])) {
	echo "<div class='panel panel-default'>
    <div class='panel-heading'>
      <h3 class='panel-title'>Авторизований</h3>
  </div><div class='panel-body'>".$_SESSION['log']." <a href='logout.php'>Виход</a></div></div>";
} else {
	
echo '
	<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Авторизация</h3>
    </div>
    <div class="panel-body">
      <form action="home.php" method="post" >
        <input type="text" name="log" class="form-control" placeholder="Логин" >
        <p></p>
        <input type="text" name="pass" class="form-control" placeholder="Пароль">
        <p></p>
        <center>
          <button style="border:3%" type="submit" name="auth" class="btn btn-default">Вход</button>
  
      </center>
          
        
      </form>
      
    </div>

  </div>
';

}

	


 ?>



