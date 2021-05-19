                <?php 
                if(isset($_POST['submit'])) {
                    require('./dist/config/mysql.php');
                    $stmt = $mysql->prepare("UPDATE akten SET Aliases=:pas,Geschlecht=:gen,Telefonnummer=:tele,Groeße=:gro,Geburtstag=:gb,Augenfarbe=:af,Haarfarbe=:hf,Sonstiges=:snt,MotorradFR=:motorFR,PKWFR=:pkw,LKWFR=:lkw,WaffenFR=:waffrp WHERE ID = :user");
                    $stmt->bindParam(":user", $_GET['id'], PDO::PARAM_STR);
                    $stmt->bindParam(":pas", $_POST['post_as'], PDO::PARAM_STR);
                    $stmt->bindParam(":gen", $_POST['post_gend'], PDO::PARAM_STR);
                    $stmt->bindParam(":tele", $_POST['post_tele'], PDO::PARAM_STR);
                    $stmt->bindParam(":gro", $_POST['post_gro'], PDO::PARAM_STR);
                    $stmt->bindParam(":gb", $_POST['post_gb'], PDO::PARAM_STR);
                    $stmt->bindParam(":af", $_POST['post_af'], PDO::PARAM_STR);
                    $stmt->bindParam(":hf", $_POST['post_hf'], PDO::PARAM_STR);
                    $stmt->bindParam(":snt", $_POST['post_snt'], PDO::PARAM_STR);
                    
                    $stmt->bindParam(":motorFR", $_POST['post_motorfr']);
                    $stmt->bindParam(":pkw", $_POST['post_pkwfr']);
                    $stmt->bindParam(":lkw", $_POST['post_lkwfr']);
                    $stmt->bindParam(":waffrp", $_POST['post_waffenfr']);

                    $stmt->bindParam(":gen", $_POST['post_gend'], PDO::PARAM_STR);

                    $stmt->execute();
                    echo '<div class="alert alert-success" role="alert">Die Akte wurde überarbeitet!</div>';
                }

                require("./dist/config/mysql.php");
                $stmt = $mysql->prepare("SELECT * FROM akten WHERE ID= :id");
                $stmt->bindParam(":id", $_GET['id']);
                $stmt->execute();
                while($row = $stmt->fetch()) {
                
                if(isset($_GET['id'])) { ?>
                    <div class="card">
                        <div class="card-header">
                            <?php echo "Akte von " . $row['Vollständiger_Name'] ?>
                        </div>
                        <div class="card-body">
                            <form action="index.php?p=interface&c=editakten&id=<?php echo $_GET['id'] ?>" method="post">
                                <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                    <div class="form-group">
                                            <label>Aliases</label>
                                            <input name="post_as" type="text" class="form-control" value="<?php echo $row['Aliases'] ?>" require>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Geschlecht</label>
                                                    <input name="post_gend" type="text" class="form-control" value="<?php echo $row['Geschlecht'] ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Telefonnummer</label>
                                                    <input name="post_tele" type="text" class="form-control" value="<?php echo $row['Telefonnummer'] ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Groeße [cm]</label>
                                                    <input name="post_gro" type="text" class="form-control" value="<?php echo $row['Groeße'] ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Geburtstag</label>
                                                    <input name="post_gb" type="text" class="form-control" value="<?php echo $row['Geburtstag'] ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Augenfarbe</label>
                                                    <input name="post_af" type="text" class="form-control" value="<?php echo $row['Augenfarbe']  ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Haarfarbe</label>
                                                    <input name="post_hf" type="text" class="form-control" value="<?php echo $row['Haarfarbe'] ?>" require>
                                            </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                            <div class="form-group">
                                                    <label>Sonstiges</label>
                                                    <input name="post_snt" type="text" class="form-control" value="<?php echo $row['Sonstiges']  ?>" require>
                                            </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                                        <br>
                                        <hr>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                                    <center>
                                                        <input name="post_pkwfr" type="checkbox" class="form-check-input" <?php if($row['PKWFR'] == 'on') echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheck1">PKW-Führerschein?</label>
                                                    </center>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                                    <center>
                                                        <input name="post_lkwfr" type="checkbox" class="form-check-input" <?php if($row['LKWFR'] == 'on') echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheck1">LKW-Führerschein?</label>
                                                    </center>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                                    <center>
                                                        <input name="post_motorfr" type="checkbox" class="form-check-input" <?php if($row['MotorradFR'] == 'on') echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheck1">Motorradführerschein?</label>
                                                    </center>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                                    <center>
                                                        <input name="post_waffenfr" type="checkbox" class="form-check-input" <?php if($row['WaffenFR'] == 'on') echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheck1">Waffenschein?</label>
                                                    </center>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-ml-6 col-xl-2">
                                        <br>
                                        <a class="btn btn-danger" style="margin-top: 5px; max-width: 250px; width: 100%;" href="index.php?p=interface&c=akten&id=<?php echo $_GET['id'] ?>">Zurück</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-ml-6 col-xl-2">
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Akte speichern</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>