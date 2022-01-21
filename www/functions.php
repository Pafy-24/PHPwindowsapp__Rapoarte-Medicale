<?php
    function sortbydateReturnedDiag(array $IDdiag){
        $ok =false;
        while($ok==false){    
            $ok = true;                                                                                  
            for($i=1; $i< count($IDdiag); ++$i){
                if($IDdiag[$i]['Data'] > $IDdiag[$i+1]['Data']){
                    $ok=false;
                    $aux = $IDdiag[$i]['Data'];
                    $IDdiag[$i]['Data'] = $IDdiag[$i+1]['Data'];
                    $IDdiag[$i+1]['Data'] = $aux;
                    $aux = $IDdiag[$i]['ID'];
                    $IDdiag[$i]['ID'] = $IDdiag[$i+1]['ID'];
                    $IDdiag[$i+1]['ID'] = $aux;
                }
            }
        }
        return  $IDdiag;
    }
?>