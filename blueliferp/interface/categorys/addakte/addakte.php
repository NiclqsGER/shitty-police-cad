<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Warnung!</h4>
  <p>Sei dir sicher, ob alle Daten der Wahrheit entsprechen.</p>
  <hr>
  <p class="mb-0">In der Version: <strong><?php echo $version ?></strong> ist vieles ungeprüft!</p>
</div>

<?php 

if(isset($_POST['submit'])) {
    require('./dist/config/mysql.php');
    $stmt = $mysql->prepare("INSERT INTO akten (Vollständiger_Name, Aliases, Geschlecht, Telefonnummer, Groeße, Geburtstag, Augenfarbe, Haarfarbe, Sonstiges, MotorradFR, WaffenFR, PKWFR, LKWFR, IS_GEFAHNDET) VALUES (:vn, :ali, :gender, :tele, :gro, :gb, :ag, :hf, :sonst, :motorFR, :waffrp, :pkw, :lkw, :fahndung);");
    $stmt->bindParam(":vn", $_POST['post_vn'], PDO::PARAM_STR);
    $stmt->bindParam(":ali", $_POST['post_alis'], PDO::PARAM_STR);
    $stmt->bindParam(":gender", $_POST['post_gender'], PDO::PARAM_STR);
    $stmt->bindParam(":tele", $_POST['post_tele'], PDO::PARAM_STR);
    $stmt->bindParam(":gro", $_POST['post_groeße'], PDO::PARAM_STR);
    $stmt->bindParam(":gb", $_POST['post_gb'], PDO::PARAM_STR);
    $stmt->bindParam(":ag", $_POST['post_ag'], PDO::PARAM_STR); 
    $stmt->bindParam(":hf", $_POST['post_hf'], PDO::PARAM_STR);  
    $stmt->bindParam(":sonst", $_POST['post_sonst'], PDO::PARAM_STR);

    $stmt->bindParam(":motorFR", $_POST['post_mrfr']);
    $stmt->bindParam(":pkw", $_POST['post_mrfr']);
    $stmt->bindParam(":lkw", $_POST['post_lkwfr']);
    $stmt->bindParam(":waffrp", $_POST['post_waffenfr']);
    $stmt->bindParam(":fahndung", $_POST['post_fahndung']);
    
    $stmt->execute();
    echo '<div class="alert alert-success" role="alert">Die Akte wurde angelegt!</div>';
}

?>

<div class="card">
    <div class="card-header">
        <strong>Neue Akte hinzufügen</strong>
    </div>
    <div class="card-body">
    <form action="index.php?p=interface&c=addakte" method="POST">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vor- und Nachname</label>
                    <input name="post_vn" type="text" class="form-control" placeholder="Format: Max Musterman">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Aliases</label>
                    <input name="post_alis" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Geschlecht</label>
                    <input name="post_gender" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefonnummer</label>
                    <input name="post_tele" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Größe</label>
                    <input name="post_groeße" type="text" class="form-control" placeholder="Format in cm: 188">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Geburtstag</label>
                    <input name="post_gb" type="text" class="form-control" placeholder="Format: TT.MM.JJJJ">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Augenfarbe</label>
                    <input name="post_ag" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Haarfarbe</label>
                    <input name="post_hf" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sonstiges</label>
                    <input name="post_sonst" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-2">
                <div class="form-check">
                    <input name="post_mrfr" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Motorradführerschein?</label>
                    <br>
                    <input name="post_pkwfr" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Autoführerschein?</label>
                    <br>
                    <input name="post_lkwfr" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">LKW-Führerschein?</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-xl-2">
                <div class="form-check">
                    <input name="post_waffenfr" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Waffenschein?</label>
                </div>
                <div class="form-check">
                    <input name="post_fahndung" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Fahndung?</label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Akte anlegen</button>
    </div>
    </form>
</div>
