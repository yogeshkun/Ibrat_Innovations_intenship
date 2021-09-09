<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ibrat_Innovations Intenship task</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
      background-size : cover;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
    h6{
      padding-top: 10px;
    }
  </style>

  <!-- Navbar -->
  
  <!-- Navbar -->

  <!-- Background image -->
  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-color: lightblue";
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-100">

        <div class="text-white">
            <br><br>

           <h1>Ibrat_Innovations Intenship task </h1>
           <h1>Name - Yogesh Madhukar Kunkawalekar </h1>
          <br>
          <h3> Select Membership</h3>

          <br>
     <table class="table"  style="background-color: green;">
      <thead>
        <tr>
          <th>Sr.No</th>
          <th>Duration</th>
          <th>Name</th>
          <th>&emsp;&emsp;&emsp;&emsp;Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'conn.php';
          $query = $conn->query("SELECT * FROM membership");
          $count = 1;
          while($fetch = $query->fetch_array()){
        ?>
        <tr>
          <td><?php echo $fetch['id']?></td>
          <td><?php echo $fetch['membership_duration']?></td>
          <td><?php echo $fetch['membership_name']?></td>
          <td colspan="2">
            <center>
              
               <a href="details.php?id=<?php echo $fetch['id']?>" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a>
            </center>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
          <p>
          
          <br><br><br><br><br><br>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>



    
</body>
</html>


