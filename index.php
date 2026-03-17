test index php files
<?php
$serverName = "tcp:azuresqlserversigsync.database.windows.net,1433";
$database = "free-sql-db-9705890";
$username = "adminuser";          // Server admin login
$password = "admin@123456"; // Reset password

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
var_dump($conn);
?>