<?php
session_start();

 $st1=$_SESSION['st'];
$vt=$_POST['vote'];
$vtid=$_SESSION['user'];

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
echo "$st1";
if($st1==='false'){
$stid = oci_parse($conn, "update candidate set votes=votes+1 where candidate_id=$vt"); 
oci_execute($stid);
$stid1 = oci_parse($conn, "update voter set status='true' where voter_id=$vtid"); 
oci_execute($stid1);
echo "done";
}
else{
	echo "already vote casted";
}
oci_close($conn);
echo "$st1 $vt";
?>