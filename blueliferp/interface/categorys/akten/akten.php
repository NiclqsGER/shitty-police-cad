                <?php 
                if(!isset($_GET['id'])) {
                if($_SESSION['power'] >= 5) {?>
                        <a href="index.php?p=interface&c=addakte" class="btn btn-success" style="width:100%; margin-bottom: 25px;">Akte hinzufügen</a>
                <?php }} ?>

                <?php if(isset($_GET['id'])) { ?>
                <div class="card" style="margin-bottom: 25px;">
                                <div class="card-body">
                                        <?php 
                                        require("./dist/config/mysql.php");
                                        $stmt = $mysql->prepare("SELECT * FROM akten WHERE ID= :id");
                                        $stmt->bindParam(":id", $_GET['id']);
                                        $stmt->execute();
                                        while($row = $stmt->fetch()) {
                                        ?>
                                        <h5 class="card-title"><?php echo "Akte von " . $row['Vollständiger_Name'] ?></h5>
                                        <br>
                                        <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Aliases</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Aliases'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Geschlecht</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Geschlecht'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Telefonnummer</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Telefonnummer'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Groeße</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Groeße'] . "cm" ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Geburtstag</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Geburtstag'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Augenfarbe</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Augenfarbe']  ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Haarfarbe</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Haarfarbe'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="form-group">
                                                                <label>Sonstiges</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['Sonstiges']  ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                                                <br>
                                                        <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin-top: 5px;">
                                                                        <label>Motorradführerschein</label>
                                                                        <?php 
                                                                        if($row['MotorradFR'] == "on") { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Ja" readonly>
                                                                        <?php } else { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Nein" readonly>

                                                                        <?php } ?>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin-top: 5px;">
                                                                        <label>Autoführerschein</label>
                                                                        <?php 
                                                                        if($row['PKWFR'] == "on") { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Ja" readonly>
                                                                        <?php } else { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Nein" readonly>

                                                                        <?php } ?>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin-top: 5px;">
                                                                        <label>LKW-Führerschein</label>
                                                                        <?php 
                                                                        if($row['LKWFR'] == "on") { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Ja" readonly>
                                                                        <?php } else { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Nein" readonly>

                                                                        <?php } ?>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin-top: 5px;">
                                                                        <label>Waffenschein</label>
                                                                        <?php 
                                                                        if($row['WaffenFR'] == "on") { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Ja" readonly>
                                                                        <?php } else { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Nein" readonly>

                                                                        <?php } ?>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin-top: 15px;">
                                                                        <label>Gefahndet?</label>
                                                                        <?php 
                                                                        if($row['IS_GEFAHNDET'] == "on") { ?>
                                                                                <input class="form-control border-danger" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Ja" readonly>
                                                                        <?php } else { ?>
                                                                                <input class="form-control" style="width: 100%; text-align: center;" type="text" placeholder="Readonly input here…" value="Nein" readonly>

                                                                        <?php } ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                                <div class="col-12 col-sm-6 col-md-6 col-xl-2">
                                                        <a href="index.php?p=interface&c=editakten&id=<?php echo $row['ID'] ?>" class="btn btn-success" style="width: 100%">Akte bearbeiten</a>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6 col-xl-2">
                                                        <a href="#" class="btn btn-danger" style="width: 100%;">Akte löschen</a>
                                                </div>
                                        </div>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                        <div class="card">
                                                <div class="card-header">
                                                        Bußgelder (Offene: 0 | Geschlossene: 0)
                                                        <div class="float-right">
                                                                <a href="index.php?p=interface&c=add&f=bg&id=<?php echo $_GET['id'] ?>" class="">Bußgeld hinzufügen</a>
                                                        </div>
                                                </div>
                                                <div class="card-body">
                                                        
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                        <div class="card">
                                                <div class="card-header">
                                                        Straftaten (Offene: 0 | Geschlossene: 0)
                                                        <div class="float-right">
                                                                <a href="index.php?p=interface&c=add&f=bg&id=<?php echo $_GET['id'] ?>" class="">Straftat hinzufügen</a>
                                                        </div>
                                                </div>
                                                <div class="card-body">
                                                        
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <?php } else { ?>
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
                                require("./dist/config/mysql.php");
                                $stmt = $mysql->prepare("SELECT * FROM akten");
                                $stmt->execute();
                                while($row = $stmt->fetch()) {
                                ?>
                                <tr>
                                <td><?php echo $row['Vollständiger_Name'] ?></td>
                                <td><?php echo $row['Aliases'] ?></td>
                                <td><?php echo $row['Telefonnummer'] ?></td>
                                <?php if($row['IS_GEFAHNDET'] == 0) { ?>
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
                                ?>
                                </tbody>
                        </table>
                </div>
                <?php } ?>
