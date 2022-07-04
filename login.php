<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>LOGIN</title>

</head>

<body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <br>
                <form action="material.php" method="post">
                        <div class="md-3">
                            <label  class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="username" required="required">
                        </div>
                        <div class="md-3">
                            <label  class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="password" required="required">
                        </div>
                        <div class="md-3">
                            <input type="checkBox" onclick="showpass()">
                            <label>Show password</label>     
                        </div>
                        <br>
                        <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary" onclick="login()">LOGIN</button>
                </form>
            </div>
        </div>

    </div>

</html>

<script type="text/javascript">
    function login() {
        //alert("login");
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/Project_LV4_End_PHP/api_service/authen_agent.php",
            async: false,
            data: JSON.stringify({
                "username": username,
                "password": password
            }),
            success: function(response) {
                var result = response.result;
                var id = response.id_agent;
                var agent_name = response.agent_name;
                var password = response.password;
                var gender = response.gender;
                var token = response.token;
                //alert("success"+id);
                if (result == "1") {
                    alert("login success");
                    var agent_profile = JSON.stringify({
                        "id_agent": id,
                        "agent_name": agent_name,
                        // "password": password,
                        "gender": gender,
                        "token": token
                    })
                    localStorage.setItem("token", token);
                    localStorage.setItem("agent_profile", agent_profile);
                    window.location.replace("material.php");
                }else {
                    alert("login fail");
                    localStorage.setItem("token", null);
                    localStorage.setItem("agent_profile", null);
                    window.location.replace("login.php");
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function showpass() {
        var pass = document.getElementById('password');
            if (pass.type == 'password') {
                pass.type = 'text';
            }else if(pass.type == 'text'){
                pass.type = 'password'
            }
    }
</script>