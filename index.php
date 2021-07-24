<?php include "submit.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>To-Do list</title>
    <style>
        #start{
            background-color: blanchedalmond;
            font-family: sans;
        }
        p{
            color: red;
        }
        th, td{
            text-align: center;
            font-family: cursive;
        }
    </style>
</head>
<body>
    <div id="start" class="container" style="margin-top: 3cm">
        <center><h3><b> WELCOME TO THE SIMPLE TO-DO APPLICATION </b></h3></center>
        <br>
        <br>
        <form name = "task_form" action = "index.php" method = "POST">
            <div class="form-group col-md-12">
                <?php if(isset($error) && !isset($sno)) {?>
                    <p> <?php echo $error;} ?> </p>
                <input type="text" name = "task" placeholder="enter the task that is to be done" size = '120'>
                <button type="submit" name = "sbt" class= " btn btn-success">Add</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
        <table id="tbl" class="table display table-dark table-striped">
            <thead>
              <tr>
                  <th>SNO</th>
                  <th>TASK</th>
                  <th>DATE</th>
                  <th>TIME</th>
                  <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                while($task_database = mysqli_fetch_array($sql_link_get)){ $date = explode(" ", $task_database['DATE_ENTERED']); ?>
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $task_database['TASK']; ?> </td>
                        <td> <?php echo $date[0]; ?> </td>
                        <td> <?php echo $date[1]; ?> </td>
                        <td> <a href = "index.php?delete= <?php echo $task_database['SNO'] ?>"> Delete</td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        <br><br>
    </div>
</body>
</html>