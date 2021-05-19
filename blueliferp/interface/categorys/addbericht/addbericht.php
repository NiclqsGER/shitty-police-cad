<?php 
            // if(!$_SESSION['power'] >= 0) {
            //     header('location: index.php?p=interface&c=einsatzbereicht');
            // exit;
            // } ?>

            <?php 
            
                if(isset($_POST['submit'])) {
                    require('./dist/config/mysql.php');
                    $stmt = $mysql->prepare("INSERT INTO einsatzbericht (TITLE, NEWS, CREATED_AT, CREATOR_ID, CREATOR_NAME) VALUES (:title, :news, :created_at, :creator_id, :creator_name);");
                    $stmt->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
                    $stmt->bindParam(":news", $_POST['news'], PDO::PARAM_STR);
                    $now = time();
                    $stmt->bindParam(":created_at", $now, PDO::PARAM_STR);
                    $stmt->bindParam(":creator_id", $_SESSION['id']);
                    $name = $_SESSION['vorname'] . " " . $_SESSION['nachname'];
                    $stmt->bindParam(":creator_name", $name, PDO::PARAM_STR);
                    $stmt->execute();
                    echo '<div class="alert alert-success" role="alert">Der Einsatzbereicht wurde erstellt!</div>';
                }
            
            ?>

            <form action="index.php?p=interface&c=addbericht" method="POST">
                <div class="form-group">
                    <label for="1">Titel</label>
                    <textarea name="title" class="form-control" id="1" rows="1"></textarea>
                    <br>
                    <label for="1">Einsatz beschreibung</label>
                    <textarea name="news" class="form-control" id="1" rows="10"></textarea>
                    <br>
                    <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Nachricht veröffentlichen</button>
                </div>
            </form>