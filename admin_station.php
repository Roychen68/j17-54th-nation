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
                <th>站點名稱</th>
                <th>行駛時間(分鐘)</th>
                <th>停留時間(分鐘)</th>
                <th>操作 
                <button class="btn btn-success" onclick="add()">新增</button>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `station`";
        $row = $pdo->query($sql)->fetchAll();
        foreach ($row as $rows) {
        ?>
        <tr class="tr-<?=$rows['id']?>">
            <td id="table-station<?=$rows['id']?>"><?=$rows['station']?></td>
            <td id="table-drive<?=$rows['id']?>"><?=$rows['drive']?></td>
            <td id="table-stop<?=$rows['id']?>"><?=$rows['stop']?></td>
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
            $.post("./api/staiotn-del.php",{id},function (res) {
                alert(res)
            })
            $("table").load("admin_station.php")
        } else {
            alert("你剛取消刪除了這筆資料")
        }
    }
    function add() {
        if ($(".adding").length < 1) {
            $("tbody").html(`
            <tr class="adding">
                <td><input type="text" id="station" class="form-control"></td>
                <td><input type="text" id="drive" class="form-control"></td>
                <td><input type="text" id="stop" class="form-control"></td>
                <td>
                <button class="btn btn-primary" onclick="addData()">新增</button>
                <button class="btn btn-danger" onclick='$("table").load("admin_station.php")'>取消</button>
                </td>
            </tr>
            `)
        } else {
            
        }
    }
    function addData() {
        var formData = {
            station: $("#station").val(),
            drive: $("#drive").val(),
            stop: $("#stop").val()
        }
        $.post("./api/station-add.php",formData,function () {
            alert("資料以上傳 請刷新確認資料已上傳");
            $("table").load("admin_station.php")
        })
    }
    function update(id) {
        var showData = {
            station: $("#table-station"+id).text(),
            park: $("#table-stop"+id).text(),
            drive: $("#table-drive"+id).text(),
        }
        $(".tr-"+id).html(`
                <td id="Edit-station">${showData.station}</td>
                <td><input type="text" id="Edit-drive" class="form-control" value="${showData.drive}"></td>
                <td><input type="text" id="Edit-stop" class="form-control" value="${showData.park}"></td>
                <td><button class="btn btn-warning" onclick="EditData(${id})">編輯</button></td>
        `)
    }
    function EditData(id) {
        var EditData = {
            station: $("#Edit-station").text(),
            drive: $("#Edit-drive").val(),
            stop: $("#Edit-stop").val(),
            id: id
        }
        $.post("api/station-edit.php",EditData,function (res) {
            alert(res)
            $("table").load("admin_station.php")
        })
    }
</script>