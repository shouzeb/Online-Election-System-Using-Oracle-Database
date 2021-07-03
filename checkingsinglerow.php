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

$sql = 'SELECT password, email FROM voter WHERE voter_id=1807933';
$stid = oci_parse($conn, $sql);
oci_execute($stid);

while (oci_fetch($stid)) {
    echo oci_result($stid, 'PASSWORD') . " is ";
    echo oci_result($stid, 'EMAIL') . "<br>\n";
}

// Displays:
//   1000 is Roma
//   1100 is Venice

oci_free_statement($stid);
oci_close($conn);

?>