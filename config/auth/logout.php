<?php
require_once('../config.php');
if (isset($_GET['logout'])) {
    session_destroy();
    header('location: ' . base_url('login'));
}
