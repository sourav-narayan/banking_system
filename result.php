<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "banking";
    $con = new mysqli($server, $username,$password, $db);
    if($con->connect_error){
        die("Connection failed:". $con->connect_error);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'> 
        
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Result</title>
    </head>
    </head>
    <body>
        <nav id ='header-nav' class = "navbar navbar-default navbar-fixed-top">
            
            <div class="container">
                <div class="navbar-header">
                <div class="navbar-brand">
                    <a href = "index.php"><img src="logo.jpg" alt = "logo" height= "50px " width="50px"></a>
                    
                </div>
                <button id="navbarToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div id="collapsable-nav" class="collapse navbar-collapse">
                  
                    <ul class="nav navbar-nav navbar-right" id="links">
                        <li><a href = "details.php">CUSTOMER DETAILS</a></li>
                        <li><a href = "transact.php">TRANSACTION</a></li>
                        <li><a href = "history.php">HISTORY</a></li>
                    </ul>
                </div>
                
            </div>
            </div>
        </nav>
        <?php
            $sender = $_POST['sender'];
            $receiver = $_POST['receiver'];
            $amount = $_POST['amount'];
    
        echo "<div class='backgroundt'>";
        echo "<h1 style='font-family: 'Times New Roman', Times, serif; color: black; padding: 10px; font-weight: bold;' ><center>SUCCESSFUL TRANSACTION</center></h1>
            <br><br>
            <table>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>";
                
                    $sql = "SELECT * FROM `details` WHERE name = '$sender'";
                    if($result = $con->query($sql)){
                        $row1 = $result->fetch_array();
                        echo "<tr>
                                <td> Sender</td>
                                <td>".$row1['name']."</td>
                                <td>".$row1['email']."</td>
                                </tr>";
                        $SenderCurrentBalance = $row1['currentbalance'];
                        
                    }
                    
                    $sql2 = "SELECT * FROM `details` where name = '$receiver'";
                    if($result = $con->query($sql2)){
                        $row2 = $result->fetch_array();
                        echo "<tr>
                                <td> Receiver </td>
                                <td>" .$row2['name']."</td>
                                <td>" .$row2['email']."</td>
                            </tr>";
                            $ReceiverCurrentBalance = $row2['currentbalance'];
                    
                        }
            echo "</table>";
           
            
            $ReceiverCurrentBalance += $amount;
            $SenderCurrentBalance -= $amount;
        
            echo "<br><br>";
            echo "<table>
            <tr>
                <th></th>
                <th>Old Balance</th>
                <th>New Balance</th>
            </tr>
            <tr>
                    <th>Sender</th>
                    <td>".$row1['currentbalance']."</td>
                    <td>".$SenderCurrentBalance."</td>
            </tr>
            <tr>
                    <th>Receiver</th>
                    <td>".$row2['currentbalance']."</td>
                    <td>".$ReceiverCurrentBalance."</td>
            </tr>";
            echo "</table>";
            
            $updateSender = "UPDATE `details` SET `currentbalance` = '$SenderCurrentBalance' WHERE `details`.`name` = '$sender' ";
            
        
            $updateReceiver = "UPDATE `details` SET `currentbalance` = '$ReceiverCurrentBalance' WHERE `details`.`name` = '$receiver' ";
            

            if($con->query($updateSender)==true){
                ?>         
                <script>console.log("PAYER DETAILS UPDATED!!")</script>
                <?php
           }
           else{
                ?>        
                <script>alert("PAYER DETAILS NOT UPDATED!!")</script>
                <?php
           }

           if($con->query($updateReceiver)==true){
            ?>         
            <script>console.log("PAYEE DETAILS UPDATED! ")</script>
            <?php
    }
    else{
            ?>        
            <script>alert("PAYEE DETAILS NOT UPDATED! ERROR OCCURED!")</script>
            <?php
    }


            $HistoryUpdated = "INSERT INTO `history` (`sender` , `receiver` , `amount`) VALUES ('$row1[name]', '$row2[name]', '$amount')";
            
           
            
            if($con->query($HistoryUpdated)==true){
                    ?>         
                    <script>console.log("Record of this transaction saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }
            
            
            
            
            echo "</div>";
            $con->close();
        ?>
        
    </body>
</html>