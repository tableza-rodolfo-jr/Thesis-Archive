<?php


include_once("connections/connection.php");

$con = connection();

$id = $_GET['id'];

if (isset($_POST['submit'])){
    
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $student_age = $_POST['student_age'];
     $location = $_POST['location'];
    
  $sql  = "INSERT INTO `student_lists`(`archive_id`, `fname_kuno`, `lname_kuno`, `age_kuno`, `location_kuno`) VALUES ('$id', '$fname', '$lname', '$student_age', '$location')";
//   echo $sql;
//   die();

  $con->query($sql) or die ($con->error);

  echo header("Location: index.php");

    // $sql = "INSERT INTO `archive_lists`(`title`, `year_id`, `batch_id`) VALUES ('$title', $year_level, $batch_level)";

    // $con2->query($sql) or die ($con2->error);   

    //  echo header("Location: index.php");
}



                // $sql = "SELECT * FROM school_years ORDER BY id ASC";
                
                // $result_set = $con->query($sql);
                // $schoolYears = $result_set->fetch_all();
              
               
                // // echo '<pre>' . print_r($schoolYears,1) , '</pre>';
                // // die();

                // $sql = "SELECT * FROM school_batches ORDER BY id ASC";
                
                // $result_set = $con->query($sql);
                // $batches = $result_set->fetch_all();

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

<div class="second-form">
     <form action="" method="post" enctype="multiform/form-data">
     <br/>
     <br/>
       <label>FIRSTNAME</label>
       <input id="input1" type="text" name="fname" id="fname"><br/>
       <br/>
       <br/>
       <label>LASTNAME</label>
       <input id="input2" type="text" name="lname" id="lname">    <br/>
       <br/>
       <br/>  
       <label>AGE</label>
       <input id="input3" type="text" name="student_age" id="student_age"><br/>
       <br/>
       <br/>  
       <label>ADDRESS</label>
       <input id="input4" type="text" name="location" id="location"> <br/>
       <br/>
       <br/>  
       
       <input id="input5" type="submit" name="submit" value="Submit">
     
     
     </form>
     </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>