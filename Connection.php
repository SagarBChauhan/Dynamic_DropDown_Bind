  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<?php            
    $host="localhost";
    $user="root";
    $password="root";
    $database="user_manager";
    $con=mysqli_connect($host, $user, $password, $database);
    if($con)
    {
        $connection_status= "<p class='card-category text-success text-capitalize font-weight-bold'><i class='fab fa-connectdevelop'></i> server Online <i class='fas fa-check-double'></i></p>";
    }
    else
    {
        $connection_status=("<p class='card-category  text-warning text-capitalize font-weight-bold'><i class='fab fa-connectdevelop'></i> Connaction Failed <i class='fas fa-times'></i></p>");
    }
?>
