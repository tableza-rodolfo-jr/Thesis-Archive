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



$sql = "SELECT a1.id, a1.title, a1.year_id, a2.school_year as 'year', a3.batch as 'batch',  a1.added_at


FROM 
`archive_lists` a1

INNER JOIN
school_years a2
ON a1.year_id=a2.id

 INNER JOIN
school_batches a3
ON a1.batch_id=a3.id";
$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();



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
    <div id="header-img" style="padding: 20px 40px;">
     <h1 style="text-align: center">Online Thesis Archive</h1>
     <img style="float:right;margin-top: -100px;height:160px;width:160px;" id="logo" src="img/kruk.png">
     
     <br/>
     <br/>
     <br/>
     <br/>
     
	<div class="form-div">
	 <form action="result.php" method="get">
        <input id="search-input" type="text" name="search" id="search">
        <button id="search-border" type="submit" >Search</button>
    </form>
	</div>

      <?php if(isset($_SESSION['UserLogin'])) { ?>
     <a style="text-decoration: none; color: black;" href="logout.php">LOGOUT</a>

     <?php if($_SESSION['Access'] == "administrator") { ?>
     <a style="text-decoration: none; color: black; padding-left: 12px" href="add.php">ADD TITLE</a>
     <?php } ?>
      <?php } else { ?>
    
        <a id="login"  href="login.php">LOGIN</a>
        <br/>
        <br/>
        <br/>
      <?php } ?>
      </div>
     <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
           <th>THESIS TITLE</th>
             <th></th>
           <th>YEAR/LEVEL</th>
           <th>BATCH</th>
           <th>DATE ADDED</th>
        
        </tr>
       </thead>

       <tbody>

       <?php do{  ?>
         <tr>
             <td><a  style="text-decoration: none; color: white;   border-radius: 25px;
        background: maroon;
        padding: 10px;
        width: 90px;
        height: 55px;" href="details.php?id=<?php echo $row['id']; ?>>">VIEW</a></td>
            <td><?php echo $row['title'];  ?></td>
             <td><a style="text-decoration: none; color: black;" href="thesis/Thesis-Ch_1-3.pdf"> <img src="img/logo.png" alt=""></a></td>
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