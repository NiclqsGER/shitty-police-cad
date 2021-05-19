        
    <?php 
    if(isset($_POST['submit'])) {
        include('./dist/config/mysql.php');
        require('./dist/config/mysql.php');
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE Dienstnummer = :user");
        $stmt->bindParam(":user", $_POST['username']);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count == 0) {
            if($_POST["password"] == $_POST["password2"]) {
                $stmt = $mysql->prepare("INSERT INTO accounts (Dienstnummer, Passwort, Vorname, Nachname, Rang, Berechtigung) VALUES (:username, :password, :vorname, :nachname, :rang, :wert)");
                $stmt->bindParam(":username", $_POST['username']);
                $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt->bindParam(":password", $hash);
                $stmt->bindParam(":vorname", $_POST['vorname']);
                $stmt->bindParam(":nachname", $_POST['nachname']);
                $stmt->bindParam(":rang", $_POST['rang']);
                $stmt->bindParam(":wert", $_POST['wert']);
                $stmt->execute();
                echo 'Der Account wurde hinterlegt!';
            } else {
                echo 'passwörter stimmen nicht überein!';
            }
        } else {
            echo 'User gibt es bereits!';
        }
    }
    ?>
    <h2>DEBUG-DATEI | NIEMALS IM VERZEICHNIS LASSEN!</h2>
    <div class="login-form">
        <form action="register.php" method="post">

            <a><i class="fad fa-user-cowboy"></i> Dienstnummer:</a>
            <input type="text" name="username" placeholder="" require><br>

            <a><i class="far fa-lock"></i> Passwort:</a>
            <input type="password" name="password" placeholder="" require><br>

            <a><i class="far fa-lock"></i> Passwort (wiederholen):</a>
            <input type="password" name="password2" placeholder="" require><br>

            <a><i class="far fa-lock"></i> Vorname:</a>
            <input type="text" name="vorname" placeholder="" require><br>

            <a><i class="far fa-lock"></i> Nachname:</a>
            <input type="text" name="nachname" placeholder="" require><br>

            <a><i class="far fa-lock"></i> Wert:</a>
            <input type="number" name="wert" placeholder="10" require><br>

            <a><i class="far fa-lock"></i> Polizei Rang-bezeichnung:</a>
            <input type="text" name="rang" placeholder="" require><br><br>

            <button type="submit" name="submit" class="btn btn-success">ADMIN HINZUFÜGEN</button>
        </form>
    </div>