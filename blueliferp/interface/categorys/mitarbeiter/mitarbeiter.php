        
        <?php if($_SESSION['power'] >= 10) { ?>
            <a href="index.php?p=interface&c=adduser" class="btn btn-success" style="margin-top: 5px; max-width: 100%; width: 100%; margin-bottom: 15px;">Benutzer Hinzufügen</a>
        <?php } ?>
        <div class="content-box overflow-auto">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Dienstnummer</th>
                        <th scope="col">Vorname</th>
                        <th scope="col">Nachname</th>
                        <th scope="col">Rang</th>
                        <?php if($_SESSION['power'] >= 8) { ?>
                        <th scope="col">*P</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include("./dist/config/mysql.php");
                        require("./dist/config/mysql.php");
                        $stmt = $mysql->prepare("SELECT * FROM accounts");
                        $stmt->execute();
                        while($row = $stmt->fetch()) {
                            ?>
                            <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['Dienstnummer'] ?></td>
                            <td><?php echo $row['Vorname'] ?></td>
                            <td><?php echo $row['Nachname'] ?></td>
                            <td><?php echo $row['Rang'] ?></td>
                            <?php if($_SESSION['power'] >= 10) { ?>
                            <td><?php echo '<a href="index.php?p=interface&c=edituser&u=' . $row['ID'] . '"><i class="fas fa-user-edit"></i></a>'; ?></td>
                            <?php } ?>    
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
        </div>