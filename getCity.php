<?php
require_once ("./Connection.php");
if (! empty($_POST["State_Id"])) {
    $query = "SELECT * FROM tbl_city WHERE State_Id = '" . $_POST["State_Id"] . "' order by Name asc";
    $results=  mysqli_query($con, $query);
    ?>
<option value disabled selected>Select City</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["City_Id"]; ?>"><?php echo $city["Name"]; ?></option>
<?php
    }
}
?>