<?php
error_reporting();
include('config.php');
// fetching admin email where mail will send
$sql ="SELECT emailId from tblemail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0):
foreach($results as $result):
$adminemail=$result->emailId;
endforeach;
endif;
if(isset($_POST['submit']))
{
// getting Post values	
$name=$_POST['name'];
$phoneno=$_POST['phonenumber'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;
// Insert quaery
$sql="INSERT INTO  tblcontactdata(FullName,PhoneNumber,EmailId,Subject,Message,UserIp,Is_Read) VALUES(:fname,:phone,:email,:subject,:message,:uip,:isread)";
$query = $dbh->prepare($sql);
// Bind parameters
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phoneno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':uip',$uip,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
//mail function for sending mail
$to=$email.",".$adminemail; 
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Covid Contact Form Demo<info@covidorg.com>'."\r\n";
$ms.="<html></body><div>
<div><b>Name:</b> $name,</div>
<div><b>Phone Number:</b> $phoneno,</div>
<div><b>Email Id:</b> $email,</div>";
$ms.="<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div></body></html>";
mail($to,$subject,$ms,$headers);




echo "<script>alert('Your info submitted successfully.');</script>";
  echo "<script>window.location.href='index.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href='index.php'</script>";
}


}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Covid Rakshak</title>
<!DOCTYPE html>
<html lang="en">
</head>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet" >

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>



<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>


<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,600,700' rel='stylesheet' type='text/css'>
<!--web-fonts-->
		<!---header--->

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Covid Rakshak</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About Coronavirus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Covid-19 Symptoms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Prevention</a>
          </li>
  

        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>COVID RAKSHAK</h1>
      <p class="lead">COVID19</p>
    </div>
  </header>


  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
<br>
 <img src="images/b.jpg" width="700" height="200">
          <p class="lead" align="left">

Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people infected with the COVID-19, virus will experience mild to moderate, respiratory illness & recover without requiring special treatment. Older people and those with underlying medical problem like cardiovascular disease.</p>
<br>
     
<img src="images/c.jpg"  width="700" height="200">
          <p class="lead">The COVID-19 virus spread primarily through droplet of saliva or discharge from the nose when an infected person coughs or sneezes so it’s important that you also practice respiratory etiquette.</p>
   
        </div>
      </div>
    </div>
  </section><br />

  <section id="services" >
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h5>Covid-19 Symptoms</h5>
          <hr />
<img src="images/h.png"  width="700" height="200">

<p><strong>Hight Fever 2-14 days!</strong><br />
Reported illnesses have ranged from mild symptoms to severe illness and death</p>
             <hr />
<p><strong>Dry Cough 2-14 days!</strong><br />
Reported illnesses have ranged from mild symptoms to severe illness and death</p>
          <hr />
<p><strong>Shortness of breath!</strong><br />
Reported illnesses have ranged from mild symptoms to severe illness and death</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto"><br />
          <h6>Prevention</h6>
<br />
  <ul>
<img src="images/i.jpg"  width="700" height="400">
            <li>Wash your Hands often</li>
            <li>Wear A Face mask</li>
            <li>Avoid contact with sick people</li>
            <li>Always cover your cough or sneeze</li>
          </ul>
        </div>
      </div>
    </div>
  </section>


		<div class="header">
			<h1>Covid Rakshak</h1>

		</div>
		<!---header--->
		<!---main--->
			<div class="main">
				<div class="main-section">
				<div class="login-form">
					<h2>drop your requirements here</h2>
					<p>we'll get back to you soon!</p>
						<span></span>
					<form name="CovidRakshak" method="post">

<h4>your name</h4>
<input type="text" name="name" class="user" placeholder="Johne"  autocomplete="off" required>

<h4>your phone number</h4>
<input type="text" name="phonenumber" class="phone" placeholder="+91 9995558880" maxlength="10" required autocomplete="off">

<h4>your email address</h4>
<input type="email" name="emailaddres" class="email" placeholder="Example@mail.com" required autocomplete="off">

<h4>your subject</h4>
<input type="text" name="subject" class="email" placeholder="Subject" autocomplete="off">

<h4>your message</h4>
<textarea class="mess" name="message" placeholder="Message" required></textarea>
<input type="submit" value="send your message" name="submit">
</form>
				
				</div>
				</div>
			</div>

		<!---main--->

</body>
</html>