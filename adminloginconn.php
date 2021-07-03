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
            $user = $_POST['id'];
            $pass = $_POST['Password'];
            $vtid = $_POST['id'];
            $em = $_POST["email"];
            
            $s = oci_parse($conn, "select password,admin_id,email from admin where password=$pass and admin_id=$vtid"); 
                  
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            
            if($row){
                    
                   $_SESSION['user']=$user;
                    $_SESSION['time_start_login'] = time();
                    echo "welcome";
            }else
            {

                echo "wrong password or username";
            }
        
        
