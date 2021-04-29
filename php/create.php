<?php $name = $_POST["name"]; ?>
<?php $pwd = $_POST["pwd"]; ?>

<?php

$conn = mysqli_connect("localhost", "root", "Wf690808", "myDB");

$sql_insert = "INSERT INTO myUser(username, pwd)
  VALUES('$name','$pwd')";

mysqli_query($conn, $sql_insert);

if (isset($_POST['name']) && isset($_POST['pwd'])) {
  header('location:../index.html');
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