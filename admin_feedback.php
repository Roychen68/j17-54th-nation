<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        label{
            font-size: 20px;
        }
        #sujust{
            margin-right: 30px;
        }
    </style>
</head>
<body>
<?php
include "api/db.php";
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>郵件地址</th>
                <th>名字</th>
                <th>操作
                <button class="btn btn-success" onclick="add()">新增</button>
                <div class="custom-control custom-checkbox" style="display:inline-block;">
                    <input type="checkbox" id="form-switch" class="custom-control-input">
                    <label for="form-switch" class="custom-control-label">啟用表單</label>
                </div>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `form`";
        $row = $pdo->query($sql)->fetchAll();
        foreach ($row as $rows) {
        ?>
        <tr class="tr-<?=$rows['id']?>">
            <td id="table-mail<?=$rows['id']?>"><?=$rows['mail']?></td>
            <td id="table-name<?=$rows['id']?>"><?=$rows['name']?></td>
            <td>
            <button class="btn btn-warning" onclick="update(<?=$rows['id']?>)"><img src="./img/PENCIL.png" style="height: 25px;">編輯</button>
            <button class="btn btn-danger" onclick="del(<?=$rows['id']?>)">刪除</button>
        </td>
        </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="card-footer p-2 d-flex">
        <div class="input-group d-flex" style="width:300px;margin-right:30px;">
            <label class="input-group-text" for="num">每</label>
            <input type="number" id="num" class="form-control">
            <label class="input-group-text" for="num">個人一班車</label>
        </div>
        <button class="btn btn-info h-50" id="sujust">建議分配<span class="sujust"></span>班接駁車</button>
        <button class="btn btn-info h-50" onclick="allocate()">分配接駁車</button>
    </div>
</body>
</html>
<script src="jquery.js"></script>
<script>
    let data = {}
    $(document).ready(function () {
        $.post("form/switch.php",{ boolean : false },function (res) {
            console.log(res);
        })
        $("#num").val("50");
        data = {
            num: 50
        }
    })
    $("#num").on("input",function () {
        data = {
            num: $("#num").val()
        }
        $.post("api/sujust.php",data,function (res) {
            console.log(res);
            $("span.sujust").text(res)
        })
    })
    function allocate() {
        if (data.num < 1 || $("#num").val().lenth < 1) {
            alert("請輸入有效數值")
        }else{
        $.post("api/allocate.php",data,function (res) {
            alert("已派出"+res+"班接駁車")
        }) 
        }
    }
    $("#form-switch").click(function () {
            $.post("form/switch.php",{ boolean : true },function (res) {
                console.log(res);
            })
    })
    function del(id) {
        var check = confirm("你確定要刪除");
        if (check) {
            $.post("./api/form-del.php",{id},function (res) {
                alert(res)
            })
            $("table").load("admin_form.php")
        } else {
            alert("你剛取消刪除了這筆資料")
        }
    }
    function add() {
        if ($(".adding").length < 1) {
            $("tbody").append(`
            <tr class="adding">
                <td><input type="text" id="mail" class="form-control"></td>
                <td><input type="text" id="name" class="form-control"></td>
                <td>
                <button class="btn btn-primary" onclick="addData()">新增</button>
                <button class="btn btn-danger" onclick='$("table").load("admin_form.php")'>取消</button>
                </td>
            </tr>
            `)
        } else {
            
        }
    }
    function addData() {
        var formData = {
            mail: $("#mail").val(),
            name: $("#name").val()
        }
        $.post("./api/form-add.php",formData,function () {
            alert("資料以上傳 請刷新確認資料已上傳");
            $("table").load("admin_form.php")
        })
    }
    function update(id) {
        var showData = {
            mail: $("#table-mail"+id).text(),
            name: $("#table-name"+id).text()
        }
        $(".tr-"+id).html(`
                <td><input type="text" id="Edit-mail" class="form-control" value="${showData.mail}"></td>
                <td><input type="text" id="Edit-name" class="form-control" value="${showData.name}"></td>
                <td><button class="btn btn-warning" onclick="EditData(${id})">編輯</button></td>
        `)
    }
    function EditData(id) {
        var EditData = {
            mail: $("#Edit-mail").val(),
            name: $("#Edit-name").val(),
            id: id
        }
        $.post("api/form-edit.php",EditData,function (res) {
            alert(res)
            $("table").load("admin_form.php")
        })
    }
</script>