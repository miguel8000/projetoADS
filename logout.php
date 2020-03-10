<?php
session_start();
session_destroy();
header('Location: indexHome.html');
exit();