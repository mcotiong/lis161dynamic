<?php include 'database.php'; 


  //secure homepage
  if(!isset($_SESSION['username'])) {
    $_SESSION['warning'] = "You need to log-in to access this page";
    //redirect user
    header("location: login.php");
  }


  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    //Prepare query
    $query = "SELECT * FROM users WHERE id=$id";
    //Perform query
    $edit_record = mysqli_query($con,$query);
    //Convert record to array
    $edit_array = mysqli_fetch_array($edit_record);


    //Assign variables
    $username = $edit_array['username'];
    $email = $edit_array['email'];
    $discord = $edit_array['discord'];

    //set edit state to true
    $edit_state = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Members</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>


<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right">
    </a>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
    <a href="about.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
    <a href="members.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> MEMBERS</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small "><i class="fa fa-shield"></i> LOG-IN</a>
  </div>

<div class="container">

  <!-- Alert for CRUD Operations-->
  <?php if (isset($_SESSION['message'])) { ?>
  <div class="alert alert-success">
    <?php echo $_SESSION['message']; 
          unset($_SESSION['message']);
    ?>
  </div>
  <?php } ?>

  <!-- Alert for User Registration-->
  <?php if (isset($_SESSION['success'])) { ?>
  <div class="alert alert-success">
    <?php echo $_SESSION['success']; 
          unset($_SESSION['success']);
    ?>
  </div>
  <?php } ?>

  <!-- Dashboard -->
  <div class="well">
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p><a href="server.php?logout=1" class="btn btn-danger">Logout</a></p>

  </div>


<div class="well">
<div class="w3-center">
      <center><a href="https://discord.gg/ZJXMjhr" class="w3-bar-item w3-button"><img src="discordlogo.png" style="width:70%"></a>
      <p>Join the Discord server by clicking the icon above.</p></center>
    </div>

<!--Search function-->
  <!DOCTYPE  HTML>
<html> 
<head> 
  <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
  <title>Search  Contacts</title> 
    <?php
    mysqli_connect("localhost","root","","lis161_finalproject") or die("could not connect");
    $output = '';
        //collect 

        if(isset($_POST['search'])){
          $searchq = $_POST['search'];
          $query = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '%$searchq%' OR email LIKE '%$searchq%' OR discord LIKE '%$searchq%'") or die("could not search!");
          $count = mysqli_num_rows($query);
          if($count == 0) {
              $output = 'There was no search results';
            }else{
              while($row = mysqli_fetch_array($query)){
                $username = $row['username'];
                $email = $row['email'];
                $discord = $row['discord'];
                $id = $row['id'];

                $output .= '<div> '.$username.' '.$email.' '.$discord.' <div>';
              }


            }
          }
        
        ?>

    
  </head>


<body>
<div class="well">
<form  action="members.php" method="post">
  <input  type="text" name="search" placeholder="search for members.."> 
  <input  type="submit" name="submit" value="Search"/> 
</form> 

<?php print("$output");?>
</div>
</body> 
</html> 




  <!-- Form -->
  <?php if ($edit_state == true) { ?>

  <div class="well">
    <h2 class="text-center h_title"><p class="p_title">Edit Member Information</p></h2>
      <form method="POST" action="database.php">
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="first_name">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Mark" value="<?php echo $username; ?>" required>
          </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="student_no">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="mcotiong@up.edu.ph" value="<?php echo $email; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="discord">Discord Username</label>
            <input type="text" class="form-control" name="discord" placeholder="Cancer#8105" value="<?php echo $discord; ?>" required>
          </div>
        </div>
       
          <button type="submit" class="btn btn-primary" name="update">Update</button>
          <a class="btn btn-warning" href="members.php">Cancel</a>

          <?php } ?>
       
  <!-- End of Form -->


  <!-- Display of Data in a Table Format-->
  <div class="well"> 
    <p><h2>View Member Information</h2></p>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Discord</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0;
            while ($row = mysqli_fetch_array($member_records)) { ?>
        <tr>
          <td><?php echo ++$i; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['discord']; ?></td>
         <td><a class="btn btn-warning" href="members.php?edit=<?php echo $row['id']; ?>">Edit</a>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</html>  



    
</div>
</body>
</html>