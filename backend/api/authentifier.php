<?php

require 'commun_services.php';


if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
    ProduceErrorRequest();
    return;
}
