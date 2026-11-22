<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = isset($_GET['country']) ? $_GET['country'] : '';

$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE ?");
$stmt->execute(["%$country%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo "<table>";
echo "<tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr>";
foreach ($results as $row) {
    $ind = $row['independence_year'] ? $row['independence_year'] : "N/A";
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name'])          . "</td>";
    echo "<td>" . htmlspecialchars($row['continent'])     . "</td>";
    echo "<td>" . htmlspecialchars($ind)                  . "</td>";
    echo "<td>" . htmlspecialchars($row['head_of_state']) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= htmlspecialchars($row['name']) . ' is ruled by ' . htmlspecialchars($row['head_of_state']); ?></li>
<?php endforeach; ?>
</ul>
