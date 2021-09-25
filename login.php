  
<?php
    include_once 'conexion.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['roll_id'])){
        switch($_SESSION['roll_id']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: index.php');
            break;

            default:
        }
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        $username = $_POST['email'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM users WHERE email = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[4];
            
            $_SESSION['roll_id'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;

                case 2:
                header('location: index.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
             echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
        

    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="#" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>