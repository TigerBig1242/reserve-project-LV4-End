<?php
    include("../config.php");
?>

<?php
     @header('Content-Type: application/json');
     @header("Access-Control-Allow-Origin: *");
     @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers'); 
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $content = @file_get_contents('php://input');
        $json_data = @json_decode($content, true);
        $agent_name = trim($json_data["agent_name"]);
        $username = trim($json_data["username"]);
        $password = trim($json_data["password"]);
        $gender = trim($json_data["agent_gender"]);
        $agent_tel = trim($json_data["agent_tel"]);
        $agent_address = trim($json_data["agent_address"]);
    }
?>

<?php
    $data = array();
    $Query_sql = "INSERT INTO tb_agent (username, password, agent_name, agent_tel, gender, agent_address) VALUES ('".$username."', '".$password."', '".$agent_name."', '".$agent_tel."', '".$gender."', '".$agent_address."')";
    $query = @mysqli_query($conn, $Query_sql);
    if($query){
        $result = 1;
        $data[] = array("agent_name" => $agent_name, "username" => $username, "password" => $password, "agent_gender" => $gender, "agent_tel" => $agent_tel, "agent_address" => $agent_address);
        // print_r($data);
        // echo "insert success";
    }else{
        $result = 0;
        $data[] = array("agent_name" => null, "username" => null, "password" => null, "gender" => null, "agent_tel" => null, "agent_address" => null);
        echo "insert fail";
    }
    echo json_encode(array("result" => $result, "data" => $data));
    @mysqli_close($conn);
?>

<?php
     $ip = $_SERVER['REMOTE_ADDR'];
     $cdate = @date("d/m/Y H:i:s");
     $cfdate=@date("d_m_Y");
     $message_log = "\n".$cdate." ".$ip." content:".@$content." SQL:".@$Query_SQL. "result:".@$result."\r\n";
     $ObjectFopen=@fopen("log/register_".$cfdate.".log","a+");
     @fwrite($ObjectFopen,$message_log);
     @fclose($ObjectFopen);
?>

<?php
    exit;
?>