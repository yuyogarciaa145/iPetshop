<?php 
$servidor="localhost";
$usuario="root";
$password="";
$db="iPetShop";
$connection = new mysqli($servidor, $usuario, $password,$db);
if($connection->connect_errno) {
	echo ("Problemas de conex&#243;n con la base de datos");
	exit();
}
if (!$connection->set_charset("utf8")) {
	printf("Error al cargar el conjunto de carecteres utf8: %s\n",
		$connection->error);
	exit();
}
?>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "iPetShop";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'iPetShop';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}
 

    try {

     $conexion=new PDO('mysql:host=localhost;dbname=iPetShop', 'root', '');
    
    } catch(PDOException $e) {
        print_r('Error connection: ' . $e->getMessage());
    }

?>