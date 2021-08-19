<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="css/style.css"/>
    <style>
   .user{
    border: 1px solid #ddd;
    font-size: 25px;
    }
  input {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
    input:focus {
      background-color: #ddd;
      outline: none;
}
    button{
      border-radius: 5px;
      border:0;
      background:#235;
      color:#eee;
      line-height:37px;
      height:40px;
      cursor:pointer;
      font-size: 20px;
		}
	  button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}
      table{
        border-collapse: collapse;
        width: 100%;
        color: #d96459;
        font-family:"Rockwell" ;
        font-size: 23px;
        text-align: left;
      }
      th{
        background-color: #d96459;
        color: white;
      }
      tr:nth-child(even){
        background-color: #f2f2f2;
      }
      </style>
  </head>
  <body>
    <h2 align="center">Register New User </h2>
    <form align="center" class="contact" div="user" action="" method="POST">
      Name:<input type="text" name="name"/><br>
      Email:<input type="email" name="email"/><br>
      Mobile:<input type="mobile" name="mobile"/><br>
      Amount:<input type="number" name="number"/><br>
       <center><button name="submit" type="submit" id="myBtn">Register</button></center>
    </form>
    <br>
<?php
$dbhost="localhost";
$dbname="sparks";
$dbusername="root";
$dbpass="";
$mysqli=mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $balance=$_POST['number'];

  $result=mysqli_query($mysqli,"INSERT into customer values('','$name','$email','$mobile','$balance')");
    if($result){
      echo "success";
    }
    else{
      echo "Failed";
    }
}
 ?>

<table>
  <h2 align="center">List of Customers</h2>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email-ID</th>
    <th>Mobile no</th>
    <th>Balance</th>
  </tr>
<?php
$conn=mysqli_connect("localhost","root","","sparks");
if($conn-> connect_error){
  die("Connection failed:". $conn-> connect_error);
}
$sql="SELECT * from customer";
$res=$conn-> query($sql);

if($res-> num_rows > 0){
  while($row= $res-> fetch_assoc()){
    echo "<tr><td>".$row['id']."</td><td>". $row["name"].
    "</td><td>". $row["email"]."</td><td>". $row["mobile"].
    "</td><td>". $row["balance"]. "</td></tr>";
  }
  echo "</table>";
}
else{
  echo "No results";
}

$conn-> close()
 ?>
 <br><br>
 <form action="index.php" method="post"/>
   <center><button name="submit" type="submit">Home</button></center>
 </form>
  </body>
</html>
