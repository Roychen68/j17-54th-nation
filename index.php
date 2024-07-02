<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
        div.card-body{
          max-height: 600px;
          overflow-y: auto;
        }
        /* div.col-6{
            display: flex;
        } */
        .btn{
            width: auto;
            height: auto;
        }
        img.admin{
        width: 25px;
        height: 25px;
        }
        .rotate{
            animation: rotate 500ms linear infinite;
        }
        @keyframes rotate {
            0%{
                rotate: 0deg;
            }
            25%{
                rotate: 90deg;
            }
            50%{
                rotate: 180deg;
            }
            75%{
                rotate: 270deg;
            }
            100%{
                rotate: 360px;
            }
        }
        </style>
<script src="jquery.js"></script>
</head>
<body>
    <?php
    session_start();
    ?>
<header class="shadow d-flex w-100 header rounded-bottom p-1">
        <div class="col-5" style="display: flex; cursor: pointer;" onclick="index()">
            <img src="./img/logo.png" alt="logo" class="logo">
        </div>
        <div class="col-6 p-2">
            <button class="btn btn-primary admin" onclick='$("#login").modal("show")' onmouseenter="$('img.admin').addClass('rotate')" onmouseleave="$('img.admin').removeClass('rotate')">系統管理<img src="./img/admin.png" class="admin"></button>
            <span class="logoutBtnCase" style="display:inline-block;">
            <?php
            if ($_SESSION['admin'] == true) {
                echo '<button onclick="logout()" class="btn btn-danger logout">登出</button>';
            }
            ?>
            </span>
        </div>
</header>
<div class="content"></div>
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">系統管理-登入</div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="login-name">帳號</label>
                        <input type="text" name="login-name" id="login-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="login-password">密碼</label>
                        <input type="text" name="login-password" id="login-password" class="form-control">
                    </div>
                    <div class="input-group">
                        <label for="veri" class="input-group-text" style="border-radius:5px 0 0 5px;">驗證碼: <span
                                class="veri"></span></label>
                        <input type="text" name="veri" id="login-password" class="form-control">
                        <button class="btn btn-outline-primary" style="border-radius:0 5px 5px 0;"
                            onclick="getveri()">刷新驗證碼</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick='login()'>登入</button>
                    <button class="btn btn-secondary" onclick='$("#login").modal("hide")'>關閉</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html> 
<script src="bootstrap.js"></script>
<script>
    function logout() {
        $.post("api/logout.php",function () {
            $(".logoutBtnCase").empty()
        })
    }
    function index() {
        $(".content").load("rounte_map.html")
    }
    function login() {
        var loginDatas = {
            name: $("#login-name").val(),
            password: $("#login-password").val()
        }
        $.post("login.php", loginDatas, function (res) {
            console.log(loginDatas);
            if (res == true) {
                console.log("OK");
                $("#login").modal("hide")
                if ($(".logoutBtnCase").length = 0) {
                    $(".logoutBtnCase").append('<button onclick="logout()" class="btn btn-danger logout">登出</button>');
                } else {
                    console.log("已經有登出按鈕");
                }
            } else if (res == false) {
                console.log("false");
                $(".modal-header").append(`<p style="color: red;">請查看你的帳號或密碼</p>`)
            }
        })
    }
    $("#login").on("hidden.bs.modal", function () {
        $("input").empty()
        $("#vid").empty()
    })
    $("#login").on("show.bs-modal",function () {
        $("body").css("overflow","none")
    })
    function getveri() {
        $.get("./api/veri.php", function (res) {
            $(".veri").text(res)
            let veri = res
        })
    }
    setInterval(check(), 500);
    function check() {
        $.get("api/session.php",(res)=>{
            if (res == true) {
                $(".content").load("admin.php");
                console.log("true");
            } else {
                $(".content").load("rounte_map.html");
            }
        })
    }
</script>