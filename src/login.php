<?php
    header('Content-type: application/json');
//echo $_SERVER['REQUEST_URI']."<br>";
$parts = explode("/", $_SERVER['REQUEST_URI']);
//echo "username: $parts[2]<br>";
$servername = "localhost";
$username = "";
$password = "";

$uname = $parts[3];
try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully<br>";
    $query = "SELECT uid FROM user_profile where username='".$uname."'";
    //echo $query."<br>";
    $stmt = $conn->prepare("SELECT uid FROM user_profile where username='".$uname."'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    //print_r($res);
    echo json_encode($res[0]);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
