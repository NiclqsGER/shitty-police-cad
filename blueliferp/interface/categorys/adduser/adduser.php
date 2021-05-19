        <?php 

            if(!$_SESSION['power'] >= 10) {
                header('location: index.php?p=interface&c=mitarbeiter');
                exit;
            }

            if(isset($_POST['submit'])) {
                include('./dist/config/mysql.php');
                require('./dist/config/mysql.php');
                $stmt = $mysql->prepare("SELECT * FROM accounts WHERE Dienstnummer = :user");
                $stmt->bindParam(":user", $_POST['username']);
                $stmt->execute();
                $count = $stmt->rowCount();
                
                if($count == 0) {
                    if($_POST["pw1"] == $_POST["pw2"]) {
                        $stmt = $mysql->prepare("INSERT INTO accounts (Dienstnummer, Passwort, Vorname, Nachname, Rang, Berechtigung) VALUES (:username, :password, :vorname, :nachname, :rang, :wert)");
                        $stmt->bindParam(":username", $_POST['username']);
                        $hash = password_hash($_POST['pw1'], PASSWORD_BCRYPT);
                        $stmt->bindParam(":password", $hash);
                        $stmt->bindParam(":vorname", $_POST['vorname']);
                        $stmt->bindParam(":nachname", $_POST['nachname']);
                        $stmt->bindParam(":rang", $_POST['rang']);
                        $stmt->bindParam(":wert", $_POST['wert']);
                        $stmt->execute();
                        echo '<div class="alert alert-success" role="alert">Der Benutzer wurde erstellt!</div>';
                    } else {
                        echo 'passwörter stimmen nicht überein!';
                    }
                } else {
                    echo 'User gibt es bereits!';
                }
            }
        ?>
        <div class="card">
            <div class="card-header">
                Neuen Benutzer registrieren
            </div>
            <div class="card-body">
                <form action="index.php?p=interface&c=adduser" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Dienstnummer</label>
                                <input name="username" type="text" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Passwort</label>
                                <input name="pw1" type="password" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Passwort (wiederholen)</label>
                                <input name="pw2" type="password" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Vorname</label>
                                <input name="vorname" type="text" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Nachname</label>
                                <input name="nachname" type="text" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Rang bezeichnung</label>
                                <input name="rang" type="text" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <label for="1">Berechtigung</label>
                                <input name="power" type="number" class="form-control" id="1" require>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                            <div class="form-group" style="max-width: 250px;">
                                <br>
                                <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Benutzer hinzufügen</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>