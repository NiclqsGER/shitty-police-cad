                
                
                <div class="container-fluid overflow-auto" style=" border: 1px solid black;">
                        <table class="table table-sm">
                                <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Alias</th>
                                <th scope="col">Telefonnummer</th>
                                <th scope="col">Fahndung</th>
                                <th scope="col-4"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include("./dist/config/mysql.php");
                                require("./dist/config/mysql.php");
                                $stmt = $mysql->prepare("SELECT * FROM akten");
                                $stmt->execute();
                                while($row = $stmt->fetch()) {
                                        if($row['IS_GEFAHNDET'] == 'on') {
                                        ?>
                                        <tr>
                                        <td><?php echo $row['Vollständiger_Name'] ?></td>
                                        <td><?php echo $row['Aliases'] ?></td>
                                        <td><?php echo $row['Telefonnummer'] ?></td>
                                        <?php if($row['IS_GEFAHNDET'] == "on") { ?>
                                                <td><?php echo 'Nein' ?></td>
                                        <?php } else { ?>
                                                <td><?php echo 'Ja' ?></td>
                                        <?php } ?>
                                        <?php if($_SESSION['power'] >= 10) { ?>
                                        <td><?php echo '<a href="index.php?p=interface&c=akten&id=' . $row['ID'] . '"><i class="fas fa-user-edit"></i></a>'; ?></td>
                                        <?php } ?>    
                                        </tr>
                                        <?php
                                        }
                                }
                                ?>
                                </tbody>
                        </table>
                </div>
