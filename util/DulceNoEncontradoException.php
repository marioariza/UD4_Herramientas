<?php 

include_once 'PasteleriaException.php';

class DulceNoEncontrado extends PasteleriaException {

    function DulcNoEnc () {
        $ve = new PasteleriaException();
        $ve->DulceNoEncontrado();
    }
}

?>