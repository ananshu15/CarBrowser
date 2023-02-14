<?php
include "connect.php";
    //select data from database
    $sql='SELECT * FROM car';
    $output = mysqli_query($conn, $sql);
    $displayPerPage = 1; //number of items that being display on each page
    $sql='SELECT * FROM car'; 
    $output = mysqli_query($conn, $sql);
    $totalResults = mysqli_num_rows($output);

     // determine no of total pages
    $noOfPages = ceil($totalResults/$displayPerPage);

    // to determine which page number you are on
    if (!isset($_GET['page'])) {
        $totalPage = 1;
    } 
    else {
        $totalPage = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page
    $pageResult = ($totalPage-1)*$displayPerPage;

    // retrieve selected results from database and display them on page
    $sql='SELECT * FROM car ORDER BY model ASC LIMIT ' . $pageResult . ',' .  $displayPerPage;
    $output = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport"
       content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');


        td {
            vertical-align: middle;
            text-align: center;
            background-color: grey;
            color: whitesmoke;
        }

        tr {
            vertical-align: middle;
            text-align: center;
        }

        body {
            font-family: 'Poppins';
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        img {

            height: 325px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            border-radius: 12px;
            border: 4.5px black solid;

            }
    </style>
</head>
<body style="margin: 5px;">
    <h3 style='background-color: grey'>CARS DATABASE</h3>
                
    <div class="container-fluid">
        <table class="table">
            <thead style='background-color: #b1102b'>
                <tr>
                    <th style='width: 10%'> ID </th>
                    <th style='width: 10%'>Brand</th>
                    <th style='width: 9%'>Model</th>
                    <th style='width: 9%'>Year</th>
                    <th style='width: 10%'>Color</th>
                    <th style='width: 10%'>Body</th>
                    <th style='width: 10%'>Transmission</th>
                    <th style='width: 10%'>DType</th>
                    <th style='width: 22%'>Options</th>
                 </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_array($output)) {
                echo 
                '<tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["brand"] . '</td>
                <td> ' . $row["model"] . '</td>
                <td> ' . $row["year"] . '</td>
                <td> ' . $row["color"] . '</td>
                <td> ' . $row["body"] . '</td>
                <td> ' . $row["transmission"] . '</td>
                <td> ' . $row["dtype"] . '</td>
                <td>
                <button><a href="Update.php?id='.$row['id'].'">Update</a></button>
                <button><a href="Delete.php?id='.$row['id'].'">Delete</a></button>
                <button><a href="Add.php?id='.$row['id'].'"> Add</a></button>
                <td>
                </tr>
                
                <tr> 
                <td colspan="9" width="250px" height="250px">' . '<img src="'.$row['img_dir'].'" max-width="100%" max-height="100%">' . '</td> 
                </tr>';
            }
        
            ?>

        </table>
        <button><a href="index.php">To Main Page</a></button>

	</div>
     <!-- Pagination -->
     <nav>
            <ul class="pagination justify-content-center">
                <?php
                //First Page
                echo "<li class='page-item'><center><a href='sortByModel.php?page=1' ><button>First</button></a></li>";
                ?>

                <?php
                //Previous page
                    if ($totalPage > 1) {
                        echo "<li><a href='sortByModel.php?page=".($totalPage-1)."' ><button>Previous</button></a></li>";
                    }
                    else {
                        echo "<li><a href='' ><button type'button' disabled>Previous</button></a></li>";
                    }
                ?>
                
                <?php
                    //Next page
                    if ($totalPage < $noOfPages) {
                        echo "<li><a href='sortByModel.php?page=".($totalPage+1)."'><button>Next</button></a></li>";
                    }
                    else {
                        echo "<li><a href='' ><button type'button' disabled >Next</button></a></li>";
                    }
                ?>

                <?php
                //Last Page
                echo "<li><a href='sortByModel.php?page=".$noOfPages."'><button>Last</button></a></li>";
                ?>
            </ul>
        </nav>
    </div>
    </table>
</body>
</html>
