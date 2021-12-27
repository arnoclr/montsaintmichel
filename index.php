<?php

include "includes/head.php";

?>

<link rel="stylesheet" href="/src/styles/pages/index.css?v=<?= md5(filemtime($_SERVER['DOCUMENT_ROOT'] . '/src/styles/pages/index.css')) ?>">

<img src="/resize_image.php?url=index__couverture.jpg&size=small" alt="">
<h1>Hello World !</h1>