<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%".$_GET['country']."%'");
$country=filter_input(INPUT_GET, 'country', FILTER_SANITIZE_NUMBER_INT);
$stmt->bindParam('country',$country, PDO::PARAM_INT);
$stmt-> execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* $country=$_GET;
echo $_REQUEST['country']. "\n";
print_r ($_GET['country'] . "\n");





?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
