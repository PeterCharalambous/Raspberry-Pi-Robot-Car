<?php
session_start();

$data_array = [
            [$_SESSION["name"],$_SESSION['startTime'],$_SESSION['endTime']]
        ];

foreach ($data_array as $record){
    $csv.= $record[0].','.$record[1].','.$record[2]."\n"; //Append data to csv
}

$csv_handler = fopen ('csvfile.csv','a');
fwrite ($csv_handler,$csv);
fclose ($csv_handler);

echo 'Data saved to csvfile.csv';

?>
<meta http-equiv="refresh" content="5;URL=index.php" />

<p>You will be automatically redirected to the home page in 5 seconds<p>
<a href="index.php">Click here if you are not redirected<a>

<h2>NAME: <?php echo $_SESSION["name"]; ?> </h2>
</br>
<h2>START TIME <?php echo $_SESSION['startTime']; ?> </h2>
</br>
<h2>END TIME <?php echo $_SESSION['endTime']; ?> </h2>
