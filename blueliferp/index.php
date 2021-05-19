<?php 
    session_start();
    require('./dist/config/conf.php');

    if(!isset($_GET['p'])) {
        if(isset($_SESSION["username"])) {
            $page = "interface";
        } else {
            $page = "login";
        }
    } else {
        if(htmlspecialchars($_GET['p']) == null) {
            if($_SESSION["username"]) {
                $page = "interface";
            } else {
                $page = "login";
            }
        } else {
            $page = htmlspecialchars(strtolower($_GET['p']));
        }
    }

    if(!file_exists("./interface/" . $page)) {
        if(isset($_SESSION["username"])) {
            $page = "interface";
        } else {
            $page = "login";
        }
    }

    if($page == "interface") {
        if(isset($_GET['c'])) {
            $category = htmlspecialchars($_GET['c']);
        } else {
            $category = 'start';
        }
    }

    if($page == "login") {
        if(isset($_SESSION["username"])) {
            $page = "interface";
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="blueliferp interface">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if($page == 'interface') { ?>
<title><?php echo(ucfirst($page) . " [" . /*ucfirst($category) .*/ "C]" . " - " . $servername) ?></title>
<link rel="stylesheet" href="<?php echo('./interface/categorys/' . $category . '/' . $category . '.css'); ?>">
        <?php } else { ?>
<title><?php echo(ucfirst($page) . " - " . $servername) ?></title>
        <?php } 
        ?><!-- Framework(s) / CSS(s) -->
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap-grid.css">
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="./dist/framework/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo './interface/' . $page . '/' . $page . '.css'; ?>">
        <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <!-- Script(s) -->
        <script src="./dist/framework/jquery/js/jquery-3.5.1.min.js"></script>
        <script src="./dist/framework/fontawesome/js/fontawesome.js"></script>
        <script src="./dist/framework/bootstrap/js/bootstrap.js"></script>
        <script src="./dist/framework/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="./dist/framework/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./dist/framework/bootstrap/js/bootstrap.min.js"></script>
        <script src="./dist/framework/popperjs/js/popper.js"></script>
        <script src="<?php echo('./interface/' . $page . '/' . $page . '.js'); ?>"></script>
    </head>
    <body><?php 
        include_once('./interface/' . $page . "/" . $page . ".php");  
    ?>
    </body>
</html>