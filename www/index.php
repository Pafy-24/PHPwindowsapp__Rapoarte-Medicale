<!DOCTYPE html>
<html>
<head>
        <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
        <link rel="stylesheet" type="text/css" href="/css/table.css"/>
        <link rel="stylesheet" type="text/css" href="/css/search.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
        
        <script src="/js/jquery.min.js"></script>
</head>
<?php
    include 'php-database.php';
    //include 'functions.php';
    
?>
<?php
    function sortbydateReturnedDiag(array $IDdiag){
        $ok =false;
        while($ok==false){    
            $ok = true;                                                                                  
            for($i=1; $i< count($IDdiag); ++$i){
                if($IDdiag[$i]['Data'] < $IDdiag[$i+1]['Data']){
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
<body>
    <div class="top">
        <div class="search-container">
            <form method="post">
                <div class="search-box">
                    <input id="SEARCH" name="q" type="search" placeholder="Căutare..." />
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </div>
                <div class="search-in">
                    <select name="where2search">
                        <option value="Nume" selected="selected">Nume</option>
                        <option value="Prenume">Prenume</option>
                        <option value="Varsta">Varsta</option>
                        <option value="telefon">Telefon</option>
                        <option value="CNP">CNP</option>
                        <!--<option>*Data*</option>-->
                    </select>
                </div>
            </form>
        </div>
        <div class="editor">
            <button onclick="location.href='/add_pacient.php'" class="new" title="Adaugă un pacient" name="edit-action" value="plus" ><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="spacerX-50px"></div>
    <?php
        if(isset($_POST['q']) && $_POST['q']!= null && $_POST['q']!= ''){
            echo '
                <h1>Search Result For '.$_POST['q'].' in '.$_POST['where2search'].'</h1>
            ';
        }
    ?>
    <div class="results">

        <table>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Varsta</th>
                <th>Telefon</th>
                <th>CNP</th>
                <th>Judet</th>
                <th>Localitate</th>
                <th>Opțiuni</th>
            </tr>
            

            <?php
            //$sql= "INSERT INTO pacienti ('ID', 'Nume', 'Prenume', 'Varsta', 'Telefon', 'Medic Consultant') values ('1','Romas','Mihaela','46','0732125724','Cristescu')";
            $sql='';
            $db->query($sql);
            $sql = "SELECT * FROM pacienti";
            $result = $db->query($sql);
            while($row = $result->fetchArray(SQLITE3_ASSOC)){
                $valide = false;
                if(isset($_POST['q']) and $_POST['q']!= null and $_POST['q']!= ''){
                    $found=stripos($row[$_POST['where2search']], $_POST['q']);
                    //echo $found.'<br />';
                    if(is_numeric($found)){
                        $valide=true;
                    } else {
                        $valide = false;
                    }
                } else {
                    $valide = true;
                }


                if($valide == true){
                    $sql="SELECT * FROM Rope WHERE PacientID = '".$row["ID"]."'";
                    $q = $db->query($sql);

                    $i=0;
                    while($qq = $q->fetchArray(SQLITE3_ASSOC)){
                        $IDdiag[++$i]['ID'] = $qq['DiagnosticID'];
                        $id = $qq['DiagnosticID']; 
                        $sql = "SELECT Data FROM diagnostice WHERE ID = $id";
                        $data = $db->query($sql);
                        $data = $data->fetchArray(SQLITE3_ASSOC);
                        $data = $data['Data'];
                        $IDdiag[$i]['Data'] = $data;
                    }
                    


                    echo '<tr title="'.$row['Nume'].' '.$row['Prenume'].'">';
                        echo '<td>'.$row['Nume'].'</td>';
                        echo '<td>'.$row['Prenume'].'</td>';
                        echo '<td>'.$row['Varsta'].'</td>';
                        echo '<td>'.$row['telefon'].'</td>';
                        echo '<td>'.$row['CNP'].'</td>';
                        echo '<td>'.$row['Judet'].'</td>';
                        echo '<td>'.$row['Localitate'].'</td>';
                        $day=date("d");
                        $luna=date("m");
                        $year=date("Y");
                        echo '
                        <td class="drop-down" style="text-align:center" title="Diagnostice">
                            <button style="width:30px; height:30px;" onclick="drop(\''.$row['ID'].'\')">▼</button>
                            <form action="/add_pacient.php" method="post" style="display:inline">
                                <button name="action" value="editpac" style="width:30px; height:30px;" title="Edit"><i class="far fa-edit" font-size="30px"></i></button>
                                <input type="hidden" name="nume" value="'.$row['Nume'].'" /> 
                                <input type="hidden" name="prenume" value="'.$row['Prenume'].'" />
                                <input type="hidden" name="cnp" value="'.$row['CNP'].'" /> 
                                <input type="hidden" name="jud" value="'.$row['Judet'].'" />
                                <input type="hidden" name="ani" value="'.$row['Varsta'].'" /> 
                                <input type="hidden" name="loc" value="'.$row['Localitate'].'" />  
                                <input type="hidden" name="tel" value="'.$row['telefon'].'" /> 
                                <input type="hidden" name="id" value="'.$row['ID'].'" />      
                            </form>
                            <form action="/imprimare_document.php" method="post" style="display:inline">
                                <button name="action" value="adddiag" style="width:30px; height:30px;" title="Adauga Diagnostic"><i class="fa fa-plus"></i></button>                                            
                                <button name="action" value="delpaci" style="width:30px; height:30px;" title="Sterge pacient"><i class="fa fa-trash"></i></button>  
                                <input type="hidden" name="nume" value="'.$row['Nume'].'" /> 
                                <input type="hidden" name="prenume" value="'.$row['Prenume'].'" />
                                <input type="hidden" name="cnp" value="'.$row['CNP'].'" /> 
                                <input type="hidden" name="jud" value="'.$row['Judet'].'" />
                                <input type="hidden" name="ani" value="'.$row['Varsta'].'" /> 
                                <input type="hidden" name="loc" value="'.$row['Localitate'].'" />  
                                <input type="hidden" name="id" value="'.$row['ID'].'" />  
                            </form>
                        </td>';
                        echo '
                            <script>
                                function drop(id){
                                    var list = document.getElementsByClassName(id);
                                    for(var i=0; i<list.length; ++i){
                                        var diagnostic=list.item(i);
                                        if(diagnostic.style.display == "none"){
                                            diagnostic.style.display="table-row";
                                        } else {
                                            diagnostic.style.display="none";
                                        }
                                    }
                                }
                            </script>
                        ';
                    
                    echo '</tr>';
                    echo '
                        <tr id="diagnostic" class="'.$row['ID'].'" style="display: none;border:0;">
                            <td style="border:0;"></td>
                            <th colspan="6">Data Diagnosticului</th>
                            <td></td>
                        </tr>
                    ';
                    if(isset($IDdiag)){
                        $IDdiag = sortbydateReturnedDiag($IDdiag);
                        for($i=1; $i<=count($IDdiag); ++$i){
                            $sql="SELECT * FROM diagnostice WHERE ID = '".$IDdiag[$i]['ID']."'";
                            $q = $db->query($sql);
                            $Diagnostic = $q->fetchArray(SQLITE3_ASSOC);

                            echo '
                                <tr id="diagnostic" class="'.$row['ID'].'" style="display: none;border:0;">
                                    <td style="border:0;">
                                    <i class="fas fa-angle-double-right" style="font-size: 50px;"></i>
                                    </td>
                                    <td colspan="6">'.$Diagnostic['Data'].'</td>
                                    <td style="text-align:center">
                                        <form method="post" action="/imprimare_document.php">
                                            <button name="action" value="editdiag" style="width:30px; height:30px;" title="Edit"><i class="far fa-edit" font-size="30px"></i></button>
                                            <button name="action" value="print" style="width:30px; height:30px;" title="Print"><i class="fas fa-print" font-size="30px"></i></button>
                                            <button name="action" value="deldiag" style="width:30px; height:30px;"><i class="fa fa-trash" font-size="30px"></i></button>
                                            <input type="hidden" name="id" value="' . $row['ID'] . '" /> 
                                            <input type="hidden" name="diagid" value="' . $IDdiag[$i]['ID'] . '" />
                                        </form>
                                    </td>
                                </tr>
                            ';
                        }
                        $IDdiag = null;
                    }
                }
            }
        ?>
        
        </table>
    </div>
</body>
</html>