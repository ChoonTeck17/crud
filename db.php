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

if (isset($_POST['view'])){
    $id = $_POST['user_id'];

    // echo $id;
    $query = "select * from crud where id = '$id'";
    $result= mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)){
            echo '<h6>'.$row['id'].'</h6>
                  <h6>'.$row['fname'].'</h6>
                  <h6>'.$row['lname'].'</h6>
                  <h6>'.$row['email'].'</h6>
                  <h6>'.$row['phone'].'</h6>';
        }
}else{
    echo $result = '<h4> no record found </h4>';
    }
}
?>