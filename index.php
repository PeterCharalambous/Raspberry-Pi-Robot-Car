<?php
session_start();

if (isset($_POST['click'])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["startTime"] = date('Y-m-d H:i:s');;
    echo "Time the button was clicked: " . $_SESSION["startTime"] . "<br>";
    header('Location: robotControl.php');
}
?>
<style>
.inputName {
    margin-bottom: 15px;
}
</style>
<head>
    <title>Robot Control - Develop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>

<body>
    <form action="index.php" method="POST">
        <div class='form-group' style="text-align:center" id="divBegin">
            </br>
            <input type="text" class="inputName" placeholder="Enter name" name="name" id="name" required/>
            </br>
            <button type="submit" name="click" id="click"><img src="https://png.icons8.com/play/color/96" title="Play" width="96" height="96"/></button>
        </div>
    </form>
</body>
