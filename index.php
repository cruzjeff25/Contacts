
<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="indexStyles.css">
    
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert">
            <span class="closebtn">&times;</span> 
            '.$msg.'
          </div>';
        }
        ?>

        <div class="table-con">
            <a href="add_new.php" class="add"><i class="fa-solid fa-user-plus"></i> Add Contact</a>
            <table>
                <thead> 
                    <tr>
                      <th class ="id">ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";

                        $sql = "SELECT * FROM `contacts_tb`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                    ?>      
                        <tr>
                            <td class ="id"><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['gender']?></td>
                            <td class="icons">
                                <a href="edit.php?id=<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a>
                                &nbsp;
                                <a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['name']?> in contact ?')" rel="noopener"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
                            </td>
                        </tr>
                        

                    <?php  
                        }
                    ?>
                     
                </tbody>

            </table> 
        </div>
            
    </div>
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }
</script>
</body>
</html>