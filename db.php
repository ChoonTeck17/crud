<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "crud");
if($con){
	
}else{
	echo "Not Connected";
}

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "insert into crud  (fname, lname, email, phone) values ('$fname','$lname','$email','$phone')";
    $result = mysqli_query($con,$query);

    if($query){
        $_SESSION['status']= "data inserted succesfully";
        header('location:index.php');
    }else{
        $_SESSION['status']= "data failed to be inserted";
        header('location:index.php');

    }

}
?>