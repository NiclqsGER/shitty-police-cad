
        <?php 
            if(isset($_POST['submit_pw_change'])) {
                require('./dist/config/mysql.php');
                $stmt = $mysql->prepare("SELECT * FROM accounts WHERE ID = :id");
                $stmt->bindParam(":id", $_SESSION['id']);
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count == 1) {
                    $row = $stmt->fetch();
                    if($_POST['password_new_1'] == $_POST['password_new_2']) {
                        if(password_verify($_POST['password_old'], $row['Passwort'])) {
                            $stmt = $mysql->prepare("UPDATE accounts SET Passwort = :password WHERE ID = :id");
                            $stmt->bindParam(":id", $_SESSION['id']);
                            $hash = password_hash($_POST['password_new_1'], PASSWORD_BCRYPT);
                            $stmt->bindParam(":password", $hash);
                            $stmt->execute();
                            header('Location: index.php?p=logout');
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Das alte Passwort ist falsch!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Das neue Passwort stimmt nicht überein!</div>';
                    }
                }
            }  
        ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-ml-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        Passwort ändern
                    </div>
                    <div class="card-body">
                        <form action="index.php?p=interface&c=einstellungen" method="post" style="width: 100%;">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-ml-6 col-xl-6">
                                    <div class="form-group" style="max-width: 215px;">
                                        <label for="1">Neues Passwort</label>
                                        <input name="password_new_1" type="password" class="form-control" id="1" placeholder="Passwort" require>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-ml-6 col-xl-6">
                                    <div class="form-group" style="max-width: 215px;">
                                        <label for="2">Neues Passwort wiederholen</label>
                                        <input name="password_new_2" type="password" class="form-control" id="2" placeholder="Passwort" require>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-ml-6 col-xl-6">
                                    <div class="form-group" style="max-width: 215px;">
                                        <label for="3">Altes Passwort</label>
                                        <input name="password_old" type="password" class="form-control" id="3" placeholder="Passwort" require>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-ml-6 col-xl-6">
                                    <div class="form-group" style="max-width: 215px;"><br>
                                        <button id="button" type="submit" name="submit_pw_change" style="width: 215px; margin-top: 5px;" class="btn btn-success">Änderung bestätigen</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
