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
                    "password": password,
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