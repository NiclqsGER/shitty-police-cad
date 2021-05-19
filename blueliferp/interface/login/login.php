        
        <?php 
            include('./dist/config/mysql.php');
            if(isset($_POST['submit'])) {
                require('./dist/config/mysql.php');
                $stmt = $mysql->prepare("SELECT * FROM accounts WHERE Dienstnummer = :user");
                $stmt->bindParam(":user", $_POST['username']);
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count == 1) {
                    $row = $stmt->fetch();
                    if(password_verify($_POST["password"], $row["Passwort"])) {
                        session_start();
                        $_SESSION["id"] = $row["ID"];
                        $_SESSION["username"] = $row["Dienstnummer"];
                        $_SESSION["vorname"] = $row["Vorname"];
                        $_SESSION["nachname"] = $row["Nachname"];
                        $_SESSION["rang"] = $row["Rang"];
                        $_SESSION["power"] = $row["Berechtigung"];
                        header("Location: index.php?p=interface&c=start");
                    }
                }
            }  
        ?><div class="container d-flex h-100">
            <div class="row align-self-center w-100">
                <div class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto">
                    <div class="login-app">
                        <div class="login-header">
                            <img src='./dist/image/login-background.jpg' />
                        </div>
                        <div class="login-brand">
                            <a>POLIZEI</a>
                        </div>
                        <div class="login-form">
                            <form action="index.php" method="post">
                                <a><i class="fad fa-user-cowboy"></i> | Dienstnummer:</a>
                                <input type="text" name="username" placeholder="DieNr." require><br>
                                <a><i class="far fa-lock"></i> | Passwort:</a>
                                <input type="password" name="password" placeholder="Passwort" require>
                                <button type="submit" name="submit" class="btn btn-success">Anmelden</button>
                            </form>
                        </div>
                        <hr>
                        <div class="login-info">
                            <a>Version: <?php echo($version); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>