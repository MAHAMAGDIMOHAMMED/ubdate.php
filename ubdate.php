 <?php

include('./dbconnection.php');

$query= $conn->query("SELECT * FROM students")->fetchALL();

$query ="Update students
SET Email= 'Hamza_Wael@yahoo.com'
WHERE students_id=2";


$stmt = $conn->prepare($query);
$stmt->execute();
echo "<br>" . $stmt->rowcount() . "<br>  row ubdated successfuly";
?>



<?php
include('./dbconnection.php');


if(isset($_POST['Ubdate'])){
    
 $id=$_GET['id'];

$name = $_POST['name'];
$info = $_POST['info'];
$email = $_POST['email'];
$pw = $_POST['pw'];

echo "<br>";
echo $name;

if (!empty($name)&& !empty ($info)&& !empty ($email) && !empty($pw))

    $sql = "ubdate students_id

SET students_id='$name' ,info='$info' ,email='$email',

where students_id='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo "<br>";
echo " Data updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task 12 Mahi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>school</h2>
  <p>student info:</p>  



  <table class="table">
    <thead>
      <th>Name </th>
      <th> info </th>
      <th>Email </th>
      <th>password </th>
      <th> UPDATE </th>
      <th> DELETE </th>
      
    </thead>
    <tbody>
        <?php
        foreach ($stmt as $k){ 

       
      echo " <tr>
        <td>{$k['studens_id']}</td>
        <td>{$k['Name']}</td>
        <td>{$k['info']}</td>
        <td>{$k['Email']}</td>
        <td>{$k['pw']}</td>
        <td>
        <a href='./task12.php?id={$k['students_id']}'>Edit </a>
        </td>
        <td>
                <a href='./delete.php?id={$k['students_id']}'>DELETE </a>

                </td>
      
      </tr>";
      }
        ?>
       
       <div class="btn_box">

       <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action= "<?php '_PHP_SELF'?>" method="post">
              <div>
                <input type="text" class="form-control" placeholder="Name" name="name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Info" name="info" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" />
              </div>
              <div>
                <input type="pw" class="form-control" placeholder="password" name="pw" />
              </div>

<button type="submit" name="ubdate">
  UPDATE
</button>

<button type="submit" name="delete">
  Delete
</button>

       
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>


