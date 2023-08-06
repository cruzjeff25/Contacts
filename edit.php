<?php
include "db_conn.php";
$id= $_GET['id'];

if(isset ($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `contacts_tb` SET `name`='$name',`phone`='$phone',`email`='$email',`gender`='$gender' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Record has been updated");
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
        <?php

        $sql = "SELECT * FROM `contacts_tb` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
  
    
        <div class="form-con"> 
            <h3>Edit Contact Information</h3>
            <p style="color:gray; margin-bottom:1rem;">Click the Update button after changing information</p>
            

            <form method="post">
                <div class="col">
                    <label for="">Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name'] ?>"required/>
                </div>


                <div class="col">
                    <label for="">Phone:</label>
                    <input type="number" name="phone" value="<?php echo $row['phone'] ?>" required/>
                </div>


                <div class="col">
                    <label for="">Email:</label>
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" required/>
                </div>


                <div class="">
                    <label for="">Gender:</label>
                    <br/>

                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male" 
                        <?php echo ($row['gender'] == 'male') ? "checked" : "" ?> required/>

                    <label for="male">Female</label>
                    <input type="radio" name="gender" id="female" value="female" 
                        <?php echo ($row['gender'] == 'female') ? "checked" : "" ?> required/>
                </div> 
                <div class="button">
                    <button type="submit" name="submit">Update</button>
                    <a href="index.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>