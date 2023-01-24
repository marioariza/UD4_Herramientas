<?php

include_once 'PasteleriaException.php';

class ClienteNoEncontrado extends PasteleriaException {

    function CliNoEnc () {
        $ve = new PasteleriaException();
        $ve->ClienteNoEncontrado();
    }
}

?>