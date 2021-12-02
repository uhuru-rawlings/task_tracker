<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <script src="index.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Project Idears and todo lists</title>
</head>
<body>
    <div class="container">
       <nav class="navbar">
           <h3>Project Idears & To do list</h3>
       </nav>
    </div>
    <div class="container">
        <div class="form">
            <label for="todoitem">Item/Project Idear
                <br>
               <form method="POST" action="submit.php" class="inputs border-secondary" >
                <input type="text" name="todoitem" id="todoitem" class="form-control">
                <button id="Submit" class="btn btn-secondary" name="submit" onclick="return validates()" id="submits">Submit</button>
               </form>
            </label>

        </div>
      <div class="flexitem">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ItemId</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>markDone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $connection = mysqli_connect("127.0.0.1","root","","todoitems");
                 if($connection){
                     $sql = "SELECT * FROM addeditems";
                     $query = mysqli_query($connection, $sql);
                     if($rows = mysqli_num_rows($query) > 0){
                         while($results = mysqli_fetch_array($query)){
                             $ids = $results['id'];
                             $itemid = $results['itemid'];
                             $items = $results['todoitem'];
                             $status = $results['statuses'];
                             $time =$results['addeddat'];
                             if($status == "Pending"){
                                 echo("<tr>");
                                 echo("<td>$ids</td>");
                                 echo("<td>$itemid</td>");
                                 echo("<td>$items</td>");
                                 echo("<td class='text-light bg-danger' >$status</td>");
                                 echo("<td class='text-danger' id='$itemid' onclick='getids(this.id)'><i class='fas fa-times-circle'></i></td>");
                                 echo("</tr>");
                             }else{
                                echo("<tr>");
                                echo("<td>$ids</td>");
                                echo("<td>$itemid</td>");
                                echo("<td>$items</td>");
                                echo("<td class='text-light bg-success' >$status</td>");
                                echo("<td class='text-success' id='$itemid' onclick='getids(this.id)'><i class='fas fa-check-circle'></i></td>");
                                echo("</tr>");
                             }
                         }
                     }else{
                         echo("<td>No Items added</td>");
                     }
                 }else{
                     echo("cant connect to the server");
                 }
                 
                ?>
            </tbody>
        </table>
        <script>
            function getids(cliked_id){
                var consent = confirm("Mark as done ?");
                if(consent == true){
                    console.log(document.cookie = "itemid ="+cliked_id);
                    location.reload();
                    return false;
                }else{

                }
                

            // console.log(cliked_id);
            }
        </script>
        <?php
           if(isset($_COOKIE['itemid'])){
            $connection = mysqli_connect("127.0.0.1","root","","todoitems");
            $done = "Done";
            $clikedid = $_COOKIE['itemid'];
            $sql = "SELECT * FROM addeditems WHERE itemid='".$clikedid."'";
            $query = mysqli_query($connection, $sql);
            if($rows = mysqli_num_rows($query) > 0){
                while($results = mysqli_fetch_array($query)){
                    $itemstatustext = $results['statuses'];
                    // echo("<script>alert('data goten')</script>");
                    if($itemstatustext == "Pending"){
                        $done = "Done";
                        $sql = "UPDATE addeditems SET statuses='{$done}' WHERE itemid='{$clikedid}'";
                        $query = mysqli_query($connection, $sql);
                        if($query){
                            // setcookie("itemid","",time() - 3600);
                            header("Refresh:1");
                        }else{
                            echo("<script>alert('cannot update table')</script>");
                        }
                    }else{
                        $done = "Pending";
                        $sql = "UPDATE addeditems SET statuses='{$done}' WHERE itemid='{$clikedid}'";
                            $query = mysqli_query($connection, $sql);
                            if($query){
                                // setcookie("itemid","",time() - 3600);
                                header("Refresh:1");
                            }else{
                                echo("<script>alert('cannot update table')</script>");
                            }
                    }
                }
            }else{
                echo("<script>alert('Cant update')</script>");
            }
            
           }
        ?>
        <?php
          if(isset($_COOKIE['itemid'])){
              setcookie("itemid",$_COOKIE['itemid'], time()-60);
          }
        ?>
      </div>
    </div>
</body>
</html>