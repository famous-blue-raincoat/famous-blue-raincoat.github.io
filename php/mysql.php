<?php $name = $_POST["name"]; ?>
<?php $pwd = $_POST["pwd"]; ?>

<?php

$conn = mysqli_connect("localhost", "root", "Wf690808", "myDB");

// if(!$conn){
//   echo"failed";
// }
// else{
//   echo"suceess";
// }

$sql_creat_db = "CREATE DATABASE IF NOT EXITS myDB";

$sql_create_table = "CREATE TABLE if not exists myUser (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(30) NOT NULL,
  pwd VARCHAR(50)
  )";

$sql_select = "SELECT * FROM myUser WHERE myUser.username='$name' AND myUser.pwd='$pwd'";

$sql_delete = "DROP TABLE myUser";

$sql_st = "SELECT * FROM myUser";

mysqli_query($conn, $sql_create_db);
mysqli_query($conn, $sql_create_table);

$result = mysqli_query($conn, $sql_select);

if (isset($_POST['name']) && isset($_POST['pwd'])) {
  if (mysqli_num_rows($result) > 0) {
    header('location:../index.html');
    // echo "YES";
  } else {
    //mysqli_query($conn, $sql_insert);
    header('location:../create.html');
    // echo "Insert";
  }
}
// $result1=mysqli_query($conn,$sql_select);
// if (mysqli_num_rows($result1) > 0) {
//   // 输出数据
//   while($row = mysqli_fetch_assoc($result1)) {
//       echo "id: " . $row["id"]. " - Name: " . $row["username"].  "- Password: ".$row["pwd"]. "<br>";
//   }
// } else {
//   echo "0 结果";
// }

// mysqli_query($conn,$sql_delete);
mysqli_close($conn);
?>