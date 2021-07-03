<?php

$db= "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )";
$connection = oci_connect('shouzeb', 'password', $db);



$image = file_get_contents($_FILES['fileToUpload']['tmp_name']);
$sql = "INSERT INTO candidate (candidate_id,District_id,name,Address,admin_id,date_of_birth,Gender,email,phone,cnic,status,password,votes,DESCRIPTION,party_id,election_id, picture) VALUES($random,$District_id_,'$Candidate_name_','$Address_','1','$dob_','$Gender_','$email_','$phone_','$cnic_','false','$pass','0','$de','$party_id_','1', empty_blob()) RETURNING picture INTO :picture";

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
?>
