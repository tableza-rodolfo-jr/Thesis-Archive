    <?php

if(!isset($_SESSION)){
    session_start();
    
 }

 if(($_SESSION['Access'] == "student" || $_SESSION['Access'] == "administrator"  )){  
  

     echo "Welcome ".$_SESSION['UserLogin']."<br/>";
    
 }else {
     echo header("Location: index.php");
 }




include_once("connections/connection.php");

$con = connection();
$con2 = connection();

$id = $_GET['id'];


$sql = "SELECT a1.id, a1.title, a1.year_id, a2.school_year as 'year', a3.batch as 'batch',  a1.added_at


FROM 
`archive_lists` a1

INNER JOIN
school_years a2
ON a1.year_id=a2.id

 INNER JOIN
school_batches a3
ON a1.batch_id=a3.id

WHERE a1.id = '$id'";

$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();

// print_r($row);

$sql_students = "SELECT * FROM student_lists WHERE archive_id='$id'";
// echo $sql_students;

$students = $con2->query($sql_students) or die ($con2->error);
$student_rows = $students->fetch_all();


// echo '<pre>' . print_r($student_rows, 1) . '</pre>';
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
    

    <form  action="delete.php" method="post">
    <a style="text-decoration: none; color: black;padding-left:20px" href="index.php">  <-BACK</a>

    <?php if($_SESSION['Access'] == 'administrator') { ?>
    <a  style="text-decoration: none; color: black;padding-left:20px"  href="edit.php?ID=<?php echo $row['id']; ?>">EDIT</a>
    <?php } ?>

    <?php if($_SESSION['Access'] == "administrator") { ?>
    <button style="padding-left:20px;margin-left:20px;" type="submit" name="delete">DELETE</button>
    <?php } ?>

    <?php if($_SESSION['Access'] == 'administrator') { ?>
    <a style="text-decoration: none; color: black;padding-left:20px"  href="student_add.php?id=<?php echo $row['id']; ?>">ADD STUDENT</a>
    <?php } ?>

    <?php if($_SESSION['Access'] == 'administrator') { ?>
    <a style="text-decoration: none; color: black; padding-left:20px"  href="user_accounts.php?id=<?php echo $row['id']; ?>">ALL ACCOUNTS</a>
    <?php } ?>


    <input type="hidden" name="id" value="<?php echo $row['id']; ?> ">

    </form>
     <br/>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5><?php echo $row['title']; ?></h5></li>
            <li class="list-group-item"><h5><?php echo $row['year']; ?></h5></li>
            <li class="list-group-item"><h5><?php echo $row['batch']; ?></h5></li>
            <li class="list-group-item"><h5><?php echo $row['added_at']; ?></h5></li>
        </ul>
    
     <table class="table table-striped">
        <thead>
        <tr>
           
           <th>Name</th>
           <th>AGE</th>
           <th>ADDRESS</th>

           
        </tr>
       </thead>

       <tbody>
       
       <?php 
        
        foreach ($student_rows as $key => $value) {
            
            print "<tr><td>{$student_rows[$key][2]} {$student_rows[$key][3]}</td>";
            print "<td>{$student_rows[$key][4]}</td>";
            print "<td>{$student_rows[$key][5]}</td></tr>";
          
             
            // print "<option value=\"{$schoolYears["$key"][0]}\">{$schoolYears["$key"][1]}</option>";  
 
        }
        
 
        ?>

        
        </tbody>
     
     
     </table>

         

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>