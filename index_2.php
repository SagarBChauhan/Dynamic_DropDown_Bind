<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="ajaxData.php"></script>
<?php
//Include the database configuration file
include './Connection.php';
include './ajaxData.php';

//Fetch all the country data
$query = $con->query("SELECT `contryid`, `cname` FROM `tbl_country`;");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select id="country">
    <option value="">Select Country</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['contryid'].'">'.$row['cname'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>

<select id="city">
    <option value="">Select state first</option>
</select>
<?php
if(!empty($_POST["contryid"])){
    //Fetch all state data
   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['contryid']." AND status = 1 ORDER BY state_name ASC");
    $query = $con->query("SELECT `State_Id`, `Name`, `Country_Id` FROM `tbl_state` WHERE `Country_Id`=".$_POST['contryid']." ORDER BY Name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['State_Id'].'">'.$row['Name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
    //Fetch all city data
   // $query = $con->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    $query = $con->query("SELECT * FROM tbl_city WHERE `State_Id` =".$_POST['state_id']."  ORDER BY `Name` ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['City_Id'].'">'.$row['Name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>