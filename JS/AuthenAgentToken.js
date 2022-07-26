function authen() {
    var token = localStorage.getItem("token", token);
    if (token == null) {
        logout();
        window.location.replace("login.php");
    } else if (token == "Undefine") {
        logout();
        window.location.replace("login.php");
    } else if (token == "") {
        logout();
        //alert(token);
        window.location.replace("login.php");
    } else {

    }
    var agent_profile = JSON.parse(localStorage.getItem("agent_profile"));
    if (agent_profile == null || token == "Undefined" || token == "") {
        logout();
        window.location.replace("login.php");
    } else {
        //alert(agent_profile.id);
        var id = agent_profile.id;
    }
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1/Project_LV4_End_PHP/api_service/authen_token.php",
        async: false,
        data: JSON.stringify({
            "token": token,
            "id": id
        }),
        success(response) {
            //alert("Token complete");
            var result = response.result;
            alert(result);
            if (result == 1) {
                //stay here
            } else {
                window.location.replace("login.php");
                localStorage.removeItem("token");
                localStorage.removeItem("agent_profile");
            }
        },
        error: function(request, status, error) {
            //alert(request.responseText);
            window.location.replace("login.php");
            localStorage.removeItem("token");
            localStorage.removeItem("agent_profile");
        }
    });
    
}

function logout() {
    window.location.replace("login.php");
    localStorage.removeItem("token");
    localStorage.removeItem("agent_profile");
}