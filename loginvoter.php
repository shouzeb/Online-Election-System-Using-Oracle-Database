<?php
$db= "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )";
$conn = oci_connect('shouzeb', 'password', $db);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$emailcheck;
$passwordcheck;

$stid = oci_parse($conn, $pass = $_POST['Password'];
            $vtid = $_POST['id'];
            $em = $_POST['email'];);

oci_execute($stid);
$count=1;

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
      if($count=1){
        echo"($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") ";
      
      
      }
     }}

      


?>
