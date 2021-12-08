<!DOCTYPE html>
<html>
<head>
  <title>Registration | QR Code Generator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="description" content="QR Code Generator Developed By Developer Ramadhani Massawe .It's Free Online QR Code Generator to make your own QR Codes.No sign-up required. Create unlimited non-expiring free QR codes for a website URL, YouTube video etc.">

<meta name="keywords" content="qr code,QR CODE,QR,CODE,HTML, CSS, XML, JavaScript,php,mysql,bootstrap">

<meta name="author" content="Developer Ramadhani Massawe ">

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit]{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: center;
    text-decoration: none;

}

input[type=submit]:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
     /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
#qrSucc
{
  width: 1200px;
  height: auto;
  margin:  8px 8px 20px 8px;
  text-align: center;
  overflow: auto;
  position: relative;
}
#result {
    margin-bottom: 20px !important;
}
#qrSucc a
{
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    text-align: center;
    text-decoration: none;
}
</style>
</head>
<body>
    <?php 
  include "meRaviQr/qrlib.php";
  include "config.php";
  if(isset($_POST['create']))
  {
    $firstname =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $qrImgName = "$firstname".rand();
    if($firstname=="" && $lastname=="" && $email=="" && $pnumber=="")
    {
      echo "<script>alert('Please Fill all fields');</script>";
    }
    elseif($firstname=="")
    {
      echo "<script>alert('Please Enter Your FirstName');</script>";
    }
    elseif($lastname=="")
    {
      echo "<script>alert('Please Enter Your LastName');</script>";
    }
    elseif($email=="")
    {
      echo "<script>alert('Please Enter Your Email');</script>";
    }
    elseif($pnumber=="")
    {
      echo "<script>alert('Please Enter Your Phone Number');</script>";
    }
    else
    {
      $fullname = $firstname.'+'.$lastname;
      // $dev = " ...Develop By Imperial Inovations";
      // $final = $firstname.$dev;
      $qrimage = $qrImgName.".png";
      $qrs = QRcode::png($qrimage,"userQr/$qrImgName.png","H","3","3");
      $workDir = $_SERVER['HTTP_HOST'];
      $qrlink = $workDir."/qrcode".$qrImgName.".png";
      $insQr = $meravi->insertQr($firstname,$lastname,$fullname,$email,$pnumber,$qrimage,$qrlink);
      if($insQr==true)
      {
        echo "<script>alert('Thank You $firstname $lastname. Success Create Your QR Code'); window.location='index.php?success=$qrimage&fname=$fullname';</script>";
      }
      else
      {
        echo "<script>alert('cant create QR Code');</script>";
      }
    }
 }
  ?>
  <?php 
  if(isset($_GET['success']))
  {
  ?>
  <div id="qrSucc" class="convert">
      <div id="result" class="modal-content animate container" style="background: white;">
            <?php 
            ?>
            <img src="assets/tpsf.png" alt="centered image" height="300" width="800">
            <p style="font-size: 18px;">  The Board of Directors & Secretariat<br/>
            of Tanzania Private Sectors Foundation (TPSF)<br/>
               request the pleasure of the company of</p>
                  <p style="font-size: 18px;, font-family: Gilroy;"><u><b>Mr/Mrs. <?php echo $_GET['fname']; ?></b></u></p>
            <p style="font-size: 18px;">to the Tanzania High Level Business & Investment Forum which will be<br/>
            held at University of Dar es salaam (UDSM) New Library Auditorium and<br/>
               to be graced by <b>Hon. Kassim Majaliwa Majaliwa (MP),<br/>
                Prime Minister of The United Republic of Tanzania</b><br/>
                 On <b>Saturday, 11th December 2021</b><br/>
                 from <b>0800hrs - 1400hrs</b></p>
            <h2 style="color: #197890;">SPONSORS</h2>
            <center>
                <img src="assets/clouds.png" alt="centered image" height="80" width="200">
                <img src="assets/ifc.png" alt="centered image" height="80" width="200">
                <img src="assets/trademark.png" alt="centered image" height="70" width="150">
                <img src="assets/agricom.png" alt="centered image" height="80" width="150"><br/>
                <img src="assets/effco.png" alt="centered image" height="50" width="200">
                <img src="assets/kcb.png" alt="centered image" height="60" width="200">
                <img src="assets/cocacola.png" alt="centered image" height="60" width="450"><br/>
                <img src="assets/asas.png" alt="centered image" height="70" width="100">
                <img src="assets/outclass.png" alt="centered image" height="100" width="200">
                <img src="assets/grumeti.png" alt="centered image" height="70" width="200">
                <img src="assets/kabanga.png" alt="centered image" height="50" width="200">
                <img src="assets/sfgroup.png" alt="centered image" height="100" width="150">
            </center> 
            <br>    
            <img src="userQr/<?php echo $_GET['success']; ?>" alt="">
            <?php 
              $workDir = $_SERVER['HTTP_HOST'];
              $qrlink = $workDir."/qrcode/userQr/".$_GET['success'];
            ?>
             
            <!-- <input type="text" value="<?php echo $qrlink; ?>" readonly>
            <br><br>
            <a href="download.php?download=<?php echo $_GET['success']; ?>">Download Now</a>
            <br>
            <br><br>
            <a href="index.php">Go Back To Generate Again</a> -->
        </div>
        <div id="output" hidden></div>
        <a class="a" href="">Download Now</a>
   </div>
  <?php
}
else
{
  ?>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" enctype="multipart/form-data">
    <div class="container">
      <h2 align="center">You Are Welcome To Tanzania High Level Business & Investment Forum</h2>
      <label for="fname"><b>First Name</b></label>
      <input type="text" name="firstname" value="<?php if(isset($_POST['create'])){ echo $_POST['firstname']; } ?>" required/>
      <label for="lname"><b>Last Name</b></label>
      <input type="text" name="lastname" value="<?php if(isset($_POST['create'])){ echo $_POST['lastname']; } ?>" required/>
      <label for="email"><b>Email</b></label>
      <input type="text" name="email" value="<?php if(isset($_POST['create'])){ echo $_POST['email']; } ?>" required/>
      <label for="pnumber"><b>Phone Number</b></label>
      <input type="text" name="pnumber" value="<?php if(isset($_POST['create'])){ echo $_POST['pnumber']; } ?>" required/>

      <!-- <label for="psw"><b> Website URL or Text For QR Code</b></label>
      <input type="text" name="qrContent" value="<?php if(isset($_POST['create'])){ echo $_POST['qrContent']; } ?>"> -->
        
      <input type="submit" value="Submit" name="create">
    
    </div>
  </form>
    <?php 
}
   ?>
</div>
<script src="./html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.js"></script>
<script>
    const elm = document.querySelector("#result");
    html2canvas(elm).then(function (canvas) {
        document.querySelector("#output").append(canvas);
        let cvs = document.querySelector("canvas");
        let a = document.querySelector(".a")
        a.href = cvs.toDataURL();
        a.download = "invation.png";
    });
</script>
</body>
</html>
