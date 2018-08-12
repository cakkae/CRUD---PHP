
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Aplikacija</h3>
            </div>
            <div class="row">
              <p>
  <a href="kreiraj.php" class="btn btn-success">Kreiraj</a>
</p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Ime</th>
                      <th>Smjer</th>
                      <th>Indeks</th>
                      <th>Akcija</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'baza.php';
                   $pdo = Baza::povezi();
                   $sql = 'SELECT * FROM studenti ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['Ime'] . '</td>';
                            echo '<td>'. $row['Smjer'] . '</td>';
                            echo '<td>'. $row['Indeks'] . '</td>';
                            echo '<td><a class="btn" href="citaj.php?id='.$row['ID'].'">Citaj</a></td>';

                            echo '</tr>';
                   }
                   Baza::otkazi();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> 
  </body>
</html>