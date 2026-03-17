test index php files
<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:azuresqlserversigsync.database.windows.net,1433; Database = free-sql-db-9705890", "CloudSAcb231d5e", "admin@123456");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    exit(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "CloudSAcb231d5e", "pwd" => "admin@123456", "Database" => "free-sql-db-9705890", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:azuresqlserversigsync.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>