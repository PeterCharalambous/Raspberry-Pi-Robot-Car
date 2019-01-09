<?php
session_start();

if (isset($_POST['end'])) {
    $_SESSION["endTime"] = date('Y-m-d H:i:s');;
    echo "Time the button was clicked: " . $_SESSION["endTime"] . "<br>";
    shell_exec("/usr/local/bin/gpio -g write 17 0");
    shell_exec("/usr/local/bin/gpio -g write 18 0");
    shell_exec("/usr/local/bin/gpio -g write 27 0");
    shell_exec("/usr/local/bin/gpio -g write 22 0");
    header('Location: end.php');
}

$setmode11 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
$setmode12 = shell_exec("/usr/local/bin/gpio -g mode 18 out");
$setmode13 = shell_exec("/usr/local/bin/gpio -g mode 27 out");
$setmode15 = shell_exec("/usr/local/bin/gpio -g mode 22 out");

if (isset($_GET['up'])) {
    shell_exec("/usr/local/bin/gpio -g write 17 1");
    shell_exec("/usr/local/bin/gpio -g write 18 0");
    shell_exec("/usr/local/bin/gpio -g write 27 1");
    shell_exec("/usr/local/bin/gpio -g write 22 0");
    echo "FORWARD";
}
else if (isset($_GET['down'])) {
    shell_exec("/usr/local/bin/gpio -g write 17 0");
    shell_exec("/usr/local/bin/gpio -g write 18 1");
    shell_exec("/usr/local/bin/gpio -g write 27 0");
    shell_exec("/usr/local/bin/gpio -g write 22 1");
    echo "REVERSE";
}
else if (isset($_GET['left'])) {
    shell_exec("/usr/local/bin/gpio -g write 17 1");
    shell_exec("/usr/local/bin/gpio -g write 18 0");
    shell_exec("/usr/local/bin/gpio -g write 27 0");
    shell_exec("/usr/local/bin/gpio -g write 22 1");
    echo "LEFT";
}
else if (isset($_GET['right'])) {
    shell_exec("/usr/local/bin/gpio -g write 17 0");
    shell_exec("/usr/local/bin/gpio -g write 18 1");
    shell_exec("/usr/local/bin/gpio -g write 27 1");
    shell_exec("/usr/local/bin/gpio -g write 22 0");
    echo "REVERSE";
}
else if (isset($_GET['stop'])) {
    shell_exec("/usr/local/bin/gpio -g write 17 0");
    shell_exec("/usr/local/bin/gpio -g write 18 0");
    shell_exec("/usr/local/bin/gpio -g write 27 0");
    shell_exec("/usr/local/bin/gpio -g write 22 0");
    echo "STOP";
}
?>

<head>
    <title>Robot Control</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>

    Robot Control:

    <h4>START TIME: <?php echo $_SESSION["startTime"]; ?> </h4>

    <div style="text-align:center" class="controls" id="controls">
        <form method="get" action="robotControl.php">
            <button type="submit" value="FORWARD" name="up"><img src="https://png.icons8.com/up/color/96" title="Up" width="96" height="96"/></button>
            </br>
            </br>
            <button type="submit" value="LEFT" name="left"><img src="https://png.icons8.com/left/color/96" title="Left" width="96" height="96"/></button>
            <button type="submit" value="STOP" name="stop"><img src="https://png.icons8.com/stop-sign/office/80" title="Stop Sign" width="96" height="96"/></button>
            <button type="submit" value="RIGHT" name="right"><img src="https://png.icons8.com/right/color/96" title="Right" width="96" height="96"/></button>
            </br>
            </br>
            <button type="submit" value="REVERSE" name="down"><img src="https://png.icons8.com/down-arrow/color/96" title="Down Arrow" width="96" height="96"/></button>
            </br>
            </br>
            </form>
            <form method="POST" action="robotControl.php">
            <button name="end" id="end"><img src="https://png.icons8.com/close-window/color/96" title="Close Window" width="96" height="96"></button>
        </form>
    </div>

</body>
