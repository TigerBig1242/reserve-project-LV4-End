<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
</head>
<body >
    <h3>Hello Employee</h3>

    <div>
    <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary" onclick="logout()">LOGOUT</button>
    </div>
</body>
</html>

<script type="text/javascript">
    function authen(){
        var token = localStorage.getItem("token", token);
        if (token == null){
            logout();
            window.location.replace("employee_login.php");
        }else if(token == "Undefine"){
            logout();
            window.location.replace("employee_login.php");
        }else if(token == ""){
            logout();
            //alert(token);
            window.location.replace("employee_login.php");
        }
        else{
            
        }
        var emp_profile = JSON.parse(localStorage.getItem("emp_profile"));
        if (emp_profile == null || token == "Undefined" || token == ""){
            logout();
            window.location.replace("employee_login.php");
        }else{
            //alert(agent_profile.id);
            var id = emp_profile.id;
        }
        $.ajax({
            type:"POST",
            url:"http://127.0.0.1/Project_LV4_End_PHP/api_service/token_employee.php",
            async:false,
            data:JSON.stringify({
                "token":token,
                "id":id
            }),success(response){
                //alert("Token complete");
                var result = response.result;
                alert(result);
                if (result == 1){
                    //stay here
                }else{
                    window.location.replace("employee_login.php");
                    localStorage.removeItem("token");
                    localStorage.removeItem("emp_profile");
                }
            },error:function(request, status, error){
                //alert(request.responseText);
                window.location.replace("employee_login.php");
                localStorage.removeItem("token");
                localStorage.removeItem("emp_profile");
            }
        });
    }

    function logout(){
        window.location.replace("employee_login.php");
        localStorage.removeItem("token");
        localStorage.removeItem("emp_profile");
    }

</script>