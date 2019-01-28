<?php include('checkIP.php')?>
<!DOCTYPE html>
<html>
<head>
<title>ModifyInventory</title>
<link rel="stylesheet" href="../CSS/pages.css">
</head>
<body>
    <a href="../inventory.php" class = "header">GOTO MAIN MENU</a>
    <form action='modify.php' method='POST'> 
        <h1>Modify</h1>
        <table>
        <?php

            if($user_ip === '::1'){ //FOR HQ BRANCH (selecting which branch data to modify)
                echo" 
                <tr>
                <td>Modifying Data of Branch</td>
                <td><input type='radio' name='branch' value='Karachi' checked='checked'> Karachi<br>
                <input type='radio' name='branch' value='Lahore'> Lahore<br>
                <input type='radio' name='branch' value='Faisalabad'> Faisalabad</td>
                </tr>";
            }
        ?>

            <tr>
                <td>Entering  New Record for Product No</td>
                <td><input type="text" name="pNo" required autocomplete="off"/></td>
            </tr>
            <tr>
                    <td>Article No</td>
                    <td><input type="text" name="aNo" required autocomplete="off"/></td>
            </tr>
            <tr>
                    <td>Size</td>
                    <td><input type="text" name="size" required autocomplete="off"/></td>
            </tr>
            <tr>
                    <td>Color</td>
                    <td><input type="text" name="color" required autocomplete="off"/></td>
            </tr>
            <tr>
                    <td>Gender</td>
                    <td><input type="text" name="gender" required autocomplete="off"/></td>
            </tr>
            <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" required autocomplete="off"/></td>
            </tr>
            <tr>
                <td><button type="submit" name='inventoringModify'class="button">Modify</button></td>
            </tr>
        </table>
    </form>
    <?php
            
            if($user_ip === '192.168.43.94'){
            
                $db = mysqli_connect('192.168.43.94','EasyWalk3','easywalk3','method');
                    
                    $user_check_query = "SELECT *FROM method_type ORDER BY ID DESC LIMIT 1";
                    $result = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result);

                  /*  if($user){
                        include("server3.php");
                    }

                    else{
                        header("location:../index.php");
                    }
                  */if($user) 
                    { 
                        $method = $user['Name_Method'];
        
                        if($method=='asyncho'){
                            echo "
                            <form class='noStyle' action='modify.php' method='POST'>
                            <button type='submit' name='replicateModify' class='replicate'>Replicate in HQ</button>
                            </form>";
                            include("../inventoryAsyncho/server3tempo.php");
                        }

                        if($method=='syncho'){
                                include("server3.php");
                        }

                    }
                    else
                    {
                            header("location:../index.php");
                    }
            }

            if($user_ip === '192.168.43.21'){
            
                $db = mysqli_connect('192.168.43.21','EasyWalk2','easywalk2','method');
                    
                    $user_check_query = "SELECT *FROM method_type ORDER BY ID DESC LIMIT 1";
                    $result = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result);
                        
               /*     if($user) 
                    { 
                        include("server2.php");
                    }
                    else
                    {
                        header("location:../index.php");
                    }
                  */if($user) 
                    { 
                        $method = $user['Name_Method'];
        
                        if($method=='asyncho'){
                            echo "
                            <form class='noStyle' action='modify.php' method='POST'>
                            <button type='submit' name='replicateModify' class='replicate'>Replicate in HQ</button>
                            </form>";
                            include("../inventoryAsyncho/server2tempo.php");
                        }

                        if($method=='syncho'){
                                include("server2.php");
                        }

                    }
                    else
                    {
                            header("location:../index.php");
                    }
            }
    ?>
</body>