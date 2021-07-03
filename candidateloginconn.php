<?php
        session_start();
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


        
        	
            $user = $_POST['cnic'];
            $pass = $_POST['password'];
            $vtid = $_POST['id'];
            $em = $_POST['email'];
            
            $s = oci_parse($conn, "select password,candidate_id,email from candidate where password='$pass' and candidate_id='$vtid' and email='$em'"); 
                  
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
                    $_SESSION['user']=$vtid;
                    $_SESSION['time_start_login'] = time();
                    header('Location: http://localhost:8080/candidatemainpage.php');
            }else
            {

                echo "wrong password or username";
            }
        
        
