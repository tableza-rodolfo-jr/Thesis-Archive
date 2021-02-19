<?php


include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];


$sql = "SELECT * FROM archive_lists WHERE id = '$id' ";
$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();


if (isset($_POST['submit'])){
   
    $title = $_POST['title'];
   
    $year_level = $_POST['year_id'];
      $batch_level = $_POST['batch_id'];
  

  $sql = "UPDATE archive_lists SET `title` =  '$title', `year_id` = '$year_level', `batch_id` = '$batch_level'  
    FROM 
 `archive_lists` a1
 
 INNER JOIN
 school_years a2
 ON a1.year_id=a2.id
 
  INNER JOIN
 school_batches a3
 ON a1.batch_id=a3.id WHERE  `id` = '$id'";


    
   $con->query($sql) or die ($con->error);   

     echo header("Location: details.php?ID=".$id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Thesis Archive</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>  

     <form action="" method="post">
     
       <label>TITLE</label>
       <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>">
       
       <label>YEAR/LEVEL</label>
       <select name="year_id" id="year_id" >
       <option value="SHS" <?php echo ($row['year_id'] == "SHS")? 'selected' : ' '; ?>  >SHS</option>
       <option value="1ST YEAR" <?php echo ($row['year_id'] == "1ST YEAR")? 'selected' : ' '; ?>  >1ST YEAR</option>
       <option value="2ND YEAR" <?php echo ($row['year_id'] == "2ND YEAR")? 'selected' : ' '; ?> >2ND YEAR</option>
       <option value="3RD YEAR" <?php echo ($row['year_id'] == "3RD YEAR")? 'selected' : ' '; ?> >3RD YEAR</option>
       <option value="4TH YEAR"  <?php echo ($row['year_id'] == "4TH YEAR")? 'selected' : ' '; ?>  >4TH YEAR</option>
        </select>
       
       <label>BATCH</label>
       <select name="batch_id" id="batch_id" > 
         <option value="ALPHA"  <?php echo ($row['batch_id'] == "ALPHA")? 'selected' : ' '; ?> >ALPHA</option>
         <option value="BETA"   <?php echo ($row['batch_id'] == "BETA")? 'selected' : ' '; ?>   >BETA</option>
         <option value="CHARLIE" <?php echo ($row['batch_id'] == "CHARLIE")? 'selected' : ' '; ?>     >CHARLIE</option>
         <option value="DELTA"  <?php echo ($row['batch_id'] == "DELTA")? 'selected' : ' '; ?>     >DELTA</option>
         <option value="FALCON" <?php echo ($row['batch_id'] == "FALCON")? 'selected' : ' '; ?>   >FALCON</option>
         <option value="GAMMA"  <?php echo ($row['batch_id'] == "GAMMA")? 'selected' : ' '; ?>>GAMMA</option>
       
       </select>

       <input type="submit" name="submit" value="Update">
     
     
     
     
     </form>


</body>
</html>