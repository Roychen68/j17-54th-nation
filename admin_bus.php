<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<?php
include "api/db.php";
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>車牌</th>
                <th>行駛時間(分鐘)</th>
                <th>操作
                <button class="btn btn-success" onclick="add()">新增</button>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `bus`";
        $row = $pdo->query($sql)->fetchAll();
        foreach ($row as $rows) {
        ?>
        <tr class="tr-<?=$rows['id']?>">
            <td id="table-plate<?=$rows['id']?>"><?=$rows['plate']?></td>
            <td id="table-time<?=$rows['id']?>"><?=$rows['time']?></td>
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
</body>
</html>
<script src="jquery"></script>
<script>
    function del(id) {
        var check = confirm("你確定要刪除");
        if (check) {
            $.post("./api/bus-del.php",{id},function (res) {
                alert(res)
            })
            $("table").load("admin_bus.php")
        } else {
            alert("你剛取消刪除了這筆資料")
        }
    }
    function add() {
        if ($(".adding").length < 1) {
            $("tbody").append(`
            <tr class="adding">
                <td><input type="text" id="plate" class="form-control"></td>
                <td class="input-group"><span class="input-group-text">AUTO</span><input type="text" id="drive" class="form-control"></td>
                <td>
                <button class="btn btn-primary" onclick="addData()">新增</button>
                <button class="btn btn-danger" onclick='$("table").load("admin_bus.php")'>取消</button>
                </td>
            </tr>
            `)
        } else {
            
        }
    }
    function addData() {
        var formData = {
            plate: "AUTO"+$("#plate").val(),
            drive: $("#drive").val()
        }
        $.post("./api/bus-add.php",formData,function () {
            alert("資料以上傳 請刷新確認資料已上傳");
            $("table").load("admin_bus.php")
        })
    }
    function update(id) {
        var showData = {
            plate: $("#table-plate"+id).text(),
            time: $("#table-time"+id).text()
        }
        $(".tr-"+id).html(`
                <td id="Edit-plate">${showData.plate}</td>
                <td><input type="text" id="Edit-time" class="form-control" value="${showData.time}"></td>
                <td><button class="btn btn-warning" onclick="EditData(${id})">編輯</button></td>
        `)
    }
    function EditData(id) {
        var EditData = {
            plate: $("#Edit-plate").text(),
            time: $("#Edit-time").val(),
            id: id
        }
        $.post("api/bus-edit.php",EditData,function (res) {
            alert(res)
            $("table").load("admin_bus.php")
        })
    }
</script>