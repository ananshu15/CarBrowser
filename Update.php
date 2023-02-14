<?php
include "connect.php";

        if (isset($_GET['id'])) {

            $uid = $_GET['id'];
	
    $sql = "SELECT * FROM `car` WHERE `id` = '$uid'";
   $output = $conn->query($sql);

if ($output->num_rows > 0) {
		 while($row = $output->fetch_assoc()) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1, shirnk-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Updating a car</title>
</head>

<body>

    <div>
    <h2>Updating a Car</h2>
	
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label>Brand</label><br>
                <input type="text" name="brand" value="<?php echo $row['brand'] ?>"><br>
            </div>
            <div>
                <label>Model</label><br>
                <input type="text" name="model" value="<?php echo $row['model'] ?>"><br>
            </div>
            <div>
                <label>Year</label><br>
                <input type="year" name="year" value="<?php echo $row["year"] ?>"><br>
            </div>
            <div>
                <label>Color</label><br>
                <select name="color" id="color" value="<?php echo $row["color"] ?>"><br>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Sliver">Sliver</option>
                <option value="Red">Red</option>
                <option value="Green">Green</option>
                <option value="Yellow">Yellow</option>
                <option value="Blue">Blue</option>
            </select><br>
            </div>
            <div>
                <p><label>Body</label></p>
                <select name="body" id="body" value="<?php echo $row["body"] ?>"><br>
                <option value="sedan">Sedan</option>
                <option value="coupe">Coupe</option>
                <option value="sport">Sport Car</option>
                <option value="luxury">Luxury</option>
                <option value="convertible">Convertible</option>
                <option value="SUV">SUV</option>
                <option value="truck">Truck</option>
            </select><br>
            </div>
            <div>
                <p><label>Transmission</label></p>

                <?php if ($row["transmission"] === "Manual" ){?>

                    <input type="radio" id="Manual" name="transmission" value="Manual" checked>
                    <label for="Manual">Manual</label><br>

                    <input type="radio" id="Automatic" name="transmission" value="Automatic">
                    <label for="Automatic">Automatic</label><br>

                <?php } else {?>

                    <input type="radio" id="Manual" name="transmission" value="Manual">
                    <label for="Manual">Manual</label><br>

                    <input type="radio" id="Automatic" name="transmission" value="Automatic" checked>
                    <label for="Automatic">Automatic</label><br>
                    
                <?php } ?>
            </div>
            <div>
            <p><label>Drive Type</label></p>
				<?php if ($row["dtype"] === "AWD" ){?>
	
                    <input type="radio" id="AWD" name="dtype" value="AWD" checked>
                    <label for="AWD">AWD</label><br>

                    <input type="radio" id="RWD" name="dtype" value="RWD">
                    <label for="RWD">RWD</label><br>
                
                    <input type="radio" id="FWD" name="dtype" value="FWD">
                    <label for="FWD">FWD</label><br>

                
				<?php } else if($row["dtype"] === "RWD") {?>

                    <input type="radio" id="AWD" name="dtype" value="AWD">
                    <label for="AWD">AWD</label><br>

                    <input type="radio" id="RWD" name="dtype" value="RWD" checked>
                    <label for="RWD">RWD</label><br>
            
                    <input type="radio" id="FWD" name="dtype" value="FWD">
                    <label for="FWD">FWD</label><br>
                    
                   
				<?php } else { ?>
                    <input type="radio" id="AWD" name="dtype" value="AWD">
                    <label for="AWD">AWD</label><br>

                    <input type="radio" id="RWD" name="dtype" value="RWD">
                    <label for="RWD">RWD</label><br>
            
                    <input type="radio" id="FWD" name="dtype" value="FWD" checked>
                    <label for="FWD">FWD</label><br>

                <?php } ?>
            </div>

            <div>
            <p><label for="image">Car Photo</label></p>
			
			<img src="<?php echo $row["img_dir"] ?>" width="350" height="250"><br>
	
            </div>
			
            <p><input type="submit" name="submit"value="Submit"></p>
            <button><a href="index.php">Cancel</a></button>
</form>
		

<form action="" method="post" enctype="multipart/form-data">
<div>
            <label for="image">Changing Car Image</label>
			<input type="file" name="image" id="image">
    <input type="submit" name="update" value="Change">        
	</div>		
	 
</form>

<?php 
if(isset($_POST['update'])){
	// Setting our images folder
        $imgDirectory = "cars/";
        $target_file = $imgDirectory . basename($_FILES["image"]["name"]);        
        if (!file_exists($_FILES["image"]["tmp_name"])) 
        {
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

		$sql = "UPDATE car SET img_dir = '$target_file' WHERE id = $uid";
if ($conn->query($sql) === TRUE) {


}
	echo '<script>
		window.location = "index.php";
		
	</script>';
}}}
?>
		<?php
		
		if(isset($_POST['submit'])){
			$filepath = $row["img_dir"];
			$originalimage = isset($_POST[$filepath]);
		$sql = "UPDATE car SET brand = '".$_POST['brand']."',model = '".$_POST['model']."',year = '".$_POST['year']."',color = '".$_POST['color']."',body = '".$_POST['body']."',transmission = '".$_POST['transmission']."',dtype = '".$_POST['dtype']."' WHERE id = $uid";
if ($conn->query($sql) === TRUE) {


}
	echo '<script>
		window.location = "index.php";
		
	</script>';}	 
}
}	}?>
		

</body>
</html>
