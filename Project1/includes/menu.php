<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    .nav-link {
        color: #555;
        text-decoration: none;
        font-weight: bold;
        margin: 0 15px;
        position: relative;
        padding-bottom: 3px;
        font-size: 16px;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:not(.active)::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 3px;
        background-color: #222;
        transition: width 0.4s ease-in-out;
        transform-origin: left;
    }

    .nav-link:hover::after {
        width: 100%;
        transform-origin: left;
    }

    .nav-link.active {
        color: #f2f2f2;
        font-weight: bold;
        text-decoration: none;
        background-color: #444;
        border-radius: 5px;
        padding: 5px 10px;
    }

    .nav-menu {
        text-align: center;
        padding-bottom: 20px;
    }
</style>

<div class="nav-menu">
    <a class="nav-link <?php echo ($current_page === 'select.php') ? 'active' : ''; ?>" href="select.php">SELECT</a> | 
    <a class="nav-link <?php echo ($current_page === 'insert.php') ? 'active' : ''; ?>" href="insert.php">INSERT</a>
</div>