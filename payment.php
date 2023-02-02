<?php


 session_start();
 
 $servername = "localhost";
 $username = "root";
 $password =  NULL;
 $dbname = "tataairline";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 } 

$adult_no=$_SESSION["adult_no"];
$Children_no=$_SESSION["Children_no"];
$infants_no=$_SESSION["infants_no"];

$username=$_SESSION["username"];
$citynameform = $_POST["citynameform"];  
$citynameto = $_POST["citynameto"];  
$type = $_POST["type"];  
$oneway_Date = $_POST["oneway_Date"];  
$flight_timing = $_POST["flight_timing"];  
$RoundTrip_date = $_POST["RoundTrip_date"];  
$returnflight_timing = $_POST["returnflight_timing"];  

$Total_passengers = "ADT-".$adult_no." CHD-".$Children_no." INF-".$infants_no;

$Total_Amount = $_POST["Total_Amount"];  
$paymentdetails = "Username: \n".$_POST["Name"]."\n"."Card_No: ".$_POST["card"]; 
$paidon=date("Y-m-d H:i:s");;



    $book_ID= $_SESSION["book_ID"];
    $sql = "INSERT INTO passenger_ticket_details (Booking_ID,Cityname_From,Cityname_To,Type_Oneway_or_RoundTrip,Oneway_Date,Flight_Timing,RoundTrip_Date,ReturnFlight_Timing,FlightBooked_username,Total_passengers,Total_Amount,Paid_on,Payment_Details)
    VALUES('$book_ID','$citynameform','$citynameto','$type','$oneway_Date','$flight_timing','$RoundTrip_date','$returnflight_timing ','$username','$Total_passengers','$Total_Amount','$paidon','$paymentdetails')";

$oneway_finall="Flight Form : ".$citynameform." To : ".$citynameto." , ".$oneway_Date." ".$flight_timing;
$roundtrip_finall="Flight Form : ".$citynameto." To : ".$citynameform." , ".$RoundTrip_date." ".$returnflight_timing;

if (mysqli_multi_query($conn, $sql)) {
  
  if($RoundTrip_date=='-'){
    echo '<script>alert("                         THANK YOU FOR BOOKING TICKETS \n_______________________________________________________________\nYour Booking ID  : '.$book_ID.'\nYour Seat number  : Will Intimate at boarding Time.\nNote  :'.$oneway_finall.'\n_____________________________________________________________________\n                              HAPPY JOURNEY! FLY AGAIN!")
    window.open("index.html","_parent");      
    </script>';
  }
  else{
    echo '<script>alert("                         THANK YOU FOR BOOKING TICKETS \n_______________________________________________________________\nYour Booking ID  : '.$book_ID.'\nYour Seat number  : Will Intimate at boarding Time.\nNote  :\n'.$oneway_finall.'\n'.$roundtrip_finall.'\n_____________________________________________________________________\n                              HAPPY JOURNEY! FLY AGAIN!")
    window.open("index.html","_parent");  
    </script>';

  }
  
  } else {
   
  }
?>
