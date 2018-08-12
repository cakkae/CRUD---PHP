<?php
     
    require 'baza.php';
 
    if ( !empty($_POST)) {
        // greske validacija
        $greskaImena = null;
        $greskaSmjera = null;
        $greskaIndeks = null;
         
        
        $ime = $_POST['ime'];
        $smjer = $_POST['smjer'];
        $indeks = $_POST['indeks'];
         
        // validacija
        $valid = true;
        if (empty($ime)) {
            $greskaImena = 'Molimo unesite ime';
            $valid = false;
        }
         
        if (empty($smjer)) {
            $greskaSmjera = 'Molimo unesite smjer';
            $valid = false;
        } 
         
        if (empty($indeks)) {
            $greskaIndeks = 'Molimo unesite broj indeksa';
            $valid = false;
        }
         
        // ubacivanje podataka
        if ($valid) {
            $pdo = Baza::povezi();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO studenti (ime,smjer,indeks) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($ime,$smjer,$indeks));
            Baza::otkazi();
            header("Lokacija: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Kreiraj studenta</h3>
                    </div>
             
                    <form class="form-horizontal" action="kreiraj.php" method="post">
                      <div class="control-group <?php echo !empty($greskaImena)?'error':'';?>">
                        <label class="control-label">Ime</label>
                        <div class="controls">
                            <input name="ime" type="text"  placeholder="Ime" value="<?php echo !empty($ime)?$ime:'';?>">
                            <?php if (!empty($greskaImena)): ?>
                                <span class="help-inline"><?php echo $greskaImena;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($greskaSmjera)?'error':'';?>">
                        <label class="control-label">Smjer</label>
                        <div class="controls">
                            <input name="smjer" type="text" placeholder="Smjer" value="<?php echo !empty($smjer)?$greskaSmjera:'';?>">
                            <?php if (!empty($greskaSmjera)): ?>
                                <span class="help-inline"><?php echo $greskaSmjera;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($greskaIndeks)?'error':'';?>">
                        <label class="control-label">Indeks</label>
                        <div class="controls">
                            <input name="indeks" type="text"  placeholder="Broj indeksa" value="<?php echo !empty($indeks)?$greskaIndeksa:'';?>">
                            <?php if (!empty($greskaIndeks)): ?>
                                <span class="help-inline"><?php echo $greskaIndeks;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Kreiraj</button>
                          <a class="btn" href="index.php">Vrati</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>