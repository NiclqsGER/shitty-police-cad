        <?php 
            if(isset($_GET['u'])) {
                if(!empty($_GET['u'])) {
                    include('./dist/config/mysql.php');
                    require('./dist/config/mysql.php');
                    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE ID = :id");
                    $stmt->execute(array(":id" => $_GET["u"]));
                    $row = $stmt->fetch();
                    if(isset($_POST["submit"])) {
                        $stmt = $mysql->prepare("UPDATE accounts SET Berechtigung=:power,Vorname=:vorname,Nachname=:nachname,Rang=:rang,Passwort=:password,Dienstnummer=:username WHERE ID = :id");
                        if($_POST['passwort'] == $row['Passwort']) {
                            $hash = $row['Passwort'];
                        } else {
                            $hash = password_hash($_POST['passwort'], PASSWORD_BCRYPT);
                        }
                        $stmt->bindParam(":id", $_GET['u']);
                        $stmt->bindParam(":username", $_POST['username']);
                        $stmt->bindParam(":power", $_POST['power']);
                        $stmt->bindParam(":vorname", $_POST['vorname']);
                        $stmt->bindParam(":nachname", $_POST['nachname']);
                        $stmt->bindParam(":rang", $_POST['rang']);
                        $stmt->bindParam(":password", $hash);
                        $stmt->execute();
                        echo '<div class="alert alert-success" role="alert">Der Benutzer mit der ID <strong>' . $_GET['u']  . '</strong> wurde bearbeitet!</div>';
                    } else if(isset($_POST['submit_delete'])) {
                        $stmt = $mysql->prepare("DELETE FROM accounts WHERE id=:id");
                        $stmt->bindParam(":id", $_GET['u']);
                        $stmt->execute();
                        header('Location: index.php?p=interface&c=mitarbeiter');
                    } else {
                    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE ID = :id");
                    $stmt->execute(array(":id" => $_GET["u"]));
                    $row = $stmt->fetch();
                    ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-ml-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    Benutzer bearbeiten
                                </div>
                                <div class="card-body">
                                    <form action="index.php?p=interface&c=edituser&u=<?php echo $_GET['u'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Dienstnummer</label>
                                                    <input name="username" type="text" class="form-control" id="1" value="<?php echo $row['Dienstnummer'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Vorname</label>
                                                    <input name="vorname" type="text" class="form-control" id="1" value="<?php echo $row['Vorname'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Nachname</label>
                                                    <input name="nachname" type="text" class="form-control" id="1" value="<?php echo $row['Nachname'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Rang</label>
                                                    <input name="rang" type="text" class="form-control" id="1" value="<?php echo $row['Rang'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Berechtigung</label>
                                                    <input name="power" type="number" class="form-control" id="1" value="<?php echo $row['Berechtigung'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <div class="form-group" style="max-width: 250px;">
                                                    <label for="1">Passwort</label>
                                                    <input name="passwort" type="password" class="form-control" id="1" value="<?php echo $row['Passwort'] ?>" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <br>
                                                <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Änderungen speichern</button>
                                            </div>
                                            <div class="col-12 col-sm-6 col-ml-6 col-xl-3">
                                                <br>
                                                <button type="submit" name="submit_delete" class="btn btn-danger" style="margin-top: 5px; max-width: 250px; width: 100%;">Benutzer löschen</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                } else {
                    header('location: index.php?p=interface&c=mitarbeiter');
                }
            } else {
                header('location: index.php?p=interface&c=mitarbeiter');
            }
        ?>


        