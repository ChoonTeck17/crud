
<?php

$host ="localhost";
$user ="root";
$password ="";
$db="crud";

$con = mysqli_connect($host, $user, $password, $db);


if(isset($_POST['delete'])){
    $all_id = $_POST['dlt_chkbox'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;
    $query = "delete from crud where id IN ($extract_id)";
    $result = mysqli_query($con, $query);

        if($result){
            echo '<script>alert("successfully deleted"); window.location.href = "index.php";</script>'; 
        }else{
            echo '<script>alert("delete failed"); window.location.href = "index.php";</script>'; 
        }
    }

?>