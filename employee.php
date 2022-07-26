<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="JS/AuthenEmployeeToken.js"></script>
    <title>EMPLOYEE</title>
</head>
<body onload="">
    <h3>Hello Employee</h3>
        <form action="" enctype="multipart/form-data">

        </form>
    <div>
    <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary" onclick="logout()">LOGOUT</button>
    </div>
</body>
</html>

<!-- <script type="text/javascript">
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

</script> -->