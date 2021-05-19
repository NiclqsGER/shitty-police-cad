
        <?php if($_SESSION['power'] >= 5) { ?>
            <a href="index.php?p=interface&c=addnews" class="btn btn-success" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Nachricht hinzufügen</a>
        <?php } ?>

        <?php
        require('./dist/config/mysql.php');
        if(isset($_GET['id'])) {
            if(isset($_POST['submit_delete'])) {
                $stmt = $mysql->prepare("DELETE FROM neuigkeiten WHERE ID=:id");
                $stmt->bindParam(":id", $_GET['id']);
                $stmt->execute();
            }
        }

        if(isset($_GET["id"])) {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare('SELECT * FROM neuigkeiten WHERE ID = :id');
            $stmt->bindParam(":id", $_GET['id']);
            $stmt->execute();
            $count = $stmt->rowCount();

            if($count == 0) {
                echo '<div class="alert alert-danger" role="alert">Die Nachricht konnte nicht gefunden werden!</div>';
                echo '<br><a href="index.php?p=interface&c=neuigkeiten" class="btn btn-info float-right" style="margin-top: 5px; max-width: 250px; width: 100%;">Zurück</a>';
            } else {
                $row = $stmt->fetch();
                ?>
                <div class="card">
                    <div class="card-header" >
                        <?php echo "<strong>" . $row['TITLE'] . "</strong>" . " | Geschrieben von " . $row['CREATOR_NAME'] . " am " . date("d.m.Y", $row['CREATED_AT']) . " um " . date("H:i", $row['CREATED_AT'])?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br($row['NEWS']) ?></p>
                    </div>
                </div>
                <br>
                <a href="index.php?p=interface&c=neuigkeiten" class="btn btn-info float-left" style="margin-top: 5px; max-width: 250px; width: 100%;">Zurück</a>
                <?php if($_SESSION['power'] >= 5 || $_GET['aID'] == $_SESSION['id']) { ?>
                    <form action="index.php?p=interface&c=neuigkeiten&id=<?php echo $_GET['id'] ?>" method="post">
                        <button type="submit" name="submit_delete" class="btn btn-danger" style="margin-top: 5px; max-width: 250px; width: 100%; margin-left: 15px;">Neuigkeit löschen</button>
                    </form>
                <?php } ?>
                <?php
            }
        } else {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare('SELECT * FROM neuigkeiten ORDER BY CREATED_AT DESC LIMIT 150');
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count == 0) {
                echo '<div class="alert alert-danger" role="alert">Es konntent keine Nachrichten gefunden werden!</div>';
                echo '<br><a href="index.php?p=interface&c=neuigkeiten" class="btn btn-info float-left" style="margin-top: 5px; max-width: 250px; width: 100%;">Neuladen</a>';
            } else { ?>
                <div class="row">
                <?php
                while($row = $stmt->fetch()) {
                    ?>
                        <div class="col-12 col-md-6 col-xl-6 col-sm-12" style="margin-bottom: 10px;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo "<strong>" . $row['TITLE'] . "</strong>" ?></h5>
                                    <?php echo "Geschrieben von " . $row['CREATOR_NAME'] . " am " . date("d.m.Y", $row['CREATED_AT']) . " um " . date("H:i", $row['CREATED_AT'])?>
                                    <br>
                                    <br>
                                    <a style="width: 100%" href="index.php?p=interface&c=neuigkeiten&id=<?php echo $row['ID'] . "&aID=" . $row['CREATOR_ID'] ?>" class="btn btn-primary">Lesen</a>
                                </div>
                            </div>
                        </div>
                    <?php
                } ?>
                </div> <?php
            }
        }
        ?>

        