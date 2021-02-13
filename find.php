<?php
    //db connection
$server = "localhost";
$user ="user-app-db";
$password = "user-app-db";
$db = "application-db";

$con = mysqli_connect($server, $user, $password,$db);
if(!$con){
    ?>
    <script>
        alert("Connection with DB couldn't be established");
    </script>
    <?php
}

$company = $_REQUEST['name'];
$selectquery = "select * from `stockcompanies` where name LIKE '%$company%'";
if($result=mysqli_query($con,$selectquery)){
    $i=1;
    while($rows=mysqli_fetch_row($result)){
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$rows[1]."</td>";
        echo "<td>".$rows[2]."</td>";
        echo "</tr>";
        $i++;
    }
}
mysqli_close($con);
?>