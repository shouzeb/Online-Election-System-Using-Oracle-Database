
<?php
$conn = oci_connect('shouzeb', 'password', "
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = oci_parse($conn, 'SELECT * FROM voter where id=$user_check');

$row = oci_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){ // Closing Connection
// Redirecting To Home Page
}
?>