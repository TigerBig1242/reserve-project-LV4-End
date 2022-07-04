<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Login Employee</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="employee.php" method="post">
                                <h3 class="text-center">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="">Username:</label><br>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="">Password:</label><br>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
                                </div>
                                <div class="md-3">
                                    <input type="checkBox" onclick="showpass()">
                                    <label>Show password</label>
                                    <br>
                                    <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary" onclick="login_emp()">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

<script>
    function login_emp() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/Project_LV4_End_PHP/api_service/authen_emp.php",
            async: false,
            data: JSON.stringify({
                "username": username,
                "password": password
            }),
            success: function(response) {
                var result = response.result;
                var id = response.id_emp;
                var emp_name = response.emp_name;
                var password = response.password;
                var gender = response.gender;
                var token = response.token;

                if (result == "1") {
                    alert("login success");
                    var emp_profile = JSON.stringify({
                        "id_emp": id,
                        "emp_name": emp_name,
                        "password": password,
                        "gender": gender,
                        "token": token
                    })
                    localStorage.setItem("token", token);
                    localStorage.setItem("emp_profile", emp_profile);
                    window.location.replace('employee.php');
                } else {
                    alert("login fail");
                    localStorage.setItem("token", null);
                    localStorage.setItem("emp_profile", null);
                    window.location.replace("employee_login.php");
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
        } else if (pass.type == 'text') {
            pass.type = 'password'
        }
    }
</script>