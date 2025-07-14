<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="nav-menu">
    <a class="nav-link <?php echo ($current_page === 'index.php') ? 'active' : ''; ?>" href="index.php">HOME</a> |
    <a class="nav-link <?php echo (in_array($current_page, ['shipping.php', 'deleteShipping.php'])) ? 'active' : ''; ?>" href="shipping.php">SHIPPING</a> |
    <a class="nav-link <?php echo (in_array($current_page, ['billing.php', 'deleteBilling.php'])) ? 'active' : ''; ?>" href="billing.php">BILLING</a> |
    <a class="nav-link <?php echo ($current_page === 'account.php') ? 'active' : ''; ?>" href="account.php">ACCOUNT INFO</a>
</div>