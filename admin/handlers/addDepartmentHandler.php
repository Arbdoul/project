<?php
  require_once '../../connection.php';
  $output = '';
  session_start();
 if(isset($_POST['submit'])){
   if(!empty($_POST['department_name'])){
    try{
        $sql = "INSERT INTO departments(department_name,faculty_name) values (:department_name,:faculty_name)";

        $department_name = $_POST['department_name'];
        $faculty_name = $_POST['faculty_name'];

         $prepaarestmt = $conn->prepare($sql);
         $bindarray['department_name'] = $department_name;
         $bindarray['faculty_name'] = $faculty_name;
         
         $prepaarestmt->execute($bindarray);
        
         $_SESSION['success'] = 'Department Added Successfully';
         header("Location: //localhost/SIMS/admin/pages/adddepartment.php");
    }
     catch(PDOException $e){
           //echo  "above line 28".$e->getMessage();
           $_SESSION['error'] = 'Unable to add Department, pls try again';
           header("Location: //localhost/SIMS/admin/pages/adddepartment.php");
      }
    }

    else{

       $_SESSION['error'] = 'Enter Department Name and pls try again';
       header("Location: //localhost/SIMS/admin/pages/adddepartment.php");
    }
    }

?>