       <?php 
        if(!$_SESSION['power'] >= 10) {
            header('location: index.php?p=interface&c=einsatzbereicht');
        exit;
        }

        if(isset($_POST['submit'])) {
            require('./dist/config/mysql.php');
            $stmt = $mysql->prepare("INSERT INTO gesetzbuch (NAME, KURZEL) VALUES (:title, :kurzel);");
            $stmt->bindParam(":title", $_POST['TITLE'], PDO::PARAM_STR);
            $stmt->bindParam(":kurzel", $_POST['KURZELBOX'], PDO::PARAM_STR);
            $stmt->execute();
            echo '<div class="alert alert-success" role="alert">Das Gesetzbuch wurde erstellt!</div>';
        }

        ?>
        <form action="index.php?p=interface&c=addgesetzbuch" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-8">
                    <label for="exampleInputEmail1">Name des Gesetzesbuch</label>
                    <input name="TITLE" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Strafgesetzbuch, Bürgerliches Gesetzbuch?">
                    <small id="emailHelp" class="form-text text-muted">Achte auf die schreibweise.</small>
                    </div>
                    <div class="col-4">
                    <label for="exampleInputEmail1">Name des Gesetzesbuch</label>
                    <input name="KURZELBOX" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="StGB, BGB?">
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-success" style="margin-top: 5px; max-width: 250px; width: 100%;">Gesetzbuch hinzufügen</button>
            </div>
        </form>