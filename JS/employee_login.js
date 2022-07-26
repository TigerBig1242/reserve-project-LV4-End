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
                    // "password": password,
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