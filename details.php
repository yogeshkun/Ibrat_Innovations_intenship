<?php

if($_GET['id'] != ""){
    $membership_id = $_GET['id'];


function get_data($value,$typ){
  $arr = array();
  require 'conn.php';
  $query = $conn->query("SELECT * FROM master WHERE membership_id=$value");
  while($fetch = $query->fetch_array()){
      $id = $fetch['key_id'];
      if($typ == 'class' AND $fetch['type']  == 'class'){
        $query1 = $conn->query("SELECT * from classes where id  = $id");
        $fetc = $query1->fetch_array();
        array_push($arr,$fetc);}
      elseif($typ == 'plan' AND $fetch['type']  == 'plan'){
        $query1 = $conn->query("SELECT * from plans where id  =  $id");
        $fetc = $query1->fetch_array();
        array_push($arr,$fetc);}
    }
  return $arr;
}
function membershipname($value){
  require 'conn.php';
  $query = $conn->query("SELECT * FROM membership WHERE id=$value");
  while($fetch = $query->fetch_array()){
        
    return $fetch['membership_name'];

  }
}

?>
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
      background-size : all;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
    h6{
      padding-top: 10px;
      font-size: 20px;
    }
  </style>

  <!-- Navbar -->
  
  <!-- Navbar -->

  <!-- Background image -->
  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-100">

        <div class="text-white">
            <br><br>

           <h1>Ibrat_Innovations Intenship task </h1>
           
           <h3 ><?php $name = membershipname($membership_id);
           
            echo $name;
           
           ?> </h3>
      
              <nav style="padding-top: 10px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Details</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Plans</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Classes</button>
                </div>
              </nav>
          <div class="tab-content" id="nav-tabContent">



          <!--details-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="font-family: monospace;">

                  <div style="text-align:left";>  
                    <?php
                        require 'conn.php';
                        $query = $conn->query("SELECT * FROM membership WHERE id=$membership_id");
                        $count = 1;
                        while($fetch = $query->fetch_array()){
                      ?>
                      <h6 > Duration - <?php echo $fetch['membership_duration'] ?> </h6>
                  <h6> Price - <?php echo $fetch['membership_price']?></h6>
                  <h6> Classes - <?php echo $fetch['membership_classes'] ?></h6>
                  <h6> Discount Percentage - <?php echo $fetch['membership_discount_percentage'] ."%"  ?></h6>
                  <h6> Offer Name - <?php echo $fetch['membership_offer_name'] ?></h6>
                  <h6> Status - <?php echo $fetch['membership_status']  ?></h6>    
                     
                      <?php
                        }
                      ?>
                  
                  
                  <br><button type="button" class="btn btn-success">Edit</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                  <br> <br> <br>
                  </div>
              
            </div>



          <!--plans-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="margin : 50px;font-family: monospace;">


    <div style="text-align:left";>  
      <?php
        $plans = get_data($membership_id,'plan');
          foreach($plans as $fetch){
            $image = $fetch['plan_image']
      ?>
                      <h6> Plan Name - <?php echo $fetch['plan_name'] ?> </h6>
                      <h6> Plan image - </h6> <?php echo "<img src='$image' class='' width='400' 
                       height='400' >" ?>
                      <h6> Descripation - <?php echo $fetch['plan_description']?></h6>
                      <h6> Plan Total Workout - <?php echo $fetch['plan_total_workouts'] ?></h6>
                      <h6> Plan workouts description - <?php echo $fetch['plan_workouts_description']  ?></h6>
                      <h6> Plan avg duration - <?php echo $fetch['plan_avg_duration'] ?></h6>
                      <h6> Plan total weeks - <?php echo $fetch['plan_total_weeks'];  ?></h6>    

                      <h6> Status - <?php echo $fetch['status']  ?></h6>     
   
       
       
<?php
          }
?>
    
    
    <br><button type="button" class="btn btn-success">Edit</button>
    <button type="button" class="btn btn-danger">Delete</button>
</div>
      
  </div>


  <!--clases-->
   


<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" style="margin : 50px;font-family: monospace;">

    <div style="text-align:left";>  
      <?php
         $classes = get_data($membership_id,'class');
         $no = 0;
         foreach($classes as $fetch){
       
        $no = $no +1;
      ?>
    <h4 style="color: green;">Class No - <?php echo $no;?></h4>
    <h6> Class Trainer - <?php echo $fetch['class_trainer']?></h6>
    <h6> Class Price - <?php echo $fetch['class_price']?></h6>
    <h6> Class Name - <?php echo $fetch['class_name']?></h6>
    <h6> Class Description - <?php echo $fetch['class_short_description']?></h6>
    <h6> Class Date - <?php echo $fetch['class_date']?></h6>
    <h6> Class duration - <?php echo $fetch['class_duration']?></h6>
    <h6> Class Benefits - <?php echo $fetch['class_benefits']?></h6>    
       
    <h6> Status - <?php echo $fetch['class_status']  ?></h6>     
        
     <br><?php  ?>
       
        <?php
          }
        ?>
    
    
    <br><button type="button" class="btn btn-success">Edit</button>
    <button type="button" class="btn btn-danger">Delete</button>
</div>
      
  </div>

 


  </div>


          </div>  
      </div>
    </div>
  </div>


  <!-- Background image -->
</header>



    
</body>
</html>

<?php } ?>