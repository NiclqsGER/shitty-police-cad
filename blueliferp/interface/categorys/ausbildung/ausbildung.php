        <?php if($_SESSION['power'] >= 5) { ?>
            <a href="index.php?p=interface&c=addausbildung" class="btn btn-success" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Ausbildung ankündingen</a>
        <?php } ?>

        <?php if(!isset($_GET["id"])) { ?>
        <div class="card border-success" style="margin-bottom: 5px;">
            <div class="card-body">
                <i class="fas fa-user-graduate"></i> | Angekündigte Ausbildungen
            </div>
        </div>
        
        <?php
        }
        if(isset($_POST['submit_delete'])) {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare("DELETE FROM ausbildung WHERE ID = :id");
            $stmt->bindParam(":id", $_GET['id']);
            $stmt->execute();
            header('Location: index.php?p=interface&c=ausbildung');
        }

        if(isset($_GET["id"])) {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare('SELECT * FROM ausbildung WHERE ID = :id');
            $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count == 0) {
            } else {
                $row = $stmt->fetch();
                ?>
                <div class="card">
                    <div class="card-header" >
                        <?php echo "<strong>" . $row['AUSBILDUNGSART'] . "</strong>" . " | Geschrieben von " . $row['CREATOR_NAME'] . " am " . date("H:i", $row['CREATE_DATE']) ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br($row['AUSBILDUNGSCONTEXT']) ?></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo "<strong>Beteiligte Einheiten:</strong> " . nl2br($row['BETROFFENE_EINHEITEN']) ?></p>
                    </div>
                </div>
                <br>
                <a href="index.php?p=interface&c=ausbildung" class="btn btn-info float-left" style="margin-top: 5px; max-width: 250px; width: 100%;">Zurück</a>
                <?php if($_SESSION['power'] >= 5 || $_GET['aID'] == $_SESSION['id']) { ?>
                    <form action="index.php?p=interface&c=ausbildung&id=<?php echo $_GET['id'] ?>" method="post">
                        <button type="submit" name="submit_delete" class="btn btn-danger" style="margin-top: 5px; max-width: 250px; width: 100%; margin-left: 15px;">Bericht löschen</button>
                    </form>
                <?php } ?>
                <?php
            }
        } else {
            ?> <div class="row"> <?php
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare('SELECT * FROM ausbildung ORDER BY CREATE_DATE DESC LIMIT 150');
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count == 0) {
            } else { ?>
                
                <?php
                    while($row = $stmt->fetch()) {
                        if(!($row['IS_FINISHED'] == 1)) {
                        ?>
                            <div class="col-sm-6 col-xl-6 col-md-6 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo "<strong>" . $row['AUSBILDUNGSART'] . "</strong>" . " | Am " . $row['DATUM'] ?></h5>
                                        <p class="card-text"><?php echo "Einheite(n): " . $row['BETROFFENE_EINHEITEN'] ?></p>
                                        <a href="index.php?p=interface&c=ausbildung&id=<?php echo $row['ID'] . '&aID=' . $row['CREATOR_ID'] ?>" style="width: 100%;" class="btn btn-primary">Lesen</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } ?>
                
                <?php
                }
            }
        }
        ?>
        </div>

        <?php if(!isset($_GET["id"])) { ?>

        <div class="card border-danger" style="margin-top: 45px; margin-bottom: 5px;">
            <div class="card-body">
                <i class="fas fa-user-graduate"></i> | Abgeschlossene Ausbildungen
            </div>
        </div>

        <?php } ?>

        <div class="row">
        <?php
        if(!isset($_GET["id"])) {
        require('./dist/config/mysql.php');
        $stmt = $mysql->prepare('SELECT * FROM ausbildung ORDER BY CREATE_DATE DESC LIMIT 150');
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0) {
        } else { ?>
            <?php
                while($row = $stmt->fetch()) {
                    if($row['IS_FINISHED'] == 1) {
                    ?>
                        <div class="col-sm-6 col-xl-6 col-md-6 col-6">
                            <div class="card border-danger">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo "<strong>" . $row['AUSBILDUNGSART'] . "</strong>" . " | Am " . $row['DATUM'] ?></h5>
                                    <p class="card-text"><?php echo "Einheite(n): " . $row['BETROFFENE_EINHEITEN'] ?></p>
                                    <a href="index.php?p=interface&c=ausbildung&id=<?php echo $row['ID'] . '&aID=' . $row['CREATOR_ID'] ?>" style="width: 100%;" class="btn btn-primary">Lesen</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                
            <?php
        }
    }
        } ?>
        
        </div>