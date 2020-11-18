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
*/




 ?>
<!-- <ul>
<?php foreach ($results as $row): ?>
<li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>  -->

<table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
<tr >
    <th style="border: 1px solid black;">Name</th>
    <th style="border: 1px solid black;">Continent</th>
    <th style="border: 1px solid black;">Independence</th>
    <th style="border: 1px solid black;">Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr:nth-child(even) style="background-color: #f2f2f2" >
      <td style="border: 1px solid black;"><?= $row['name']; ?></td>
      <td style="border: 1px solid black;"><?= $row['continent']; ?></td>
      <td style="border: 1px solid black;"><?= $row['independence_year']; ?></td>
      <td style="border: 1px solid black;"><?= $row['head_of_state']; ?></td>
      </tr>
  <?php endforeach; ?>
</table>
