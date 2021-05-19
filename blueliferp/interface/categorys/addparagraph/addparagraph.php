            <?php 
             if(!$_SESSION['power'] >= 10) {
                header('location: index.php?p=interface&c=einsatzbereicht');
                exit;
            } ?>

            <?php 
            
                if(isset($_POST['submit'])) {
                    require('./dist/config/mysql.php');
                    $stmt = $mysql->prepare("INSERT INTO strafen (Buch, BuchID, Paragraph, Straftat, Minimalstrafe, Haftzeit, Sonstiges) VALUES (:buch, :buchid, :paragraph, :straftat, :minstrafe, :haftzeit, :sonstige);");
                    $stmt->bindParam(":buch", $_POST['inbuch'], PDO::PARAM_STR);
                    $stmt->bindParam(":buchid", $_GET['b']);
                    $stmt->bindParam(":paragraph", $_POST['sort'], PDO::PARAM_STR);
                    $stmt->bindParam(":straftat", $_POST['straft'], PDO::PARAM_STR);
                    $stmt->bindParam(":minstrafe", $_POST['minstr'], PDO::PARAM_STR);
                    $stmt->bindParam(":haftzeit", $_POST['haftsr'], PDO::PARAM_STR);
                    $stmt->bindParam(":sonstige", $_POST['sonst'], PDO::PARAM_STR);
                    $stmt->execute();
                    echo '<div class="alert alert-success" role="alert">Der Paragraph wurde erstellt!</div>';
                }
            
            ?>

            <form action="index.php?p=interface&c=addparagraph&b=<?php echo $_GET['b'] ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <label for="exampleInputEmail1">Buch (Name)</label>
                            <input name="inbuch" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="z.B. StGB" require>
                        </div>
                        <div class="col-2">
                            <label for="exampleInputEmail1">Buch-ID</label>
                            <input name="buch-ID" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_GET['b'] ?>" disabled require>
                            <small id="emailHelp" class="form-text text-muted">BuchID (Nicht änderbar)</small>
                        </div>
                        <div class="col-2">
                            <label for="exampleInputEmail1">Paragraph (Zahl)</label>
                            <input name="sort" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1 -> x" require>
                            <small id="emailHelp" class="form-text text-muted">Beeinflusst die sortierung!</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Straftat</label>
                            <input name="straft" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Minimalstrafe</label>
                            <input name="minstr" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                        </div>
                        <div class="col-3">
                            <label for="exampleInputEmail1">Haftzeit</label>
                            <input name="haftsr" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label for="exampleInputEmail1">Sonstiges</label>
                            <textarea rows="5" name="sonst" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Eintrag hinzufügen</button>
                </div>
            </form>