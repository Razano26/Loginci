<?php

    include '../function.php';

    update_anonymisation($_GET['data']);

    header('Location: ../../index.php?page=2');
    exit();