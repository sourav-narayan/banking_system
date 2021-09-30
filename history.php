<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "banking";
    $con = mysqli_connect($server, $username,$password, $db);
    if(!$con){
        die("Connection failed:". mysqli_connect_error());
    }
    $sql= "SELECT * FROM `history`" ;
    $result = $con->query($sql);
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
         <title>History</title>
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
        <div class="backgroundt">
            <h1 style="font-family: 'Times New Roman', Times, serif; color: black; padding: 10px; font-weight: bold;" ><center>TRANSACTION HISTORY</center></h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['sender']; ?></td>
                    <td><?php echo $row['receiver']; ?></td>
                    <td><?php echo $row['amount']; ?></td> 
                </tr>  
            <?php
            }
            $con->close();
            ?>
                </tbody>
            </table>
        </div>
    </body>
</html>