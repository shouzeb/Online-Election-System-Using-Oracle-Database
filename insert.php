<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);

$conn = oci_connect('shouzeb', 'password', "
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )");
$random=rand(1000,10000000);
$email_=$_POST['email'];
$phone_=$_POST['Contact'];
$dob_=$_POST['DOB'];




$stid = oci_parse($conn, "INSERT INTO voter (voter_id,District_id,name,Address,admin_id,date_of_birth,Gender,email,phone,cnic,status)
VALUES ($random,$District_id_,'$Voter_name_','$Address_','1','$dob_','$Gender_','$email_','$phone_','$cnic_','false')");

oci_execute($stid, OCI_NO_AUTO_COMMIT);  // data not committed
oci_commit($conn);


?>