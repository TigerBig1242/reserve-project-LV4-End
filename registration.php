<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  <link rel="stylesheet" href="style.css">
  <!-- Fontawesome CDN Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h2>Sign Up</h2>
                <br>
                <form action="login.php" method="post" name="form-register" id="form-register" enctype="multipart/form-data">
                    <div class="md-3">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div>
                        <label for="inputAgentName" class="form-label">Name</label>
                        <input type="text" name="agent_name" class="form-control" id="agent_name">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div>
                        <label for="inputAgentTel" class="form-label">Phone number</label>
                        <input type="text" name="agent_tel" class="form-control" id="agent_tel">
                    </div>
                    <div>
                        <label for="inputGender" class="form-label">Gender</label>
                        <input type="text" name="agent_gender" class="form-control" id="agent_gender">
                    </div>
                    <div>
                        <label for="inputAgentAddress" class="form-label">Address</label>
                        <input type="text" name="agent_address" class="form-control" id="agent_address">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="register()">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    function register() {
        // alert("success");
        var username = document.getElementById("username").value;
        var agent_name = document.getElementById("agent_name").value;
        var password = document.getElementById("password").value;
        var agent_tel = document.getElementById("agent_tel").value;
        var gender = document.getElementById("agent_gender").value;
        var agent_address = document.getElementById("agent_address").value;
        $.ajax ({
            type: "POST",
            url:"http://127.0.0.1/Project_LV4_End_PHP/api_service/register.php",
            async:false,
            data: JSON.stringify({
                "username":username,
                "agent_name":agent_name,
                "password":password,
                "agent_tel":agent_tel,
                "agent_gender":gender,
                "agent_address":agent_address,
            }),
            success: function(response) {
                alert("Register Success");
                document.getElementById("form-register")
                window.location.replace("login.php");
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        })
    }
</script>