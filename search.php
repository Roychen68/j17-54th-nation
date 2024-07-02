<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>接駁意願調查表單</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
        form.card{
            width: 70%;
        }
    </style>
<script src="jquery.js"></script>
</head>
<body>
<header class="shadow d-flex w-100 header rounded-bottom p-1">
        <div class="col-5" style="display: flex; cursor: pointer;" onclick="index()">
            <img src="./img/logo.png" alt="logo" class="logo">
        </div>
        <div class="col-3 p-3">
            <button class="btn btn-primary m-auto" onclick='$("#search").modal("show");'>班次查詢</button>
        </div>
</header>
<div class="card mt-5 ml-auto mr-auto" style="width: 70%;">
    <div class="card-body">
        <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="mail">信箱</label>
            <input type="text" class="form-control" id="mail">
        </div> 
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" onclick="send()">回應</button>
    </div>
</div>
<div class="modal fade" id="search">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>班次查詢</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">姓名</label>
                    <input type="text" name="" id="name-search" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mail">帳號</label>
                    <input type="text" name="" id="mail-search" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="searchBus()">查詢</button>
            </div>
        </div>
    </div>
</div>
</body>
</html> 
<script src="jquery.js"></script>
<script src="bootstrap.js"></script>
<script>
    let session
    function check() {
        $.get("form/switch.php",function (res) {
            session = res
        })
    }
    function send() {
        let formData = [];
        check()
        if (session == false) {
            alert("該表單目前不接受回應");
        } else {
            formData = {
                name: $("#name").val(),
                mail: $("#mail").val()
            }
            console.log(formData);
            if (formData.name.length < 1|| formData.mail.length < 1) {
                alert("我很餓請為我東西吃 不要丟空氣給我吃")
            } else {
            $.post("form/check.php",formData,function (res) {
                alert(res);
                console.log(formData);
            }) 
            }
        }
    }
    function searchBus() {
            var formData = {
                name: $("#name-search").val(),
                mail: $("#mail-search").val()
            }
            console.log(formData);
            if (formData.name.length < 1|| formData.mail.length < 1) {
                alert("我很餓請為我東西吃 不要丟空氣給我吃")
            } else {
            $.post("fetch/search.php",formData,function (res) {
                alert(res);
                console.log(formData);
            }) 
            }
    }
</script>