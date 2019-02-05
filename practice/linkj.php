<!DOCTYPE html>
<?php
require "func.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>practice mock</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
</head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="bg-light">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">

                    #
                </a>
                <ul class="collapse show list-unstyled" id="pageSubmenu">
                    <?php getBs(); ?>
                </ul>
            </li>
        </ul>
    </nav>
    <nav id="sidebar" class="bg-light">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">

                   Domains
                </a>
                <ul class="collapse show list-unstyled" id="pageSubmenu">
                    <?php getBrands(); ?>
                </ul>
            </li>
        </ul>
    </nav>
    <nav id="sidebar" class="bg-light">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">

                    info
                </a>
                <ul class="collapse show list-unstyled" id="pageSubmenu">
                    <?php gets(); ?>
                </ul>
            </li>
        </ul>
    </nav>

</div>
<footer class="container-fluid">
</footer>
<script src="jquery-3.3.1.js"></script>






<script src="bootstrap.bundle.js"></script>
</body>
</html>