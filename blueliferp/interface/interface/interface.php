
        <?php 

            if(!isset($_SESSION['username'])) {
                header('Location: index.php?p=login');
                exit;
            }

            if(!isset($_GET['c'])) {
                $category = 'start';
            }

            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare('SELECT * FROM ausbildung WHERE IS_FINISHED = 0');
            $stmt->execute();
            $count = $stmt->rowCount();
            $ausbildung_new = 0;
            while($row = $stmt->fetch()) {
                $ausbildung_new = $ausbildung_new+1;
            }
            require("./dist/config/mysql.php");
            $stmt = $mysql->prepare("SELECT * FROM akten WHERE IS_GEFAHNDET = 'on'");
            $stmt->execute();
            $fahndung = 0;
            while($row = $stmt->fetch()) {
                $fahndung = $fahndung+1;
            }
            ?>

        <div class="sidebar-container">
            <div class="sidebar-logo" style="z-index: 1001;">
                <a style="z-index: 1005; margin-top: 20px;">BlueLifeRP</a>
            </div>
            <ul class="sidebar-navigation">
                <!--  -->
                <li class="header"><u>POLIZEI</u></li>
                <li>
                    <a href="index.php?p=interface&c=start">Startseite</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=akten">Akten</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=fahndung">Fahndung <span class="badge badge-danger"><?php echo $fahndung ?></span></a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=mitarbeiter">Mitarbeiter</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=strafen">Strafen</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=neuigkeiten">Neuigkeiten</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=ausbildung">Ausbildung <span class="badge badge-danger"><?php echo $ausbildung_new ?></span></a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=einsatzberichte">Einsatzberichte</a>
                </li>
                <!--  -->
                <li class="header margin"><u>Anpassen</u></li>
                <li>
                    <a href="index.php?p=interface&c=einstellungen">Einstellungen</a>
                </li>
                <li>
                    <a href="index.php?p=interface&c=about">About</a>
                </li>
                <!--  -->
            </ul>
        </div>
        <div class="topnav-container">
            <div class="row">
                <div class="sidebar-logo col" style="z-index: 1001;">
                    <a style="z-index: 1005;  color: white;">BlueLifeRP</a>
                </div>
                <div class="float-right col" style="margin-right: 30px; margin-top: 6px; text-align: right;">
                    <a href="index.php?p=logout" class="btn btn-danger">Ausloggen</a>
                </div>
            </div>
        </div>
        <div class="content-container">
            <div class="container-fluid" style="margin-top: 50px;">
                <?php 
                include_once('./interface/categorys/' . $category . '/' . $category . '.php');
                ?>
                
            </div>
        </div>
