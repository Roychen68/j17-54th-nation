<?php
include_once "api/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div.card {
            width: 90%;
            top: 50px;
            margin: auto;
        }
        @media (max-width: 1000px) {
            div.card {
                width: 99%;
            }
        }
    a.btn-info {
        color: rgb(255,255,255);
    }
    a.btn-info:hover {
        color: rgb(255,255,255);
    }
    .active {
        background-color: #007bff;
        border-color: #007bff;
    }
    @media (max-width: 600px) {
            div#content {
                max-height: 900px;
                overflow: auto;
            }
        }

        /* For desktop/laptop devices */
        @media (min-width: 601px) {
            div#content {
                max-height: 600px;
                overflow: auto;
            }
        }
    </style>
    <script src="jquery.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header p-3 btn-group">
            <button class="btn btn-info active" data-pos="station">站點管理</button>
            <button class="btn btn-info" data-pos="bus">接駁車管理</button>
            <button class="btn btn-info" data-pos="form">表單管理(參與者)</button>
            <button class="btn btn-info" data-pos="feedback">表單管理(接駁意願調查表單)</button>
        </div>
        <div class="card-body" id="content">
        </div>
    </div>
</div>
</body>
</html>
<script src="jquery.js"></script>
<script src="bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $("#content").load("admin_station.php")
    })
    $(".btn-info").click(function (e) {
        $(".btn-info").removeClass("active");
        $(this).addClass("active");
        var pos = $(this).data("pos");
        $("#content").load("admin_"+pos+".php")
    })
</script>
