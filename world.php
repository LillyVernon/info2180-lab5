<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%".$_GET['country']."%'");
/* $country2=$_GET['country'];
echo $country2;
$stmt = $conn->query("SELECT c.district, c.name, c.population as city, c.country_code as country, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name='".$_GET['country']."'");
$country=filter_input(INPUT_GET, 'country', FILTER_SANITIZE_NUMBER_INT);
$stmt->bindParam('country',$country, PDO::PARAM_INT);
$stmt-> execute(); 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); */




$cities=$_GET['country'];

 if (count($_GET)==2){
$stmt = $conn->query("SELECT c.district, c.name, c.population as city, c.country_code as country, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name='".$cities."'");
$country=filter_input(INPUT_GET, 'country', FILTER_SANITIZE_NUMBER_INT);
$stmt->bindParam('country',$country, PDO::PARAM_INT);
$stmt-> execute(); 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
<tr >
    <th style="border: 1px solid black;">Name</th>
    <th style="border: 1px solid black;">District</th>
    <th style="border: 1px solid black;">Population</th>
</tr>
  <?php foreach ($results as $row): ?>
    <tr:nth-child(even) style="background-color: #f2f2f2" >
      <td style="border: 1px solid black;"><?= $row['name']; ?></td>
      <td style="border: 1px solid black;"><?= $row['district']; ?></td>
      <td style="border: 1px solid black;"><?= $row['population']; ?></td>
      </tr>
  <?php endforeach; ?>
</table>
<?php
 }else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%".$_GET['country']."%'");
  $country=filter_input(INPUT_GET, 'country', FILTER_SANITIZE_NUMBER_INT);
  $stmt->bindParam('country',$country, PDO::PARAM_INT);
  $stmt-> execute(); 
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
<tr >
    <th style="border: 1px solid black;">Name</th>
    <th style="border: 1px solid black;">Continent</th>
    <th style="border: 1px solid black;">Independence</th>
    <th style="border: 1px solid black;">Head of State</th>
  </tr>
  <?php foreach ($result as $row): ?>
    <tr:nth-child(even) style="background-color: #f2f2f2" >
      <td style="border: 1px solid black;"><?= $row['name']; ?></td>
      <td style="border: 1px solid black;"><?= $row['continent']; ?></td>
      <td style="border: 1px solid black;"><?= $row['independence_year']; ?></td>
      <td style="border: 1px solid black;"><?= $row['head_of_state']; ?></td>
      </tr>
  <?php endforeach; ?>
</table>

<?php } ?>
 
 


 
<!-- <ul>
<?php foreach ($results as $row): ?>
<li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>  -->


