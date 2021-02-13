<?php
    $symbol = $_REQUEST['symbol'];
    $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=".$symbol."&interval=5min&apikey=553XLRD51TWODZTI&datatype=csv";
    $data = file_get_contents($url);
    $row = explode("\n",$data);
    $count = count($row)-1;
    for($i=0;$i< $count;$i++){
        $day[] = explode(",",$row[$i]);
    }

?>
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