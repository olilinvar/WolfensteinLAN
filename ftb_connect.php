<?php
$ftp_server = "10.0.0.2"; 
$ftp_username = "ftpuser";  
$ftp_password = "password"; 

$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

if (@ftp_login($ftp_conn, $ftp_username, $ftp_password)) {
    echo "Connected and logged in to FTP server.\n";
    // For example, to list files in the current directory:
    $files = ftp_nlist($ftp_conn, ".");
    print_r($files);
    
    // To upload a file:
    // ftp_put($ftp_conn, "server_file.txt", "local_file.txt", FTP_BINARY);

    // To download a file:
    // ftp_get($ftp_conn, "local_file.txt", "server_file.txt", FTP_BINARY);
} else {
    echo "Could not log in to FTP server.";
}

// Close the FTP connection
ftp_close($ftp_conn);
?>
