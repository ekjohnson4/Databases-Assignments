<?php
  $user = "jsburgin";
  $cwid = "11484207";
  $server = "cs-sql2014.ua-net.ua.edu";
  // create the connection to mySQL
  $con = new mysqli($server, $user, $cwid, $user);

  $name = $_POST["name"];

  $columns = $con->query("SHOW COLUMNS FROM employee");
  $rows = $con->query("SELECT * FROM employee WHERE name LIKE '%$name%'");
?>

<!doctype html>

<html>
<head>
  <title>Task 4a - Songs</title>
  <link href="/~jsburgin/style.css" rel="stylesheet" />
</head>

<body>
  <a href="/~jsburgin" class="return-link">Return to Main Page</a>

  <div class="section">
    <h3>Searchings Employees With Name "<?php echo $name ?>"</h3>
    <table>
      <thead>
        <tr>
          <?php while ($column = mysqli_fetch_row($columns)) { ?>
            <th><?php echo $column[0]; ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_row($rows)) { ?>
          <tr>
            <?php foreach($row as $value) {?>
              <td><?php echo $value ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
