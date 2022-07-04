<?php
    include("../config.php");
    session_start();
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
    $query_SQL = "SELECT id_emp, emp_name, password, gender, image, emp_status FROM tb_employee WHERE username = '".$username."'";
    $query = @mysqli_query($conn, $query_SQL);   
    $result_OBJ = @mysqli_fetch_array($query, MYSQLI_ASSOC);
   //print_r($result_OBJ);
    $num = @mysqli_num_rows($query);
    $emp_password = trim(@$result_OBJ["password"]);
    if($password == $emp_password && empty($username == null && $password == null)) {
        $result = 1;
        $id = trim(@$result_OBJ["id_emp"]);
        $emp_name = trim(@$result_OBJ["emp_name"]);
        $password = trim(@$result_OBJ["password"]);
        $gender = trim(@$result_OBJ["gender"]);
        $image = trim(@$result_OBJ["image"]);
        $status = trim(@$result_OBJ["emp_status"]);
        $plain_text = date("YmdHis").$password;
        $token = MD5($plain_text);
        $query_SQL = "UPDATE tb_employee SET token = '".$plain_text."' WHERE id_emp = '".$id."'";
        $query = @mysqli_query($conn, $query_SQL);
    }else{
        $result = "0";
        $id = null;
        $emp_name =  null;
        $password =  null;
        $gender =  null;
        $image = null;
        $status = null;
        $token =  null;
    }
?>

<?php
    echo json_encode(array("result" => $result, "id_emp" => $id, "emp_name" => $emp_name, "password" => $password, "gender" => $gender, "image" => $image,
    "agent_status" => $status,  "token" => $token));
?> 

<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $cdate = @date("d/m/y H:i:s");
    $cfdate = @date("d_m_y");
    $message_log = "\n".$cdate." ".$ip." content:".@$content."result_OBJ:".print_r(@$result_OBJ,true)."num:".@$num. "result:".@$result."\r\n";
    $ObjectFopen = @fopen("log/authen_emp_".$cfdate. ".log","a+");
    @fwrite($ObjectFopen, $message_log);
    @fclose($ObjectFopen);
?>