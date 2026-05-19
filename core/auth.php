<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php?c=InicioSesion&a=index");
    exit;
}