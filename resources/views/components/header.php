<?php 
session_start();
if (isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    exit;
}
require_once __DIR__.'/../../../config/config.php'; ?>

<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/public_html/img/logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/resources/views/meldingen/index.php">Meldingen</a>
        </nav>
        <div>
            <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
        </div>
    </div>
</header>
