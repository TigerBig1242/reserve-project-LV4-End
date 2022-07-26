<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/material-style.css">
    <script src="JS/AuthenAgentToken.js"></script>
    <title>Material</title>
</head>

<body onload="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h3>หจก. เจริญรับเบอร์</h3>
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link-offersale" href="#">เสนอขาย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-buy" href="#">ขาย</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div id="form_add_material" align="center">
        <form id="add_material" name="add_material" action="#" method="POST" enctype="multipart/form-data">
            <table border="1px">
                <tr>
                    <td>TYPE
                        <div><input type="text" id="type_material" name="type_material" placeholder="material"></div>
                    </td>
                    <td>PRICE
                        <div><input type="text" id="price" name="price" placeholder="price"></div>
                    </td>
                    <td>AMOUNT
                        <div><input type="text" id="amount" name="amount" placeholder="amount"></div>
                    </td>
                    <div><label id="submit_logout" name="submit_logout" onclick="logout()">[LOGOUT]</label></div>
                    <div><label id="submit_add_material" name="submit_add_material" onclick="Add_Material()">[ADDMATERIAL]</label></div>
                </tr>
            </table>
        </form>
    </div> -->

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-center mb-4">เสนอขายยางก้อน</h5>
                    <form class="form-card" onsubmit="event.preventDefault()">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">จำนวน<span class="text-danger"> *</span></label> 
                                <input type="text" id="fname" name="fname" placeholder="จำนวนยางก้อน" onblur="validate(1)"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">ราคา<span class="text-danger"> *</span></label> 
                                <input type="text" id="lname" name="lname" placeholder="ราคาที่เสนอ" onblur="validate(2)"> 
                        </div>
                        </div>
                        <!-- <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Business email<span class="text-danger"> *</span></label> <input type="text" id="email" name="email" placeholder="" onblur="validate(3)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label> <input type="text" id="mob" name="mob" placeholder="" onblur="validate(4)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Job title<span class="text-danger"> *</span></label> <input type="text" id="job" name="job" placeholder="" onblur="validate(5)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">What would you be using Flinks for?<span class="text-danger"> *</span></label> <input type="text" id="ans" name="ans" placeholder="" onblur="validate(6)"> </div>
                        </div> -->
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">เสนอขายยางก้อน</button> </div>
                        </div>
                    </form>
                    <button type="submit" id="submit_login" name="submit_login" class="btn btn-primary" onclick="logout()">LOGOUT</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->


    <!-- Navbar -->

    <!-- <div id="form_add_material" style="display:none">
        <form id="add_material" name="add_material" action="#" method="POST" enctype="multipart/form-data">


        </form>

    </div> -->
</body>

</html>

<!-- <script type="text/javascript">
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

    function Add_Material() {
        //alert("success");
        var type_material = document.getElementById("type_material").value;
        var price = document.getElementById("price").value;
        var amount = document.getElementById("amount").value;
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/Project_LV4_End_PHP/api_service/add_goods.php",
            async: false,
            data: JSON.stringify({
                "type_material": type_material,
                "price": price,
                "amount": amount,
            }),
            success: function(response) {
                alert("Add Material Success");
                document.getElementById("form_add_material");
                location.reload();
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function logout() {
        window.location.replace("login.php");
        localStorage.removeItem("token");
        localStorage.removeItem("agent_profile");
    }
</script> -->