<?php
include "connect.php";

if (isset($_POST['submit'])) {
	$brand=$_POST['brand'];
    $model=$_POST['model'];
    $year=$_POST['year'];
    $color=$_POST['color'];
    $body=$_POST['body'];
    $transmission=$_POST['transmission'];
    $dtype=$_POST['dtype'];
	
  // Setting our images folder
        $imgDirectory = "cars/";
        $target_file = $imgDirectory . basename($_FILES["image"]["name"]);        
        if (!file_exists($_FILES["image"]["tmp_name"])) 
        {
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

	
    $sql="INSERT INTO car(brand, model, year, color, body, transmission, dtype, img_dir)
    VALUES('$brand','$model', '$year', '$color', '$body', '$transmission', '$dtype', '$target_file')";
	
	
    $output=mysqli_query($conn, $sql);
	
	
    if($output == TRUE) {
        echo "Data inserted successfully";
    }
    else {
        echo "Error:". $sql . "<br>". $conn->error;
    }  
    
	}
		}
echo '<script>
		window.location = "index.php";
		
	</script>';}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport"
       content="width=device-width, initial-scale=1.0">  
    <title>Adding a car</title>
</head>
<body>

    <div>
    <h2 >Adding a Car</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label>Brand</label><br>
                <input type="text" name="brand"><br>
            </div>
            <div>
                <label>Model</label><br>
                <input type="text" name="model"><br>
            </div>
            <div">
                <label>Year</label><br>
                <input type="text" name="year"><br>
            </div>
            <div>
                <label>Color</label><br>
                <select name="color" id="color"><br>
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
                <select name="body" id="body"><br>
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
               <p> <label>Transmission</label></p>
                <input type="radio" id="Manual" name="transmission" value="Manual">
                <label for="Manual">Manual</label><br>

                <input type="radio" id="Auto" name="transmission" value="Auto">
                <label for="Auto">Automatic</label><br>
            </div>
            <div>
                <p><label>Drive Type</label><br></p>
                    <input type="radio" id="AWD" name="dtype" value="AWD">
                    <label for="AWD">AWD</label><br>
                    <input type="radio" id="RWD" name="dtype" value="RWD">
                    <label for="RWD">RWD</label><br>
                    <input type="radio" id="FWD" name="dtype" value="FWD">
                    <label for="FWD">FWD</label><br>
                   
            </div>
            <div>
            <p><label for="image">Upload Your Photo</label></p>
			<input type="file" name="image" id="image">
            </div>
            <p><input type="submit" name="submit" value="Submit"></p>
            <button><a href="index.php">Cancel</a></button>
</form>

</body>
</html>
