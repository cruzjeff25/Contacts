<?php
include "db_conn.php";

if(isset ($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `contacts_tb`(`id`, `name`, `phone`, `email`, `gender`) VALUES (NULL,'$name','$phone','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=New record created successfully");
    }
    else{
        echo "Failed: " .mysqli_error($conn);
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts - CRUD App</title>
</head>
<body>
    <div class="page">
        <nav >
            <h1> Contacts Application </h1>
        </nav>
    
        <div class="form-con"> 
            <h3>Add New Contact</h3>
            <form method="post">
                <div class="col">
                    <label for="">Name:</label>
                    <input type="text" name="name" placeholder="Peter Park" required/>
                </div>


                <div class="col">
                    <label for="">Phone:</label>
                    <input type="number" name="phone" placeholder="09123456789" required/>
                </div>


                <div class="col">
                    <label for="">Email:</label>
                    <input type="text" name="email" placeholder="peter@yahoo.com" required/>
                </div>


                <div class="">
                    <label for="">Gender:</label>
                    <br/>

                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male" required/>
                    <label for="male">Female</label>
                    <input type="radio" name="gender" id="female" value="female" required/>
                </div> 
                <div class="button">
                    <button type="submit" name="submit">Submit</button>
                    <a href="index.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>