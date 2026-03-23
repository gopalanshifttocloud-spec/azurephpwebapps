test index php files

<?php

$host = "azuremysqldatabase-1.mysql.database.azure.com";
$dbname = "azuretestdb";
$username = "azureuser123";
$password = "Test@1234";

$ssl_ca = "BaltimoreCyberTrustRoot.crt.pem";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
	
	 $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_CA => $ssl_ca,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // optional
    ];

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5,
    ]);

    echo "Connected successfully!";
	
	// SELECT query
    $stmt = $pdo->query("SELECT * FROM emp");
	?>
	<table>
		<tr>
			<th>emp_id</th>
			<th>First NName</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone No.</th>
		</tr>
		<?php  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td><?php echo  $row['emp_id']; ?></td>
			<td><?php echo  $row['first_name']; ?></td>
			<td><?php echo  $row['last_name']; ?></td>
			<td><?php echo  $row['email']; ?></td>
			<td><?php echo  $row['phone']; ?></td>
		</tr>
		<?php } ?>
	<table>
	<?php
	
} catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}

?>
<?php
/*
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


// Execute a query
$sql = "SELECT * FROM emp";
$stmt = sqlsrv_query($conn, $sql);

var_dump($stmt);

if ($stmt === false) {
    exit(print_r(sqlsrv_errors(), true));
}

// Fetch results
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    print_r($row);
}


var_dump($conn);
*/
?>