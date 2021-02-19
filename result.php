<?php

if(!isset($_SESSION)){
    session_start();
    
 }

 if(isset($_SESSION['UserLogin'])){
     echo "Welcome ".$_SESSION['UserLogin'];
 }else {
     echo "Welcome Guest";
 }


include_once("connections/connection.php");

$con = connection();

 $search = $_GET['search'];

//  SELECT a1.id, a1.title, a1.year_id, a2.school_year

//  FROM 
//  `archive_lists` a1
//  INNER JOIN
//  school_years a2
//  ON a1.year_id=a2.id

//  $sql = "SELECT * FROM archive_lists WHERE title LIKE '%$search%' || batch LIKE '%$search%' ORDER BY id DESC";

 $sql = "SELECT a1.id, a1.title, a1.year_id, a2.school_year as 'year', a3.batch as 'batch',  a1.added_at


 FROM 
 `archive_lists` a1
 
 INNER JOIN
 school_years a2
 ON a1.year_id=a2.id
 
  INNER JOIN
 school_batches a3
 ON a1.batch_id=a3.id
 WHERE a1.title LIKE '%$search%' || a3.batch LIKE '%$search%' ORDER BY id DESC
 ";

$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();

// echo '<pre>' . print_r($row,1) , '</pre>';
// die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Thesis Archive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


  

</head>


<body>  
<br/>
<br/>

     <h1>Online Thesis Archive</h1>
     <br/>
     <br/>
     <br/>
     <br/>
     <a style="text-decoration: none; color: black;" href="index.php">  <-BACK</a>
     <div class="form-div">
        <form action="result.php" method="get">
       <input  type="text" name="search" id="search">
       <button type="submit">Search</button>
       </form>
       </div>

      <?php if(isset($_SESSION['UserLogin'])) { ?>
     <a href="logout.php">LOGOUT</a>
      
      <?php } else { ?>
    
        <a style="text-decoration: none; color: black;" href="login.php">LOGIN</a>
      <?php } ?>

     <a style="text-decoration: none; color: black;" href="add.php">ADD TITLE</a>
     <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
           <th>THESIS TITLE</th>
           <th>YEAR/LEVEL</th>
           <th>BATCH</th>
           <th>DATE ADDED</th>
        
        </tr>
       </thead>

       <tbody>

       <?php do{  ?>
         <tr>
             <td><a style="text-decoration: none; color: black;" href="details.php?id=<?php echo $row['id']; ?>>">VIEW</a></td>
            <td><?php echo $row['title'];  ?></td>
            <td><?php echo $row['year']; ?> </td>
            <td><?php echo $row['batch']; ?> </td>
            <td><?php echo date('M j, Y',strtotime($row['added_at'])); ?> </td>
           
         
         </tr>
         <?php }while($row = $archive->fetch_assoc())  ?>
        </tbody>
     
     
     </table>



</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>