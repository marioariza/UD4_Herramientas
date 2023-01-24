<?php 

include_once 'PasteleriaException.php';

class DulceNoComprado extends PasteleriaException {

    function DulNoComp () {
        $ve = new PasteleriaException();
        $ve->DulceNoComprado();
    }
}

?>