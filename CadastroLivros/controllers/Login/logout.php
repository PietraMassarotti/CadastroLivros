<?php
session_start();
session_destroy();
header("Location: ../../public/Login/index.php");
exit();
