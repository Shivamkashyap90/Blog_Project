<?php
session_start();
echo "Loging out please wait.";
session_unset();
session_destroy();
header("Location: /blog_website?logout=true");
