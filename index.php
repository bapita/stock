<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Stock-Information</title>
</head>
<body>
<?php
    $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=553XLRD51TWODZTI&datatype=csv";
    $data = file_get_contents($url);
    $row = explode("\n",$data);
    $count = count($row)-1;
    for($i=0;$i< $count;$i++){
        $day[] = explode(",",$row[$i]);
    }

?>
    <div class="container">
        <div class="col-md-12" style="margin-top:20px;">
            <div style="text-align:center;">
                <h1>Stock system using API</h1>
            </div>
        </div>
        <div class="row" style="margin-left:350px; margin-top:50px;">
            <from class="form-inline" id="form">
                <div class="form-group">
                    <input type="text" placeholder="enter company symbol" value="IBM" class="form-control" id="name">
                </div>
                <input type="submit" class="btn btn-success" style="margin-left:20px;" value="Submit">
            </from>
        </div>

        <div class="row" style="margin-top:50px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo $day[0][0]; ?></th>
                        <th><?php echo $day[0][1]; ?></th>
                        <th><?php echo $day[0][2]; ?></th>
                        <th><?php echo $day[0][3]; ?></th>
                        <th><?php echo $day[0][4]; ?></th>
                        <th><?php echo $day[0][5]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        for($x=1; $x<$count; $x++){
                            $day[] = explode(",",$row[$x]);
                            echo "<tr>";
                            echo "<th>".$x."</th>";
                            echo "<td>".$day[$x][0]."</td>";
                            echo "<td>".$day[$x][1]."</td>";
                            echo "<td>".$day[$x][2]."</td>";
                            echo "<td>".$day[$x][3]."</td>";
                            echo "<td>".$day[$x][4]."</td>";
                            echo "<td>".$day[$x][5]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>