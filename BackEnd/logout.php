<?php
session_start();
session_destroy();
header('Location: ../FrontEnd/index.html');
exit();