        <?php if($_SESSION['power'] >= 10) { 
            if(!(isset($_GET['b']))) {?>
            <a href="index.php?p=interface&c=addgesetzbuch" class="btn btn-success" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Gesetzbuch hinzufügen</a>
        <?php }} ?>
            <?php 
            if(!(isset($_GET['b']))) {
                include("./dist/config/mysql.php");
                require("./dist/config/mysql.php");
                $stmt = $mysql->prepare("SELECT * FROM gesetzbuch");
                $stmt->execute();
                while($row = $stmt->fetch()) {
                    ?>
                        <div class="card text-center" style="margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['NAME'] . " [" . $row['KURZEL'] . "]" ?></h5>
                            <hr>
                            <a href="index.php?p=interface&c=strafen&b=<?php echo $row['ID'] ?>" class="btn btn-primary">Buch einsehen</a>
                        </div>
                    </div>
                <?php
                }
            } else {
                    if(isset($_GET['b'])) { ?>
                    <div class="">
                        <div class="row">
                            <div class="col-2">
                                <a href="index.php?p=interface&c=strafen" class="btn btn-danger" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;"><i class="fas fa-backward"></i> Zurück</a>
                            </div>
                            <?php if($_SESSION['power'] >= 10) {  ?>
                            <div class="col-2">
                                <a href="index.php?p=interface&c=addparagraph&b=<?php echo $_GET['b'] ?>" class="btn btn-success" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Paragraph hinzufügen</a>
                            </div>
                            <div class="col-2">
                                <a href="#" class="btn btn-warning" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Paragraph bearbeiten</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php 
                } ?> 

                <div class="">
                <div class="row">
                <?php
                require('./dist/config/mysql.php');
                $stmt = $mysql->prepare('SELECT * FROM strafen ORDER BY Paragraph ASC');
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count == 0) {
                } else {
                while($row = $stmt->fetch()) {
                    if($row['BuchID'] == $_GET['b']) {
                    ?>
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12" style="margin-bottom: 10px;">
                        <div class="card">
                            <h5 class="card-header"><?php echo '§ ' . $row['Paragraph'] . " " . $row['Buch'] . " | " . $row['Straftat'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text"><?php echo 'Minimalstrafe: ' . $row['Minimalstrafe'] . " | Haftzeit: " . $row['Haftzeit'] . " Monate" ?></p>
                                    <p class="card-text"><?php echo nl2br($row['Sonstiges']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } ?>
                </div> <?php
            } ?>
                </div>
        <?php  } ?>
