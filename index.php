test index php files
<?php
$serverName = "tcp:azuresqlserversigsync.database.windows.net,1433";
$database = "free-sql-db-9705890";
$username = "<your_server_admin>";
$password = "<your_new_password>";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
var_dump($conn);
?>