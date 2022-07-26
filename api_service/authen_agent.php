<?php
    include("../config.php");
    // session_start();
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
        $username = trim($json_data["username"]);
        $password = trim($json_data["password"]);
    }
?>

<?php
    $query_SQL = "SELECT id_agent, username, agent_name, password, gender, image, agent_status FROM tb_agent WHERE username = '".$username."'";
    $query = @mysqli_query($conn, $query_SQL);   
    $result_OBJ = @mysqli_fetch_array($query, MYSQLI_ASSOC);
   //print_r($result_OBJ);
    $num = @mysqli_num_rows($query);
    $agent_password = trim(@$result_OBJ["password"]);
    $agent_username = trim(@$result_OBJ["username"]);
    if($password == $agent_password && $username == $agent_username && empty($username == null && $password == null)){
        $result = "1";
        $id = trim(@$result_OBJ["id_agent"]);
        $username = trim(@$result_OBJ["username"]);
        $agent_name = trim(@$result_OBJ["agent_name"]);
        $password = trim(@$result_OBJ["password"]);
        $gender = trim(@$result_OBJ["gender"]);
        $image = trim(@$result_OBJ["image"]);
        $status = trim(@$result_OBJ["agent_status"]);
        $plain_text = date("YmdHis").$password;
        $token = MD5($plain_text);
        $query_SQL = "UPDATE tb_agent SET token = '".$plain_text."' WHERE id_agent = '".$id."'";
        $query = @mysqli_query($conn, $query_SQL);
    } else {
        $result = "0";
        $id = null;
        $username = null;
        $agent_name =  null;
        $password =  null;
        $gender =  null;
        $image = null;
        $status = null;
        $token =  null;
    }
?>

<?php
    echo json_encode(array("result" => $result, "id_agent" => $id, "agent_name" => $agent_name, "password" => $password, "gender" => $gender, "image" => $image,
    "agent_status" => $status,  "token" => $token));
?> 

<?php
    @mysqli_close($conn);
?>

<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $cdate = @date("d/m/y H:i:s");
    $cfdate = @date("d_m_y");
    $message_log = "\n".$cdate." ".$ip." content:".@$content."result_OBJ:".print_r(@$result_OBJ,true)."num:".@$num. "result:".@$result."\r\n";
    $ObjectFopen = @fopen("log/authen_agent_".$cfdate. ".log","a+");
    @fwrite($ObjectFopen, $message_log);
    @fclose($ObjectFopen);
?>