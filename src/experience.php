<?php
    header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//echo $_SERVER['REQUEST_URI']."<br>";
$parts = explode("/", $_SERVER['REQUEST_URI']);
$servername = "localhost";
$username = "";
$password = "";
//echo file_get_contents('php://input');
$data = json_decode(file_get_contents('php://input'),true);
$tagStr = $data["tags"];
$tags = explode(',',$tagStr);
try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    $query = "select up.username, ue.content, ue.tags from user_exp ue, user_profile up where ue.tags='$tags[0]' and ue.uid = up.uid";
    //echo $query;
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();
    //print_r(var_dump($res));
    $response['experiences'] = $res;
    echo json_encode($response);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
