<?php

//destruye la variable de sesion actual y redirige al logIn

session_start();
session_destroy();

header('Location: ../index.php');
