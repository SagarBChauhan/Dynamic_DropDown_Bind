<?php
require_once("./Connection.php");
$query ="SELECT * FROM tbl_country";
$results=  mysqli_query($con, $query);
?>

<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
</head>
<style>
body{width:610px;font-family:calibri;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "index.php",
	data:'contryid='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "index.php",
	data:'State_Id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">
<label>Country:</label><br/>
<select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
<option value disabled selected>Select Country</option>
<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["contryid"]; ?>"><?php echo $country["cname"]; ?></option>
<?php
}
?>
</select>
</div>
<div class="row">
<label>State:</label><br/>
<select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
<option value="">Select State</option>
</select>
</div>
<div class="row">
<label>City:</label><br/>
<select name="city" id="city-list" class="demoInputBox">
<option value="">Select City</option>
</select>
</div>
</div>
<?php
require_once ("./Connection.php");
$db_handle = new DBController();
if (! empty($_POST["contryid"])) {
    $query = "SELECT * FROM tbl_state WHERE Country_Id = '" . $_POST["contryid"] . "';";
    $results=  mysqli_query($con, $query);
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["State_Id"]; ?>"><?php echo $state["Name"]; ?></option>
<?php
    }
}
?>
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
</body>
</html>