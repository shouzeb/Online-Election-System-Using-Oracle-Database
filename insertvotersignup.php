<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);

$connection = oci_connect('shouzeb', 'password', "
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )");
$random=rand(1000,10000000);
$cnic_=$_POST['CNIC'];
$District_id_=$_POST['District_id'];
$Voter_name_=$_POST['Voter_name'];
$Address_=$_POST['Address'];
$email_=$_POST['email'];
$Gender_=$_POST['Gender'];
$phone_=$_POST['Contact'];
$dob_=$_POST['DOB'];
$pass=rand(1000,10000000);


$image = file_get_contents($_FILES['fileToUpload']['tmp_name']);
$sql = "INSERT INTO voter (voter_id,District_id,name,Address,admin_id,date_of_birth,Gender,email,phone,cnic,status,password, picture) VALUES ($random,$District_id_,'$Voter_name_','$Address_','1','$dob_','$Gender_','$email_','$phone_','$cnic_','false','$pass', empty_blob()) RETURNING picture INTO :picture";

$result = oci_parse($connection, $sql);
$blob = oci_new_descriptor($connection, OCI_D_LOB);
oci_bind_by_name($result, ":picture", $blob, -1, OCI_B_BLOB);
oci_execute($result, OCI_DEFAULT) or die ("Unable to execute query");

if(!$blob->save($image)) {
    oci_rollback($connection);
}
else {
    oci_commit($connection);
}

oci_free_statement($result);
$blob->free();

echo "done";

$msg= "Hey $Voter_name_,
Thank you for signing up for Online Election System. 

Please note that: 

Use the following information to login to your account:

Your account password is $pass
Your ID is $random

If you have any questions, you can  reply to contact us. 


Online Election System Support ";

mail($email_, "Online Election System Registration", "$msg");

echo "done";
?>