<?php include "php-database.php"; ?>
    <?php
    if (isset($_POST['decisionpac'])) {
        if ($_POST['decisionpac'] == 'yes') {
            $id = $_POST['id'];
            $sql= "SELECT * FROM Rope WHERE PacientID = $id";
            $ropes = $db->query($sql);
            while($rope = $ropes->fetchArray(SQLITE3_ASSOC)){
                $diagnostic = $rope['DiagnosticID'];
                ECHO $diagnostic;
                $sql="DELETE FROM diagnostice WHERE ID = $diagnostic";
                $db->query($sql);
                $sql = "DELETE FROM part2diag where DiagAtt = $diagnostic";
                $db->query($sql);
            }

            $sql = "DELETE FROM Rope where PacientID = $id";
            $db->query($sql);
            $sql = "DELETE FROM pacienti where ID = $id";
            $db->query($sql);
            //header("Location: ../");
        }
        echo '
                <html>
                    <head>
                        <title>Raport medical</title>
                        <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                        <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                        <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                        <script src="/js/jquery.min.js"></script>
                    </head>
                    <body>
                        <div class="top">
                            <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
            
                        </div>
                    </body>
                    
                </html';
    
    }
    ?>
    <?php
    if (isset($_POST['decisiondiag'])) {
        if ($_POST['decisiondiag'] == 'yes') {
            $id = $_POST['diagid'];
            $sql = "DELETE FROM Rope where DiagnosticID = $id";
            $db->query($sql);
            $sql = "DELETE FROM diagnostice where ID = $id";
            $db->query($sql);
            $sql = "DELETE FROM part2diag where DiagAtt = $id";
            $db->query($sql);
           // header("Location: ../");
        }
        echo '
                <html>
                    <head>
                        <title>Raport medical</title>
                        <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                        <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                        <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                        <script src="/js/jquery.min.js"></script>
                    </head>
                    <body>
                        <div class="top">
                            <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
            
                        </div>
                    </body>
                    
                </html';
            
    }
    ?>
     <?php
    if (isset($_POST['action']) and $_POST['action'] == "deldiag") {

        echo '
                    <html>
                        <head>
                            <title>Raport medical</title>
                            <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                            <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                            <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                            <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                            <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                            <script src="/js/jquery.min.js"></script>
                        </head>
                        <body>
                            <div class="advertisment">
                                <div class="top">
                                    <i class=\'fas fa-exclamation-triangle\' style=\'color:yellow; background-color:black; border-radius:2px;\'></i>
                                    Sigur doriți să ștergerea acestui diagnostic?
                                </div>
                                <div class="bottom">
                                    <form method="post">
                                        <button id="da" name="decisiondiag" value="yes">Da</button>
                                        <button id="nu" name="decisiondiag" value="no">Nu</button>
                                        
                                        <input type="hidden" name="diagid" value="' . $_POST['diagid'] . '" /> 
                                    </form>
                                </div>
                            </div>
                        </body>
                    </html>
                ';

        die();
    }
    ?>
    <?php
    if (isset($_POST['action']) and $_POST['action'] == "delpaci") {

        echo '
                        <head>
                            <title>Raport medical</title>
                            <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                            <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                            <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                            <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                            <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                            <script src="/js/jquery.min.js"></script>
                        </head>
                        <body>
                            <div class="advertisment">
                                <div class="top">
                                    <i class=\'fas fa-exclamation-triangle\' style=\'color:yellow; background-color:black; border-radius:2px;\'></i>
                                    Sigur doriți să ștergerea acestui pacient?
                                </div>
                                <div class="bottom">
                                    <form method="post">
                                        <button id="da" name="decisionpac" value="yes">Da</button>
                                        <button id="nu" name="decisionpac" value="no">Nu</button>
                                        
                                        <input type="hidden" name="id" value="' . $_POST['id'] . '" />  
                                    </form>
                                </div>
                            </div>
                        </body>
                    </html>
                ';

        die();
    }
    ?>
    <?php 
        if(isset($_POST['save'])){
            $day = $_POST['day'];
            $luna = $_POST['luna'];
            $year = $_POST['year'];
            $data= $day.'/'.$luna.'/'.$year;
            $mlp=$_POST['MLP'];                              $ODPIAO=$_POST['PIAOD'];           $OD_exFAO=$_POST['FAOD'];
            $APP=$_POST['APP'];                              $OSPIAO=$_POST['PIAOS'];           $OS_exFAO=$_POST['FAOS'];
            $AHC=$_POST['AHC'];                              $OD_exLF=$_POST['LFD'];             
            $ODAV=$_POST['AVD'];                             $OS_exLF=$_POST['LFS'];          
            $OSAV=$_POST['AVS'];                             $Diag=$_POST['Diagnostic'];        $Tratament=$_POST['Tratament'];

            
            $ODSFdist   =   $_POST['ODSFdist'];                                $OSSFdist    =   $_POST['OSSFdist'];             
            $ODCYLdist  =   $_POST['ODCYLdist'];                               $OSCYLdist   =   $_POST['OSCYLdist'];   
            $ODAXdist   =   $_POST['ODAXdist'];                                $OSAXdist    =   $_POST['OSAXdist'];  
            $ODSFap     =   $_POST['ODSFap'];                                  $OSSFap      =   $_POST['OSSFap'];             
            $ODCYLap    =   $_POST['ODCYLap'];                                 $OSCYLap     =   $_POST['OSCYLap'];   
            $ODAXap     =   $_POST['ODAXap'];                                  $OSAXap      =   $_POST['OSAXap'];             
            $DPdist     =   $_POST['DPdist'];                                  $DPap        =   $_POST['DPap'];   



            if(isset($_POST['diagid'])){
                $diagid = $_POST['diagid'];
                $sql="  UPDATE diagnostice 
                        SET [Data] = '$data', MotiveLaPrezentare='$mlp', APP='$APP', 
                            AHC='$AHC', ODAV='$ODAV', OSAV='$OSAV', ODPIAO='$ODPIAO', 
                            OSPIAO='$OSPIAO', OD_exLF='$OD_exLF', OS_exLF='$OS_exLF',
                            OD_exFAO='$OD_exFAO', OS_exFAO='$OS_exFAO', Diagnostic='$Diag', 
                            Tratament='$Tratament'
                        WHERE ID = $diagid";
               // $sqlqwe = "UPDATE pacienti SET Nume='$nume', Prenume='$prenume', Varsta='$age', telefon='$tel', CNP='$cnp', Judet='$jud', Localitate='$loc' WHERE ID='$id'";
                $db->query($sql);
                $sql="  UPDATE part2diag 
                        SET ODSFdist = '$ODSFdist', OSSFdist='$OSSFdist',   ODSFap='$ODSFap',   OSSFap='$OSSFap',
                            ODCYLdist='$ODCYLdist', OSCYLdist='$OSCYLdist', ODCYLap='$ODCYLap', OSCYLap='$OSCYLap', 
                            ODAXdist='$ODAXdist',   OSAXdist='$OSAXdist',   ODAXap='$ODAXap',   OSAXap='$OSAXap',
                            DPdist='$DPdist', DPap='$DPap'
                        WHERE DiagAtt = $diagid";
                $db->query($sql);
                //header("Location: ../");
                echo '
                <html>
                    <head>
                        <title>Raport medical</title>
                        <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                        <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                        <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                        <script src="/js/jquery.min.js"></script>
                    </head>
                    <body>
                        <div class="top">
                            <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
            
                        </div>
                    </body>
                    
                </html';
            
            } else {
                $sql="INSERT INTO diagnostice(
                    Data, MotiveLaPrezentare, APP, AHC, ODAV, OSAV, ODPIAO, OSPIAO, OD_exLF, OS_exLF, OD_exFAO, OS_exFAO, Diagnostic, Tratament
                ) VALUES (
                    '$data', '$mlp', '$APP', '$AHC', '$ODAV', '$OSAV', '$ODPIAO', '$OSPIAO', '$OD_exLF', '$OS_exLF', '$OD_exFAO', '$OS_exFAO', '$Diag', '$Tratament'
                );";
                $db->query($sql);

                $sql="SELECT * FROM diagnostice WHERE Data='$data'AND MotiveLaPrezentare='$mlp'AND APP='$APP'AND AHC='$AHC'AND ODAV='$ODAV'AND OSAV='$OSAV'AND ODPIAO='$ODPIAO'AND OSPIAO='$OSPIAO'AND
                OD_exLF='$OD_exLF'AND OS_exLF='$OS_exLF'AND OD_exFAO='$OD_exFAO'AND OS_exFAO='$OS_exFAO'AND Diagnostic='$Diag'AND Tratament='$Tratament'
                ";
            
                $diagid =  $db->query($sql);
                $diagid = $diagid->fetchArray(SQLITE3_ASSOC);
                $diagid = $diagid['ID'];

                $pacid = $_POST['id'];

                $sql = "INSERT INTO Rope(PacientID, DiagnosticID) values ('$pacid', '$diagid')";
                $db->query($sql);
                

                $sql="INSERT INTO part2diag(
                    DiagAtt, ODSFdist, OSSFdist, ODSFap, OSSFap, ODCYLdist, OSCYLdist, ODCYLap, OSCYLap, ODAXdist, OSAXdist, ODAXap, OSAXap, DPdist, DPap
                ) VALUES (
                    '$diagid', '$ODSFdist', '$OSSFdist', '$ODSFap', '$OSSFap', '$ODCYLdist', '$OSCYLdist', '$ODCYLap', '$OSCYLap', '$ODAXdist', '$OSAXdist', '$ODAXap', '$OSAXap', '$DPdist', '$DPap'
                );";
                $db->query($sql);


               // header("Location: ../");
               echo '
               <html>
                   <head>
                        <title>Raport medical</title>
                        <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                        <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                        <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                        <script src="/js/jquery.min.js"></script>
                   </head>
                   <body>
                       <div class="top">
                           <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
           
                       </div>
                   </body>
                   
               </html';
           
            }
        }
    ?>
    <?php
    if (isset($_POST['action']) and $_POST['action'] == "adddiag") {

        $day = date("d");
        $luna = date("m");
        $year = date("Y");

        echo '
            <html>
                <head>
                    <title>Raport medical</title>
                    <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                    <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                    <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                    <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                    <script src="/js/jquery.min.js"></script>
                    <style>
                        table td {
                            position: relative;
                        }
                
                        input::-webkit-outer-spin-button,
                        input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                        }
                
                        /* Firefox */
                        input[type=number] {
                        -moz-appearance: textfield;
                        }
                        
                        table td input {
                            text-align:center;
                            display: inline-block;
                            margin: 0;
                            margin-left: 0;
                            margin-right: 0;
                            left: 0;
                            right: 0;
                            height: 100%;
                            width: 100%;
                            border: none;
                            padding: 10px;
                            box-sizing: border-box;
                        }
                        
                        textarea{
                            display: inline-block;
                            margin: 0;
                            height: 100%;
                            width: 100%;
                            border: none;
                            padding: 10px;
                            box-sizing: border-box;
                        }
                    </style>
                    <style>
                         textarea{
                             overflow: hidden; overflow-wrap: break-word; resize: vertical;
                         }
                    </style>
                
                </head>
                
                <body onload="init();">
                    <script>
                        window.onscroll = function() {myFunction()};

                        var navbar = document.getElementById("top");
                        var sticky = navbar.offsetTop;

                        function myFunction() {
                            if (window.pageYOffset >= sticky) {
                                navbar.classList.add("sticky")
                            } else {
                                navbar.classList.remove("sticky");
                            }
                        }
                    </script>
                    <form method="post">
                        <div class="top">
                            <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
                        
                            <button name="save" value="save" class="print" onclick="" title="save"><i class="fas fa-save"></i></button>
                            <input type="hidden" name="nume" value="'.$_POST['nume'].'" />
                            <input type="hidden" name="prenume" value="'.$_POST['prenume'].'" />
                            <input type="hidden" name="cnp" value="'.$_POST['cnp'].'" />
                            <input type="hidden" name="jud" value="'.$_POST['jud'].'" />
                            <input type="hidden" name="ani" value="'.$_POST['ani'].'" />
                            <input type="hidden" name="loc" value="'.$_POST['loc'].'" />
                            <input type="hidden" name="id" value="'.$_POST['id'].'" />
                        
                        </div>
                        <div>
                            <div class="logo" style="display:inline-block; width:100px; float:left">
                                <img src="/img/logo.png" width="100px" />\
                            </div>

                            <div class="contact" style="display:inline-block; float:right">
                                <p><b>Adresa:</b>România, jud. Suceava, </p><p>loc. Suceava, str. Mărășești, nr. 48</p>
                                <p><b>Telefon:</b><span>0230 523 055</span></p>
                            </div>
            
                            <div style="display:inline-block;">
                                <h3>SC GLAUCOS MEDICAL SRL</h3>
                            </div>
                        </div>
                
                        <div class="spacerX-20px"></div>
                        <h1 style="Text-align:center;">Raport Medical</h1>
                        <div class="spacerX-25px"></div>
                        <table style="width:100%;border-collapse:collapse;border:none;">
                            <tbody>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-bottom:solid black 1pt">
                                        Data consulta&#355;iei
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:double black 1.5pt;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        
                    
                                        <input name="day" type="number" style="width: 40px;" value="' . $day . '"/>/
                                        <input name="luna" type="number" style="width: 40px;" value="' . $luna . '" />/
                                        <input name="year" type="number" style="width: 50px;" value="' . $year . '" />
                    
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Date pacient
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        ' . $_POST['nume'] . ' ' . $_POST['prenume'];
                                        if(isset($_POST['ani']) && $_POST['ani']!='') echo ', ' . $_POST['ani'] . 'ani'; 
                                        if(isset($_POST['cnp']) && $_POST['cnp']!='') echo ', CNP:' . $_POST['cnp'];
                                        if(isset($_POST['jud']) && $_POST['jud']!='') echo ', Jude&#355;:' . $_POST['jud'];
                                        if(isset($_POST['loc']) && $_POST['loc']!='') echo ', Localitate:' . $_POST['loc'] ;
                                        echo '
                                        <!--<input type="text" name="Nume" value="" style="width:50%" /><input type="text" name="PreNume" value="" style="width:50%" />-->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Motive la prezentare
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        <textarea id="text"type="text" name="MLP" value=""></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        APP
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text"type="text" name="APP" value="" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-top:none; border-bottom: solid black 1pt;">
                                        AHC
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none; border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AHC" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt; border-top:none; border-bottom:solid black 1pt;"></td>
                                    <td width="350" style="width:210.0pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <p style="text-align:center;">OD</p>
                                    </td>
                                    <td width="346" style="width:207.8pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <p style="text-align:center;">OS</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        AV
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AVD" value="" />
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AVS" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        PIAO
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="PIAOD" value="" />
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="PIAOS" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Ex. LF
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text"type="text" name="LFD" value="" ></textarea>
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="LFS" value="" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Ex. FAO
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="FAOD" value="" ></textarea>
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="FAOS" value="" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Diagnostic
                                        <br/>
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text"type="text" name="Diagnostic" value="" required ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-top:none">
                                        Tratament
                                        <br/>
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt">
                                        <textarea id="text"type="text" name="Tratament" value="" required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <div class="spacerX-25px"></div>
                        <div style="float:left; width:70%;">
                            <table class="surplus">
                                <tr>
                                    <td rowspan="2"></td>
                                    <td colspan="3">OD</td>
                                    <td colspan="3">OS</td>
                                    <td rowspan="2">D.P.</td>
                                </tr>
                                <tr>
                                    <th>SF</th>
                                    <th>CYL</th>
                                    <th>AX</th>
                                    <th style="border-left: double black 1.5pt;">SF</th>
                                    <th>CYL</th>
                                    <th>AX</th>
                                </tr>
                                <tr>
                                    <th style="border: double black 1.5pt; text-align: left;">Distanță</th>
                                    <td>
                                        <input name="ODSFdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="ODCYLdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="ODAXdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSSFdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSCYLdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSAXdist" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="DPdist" type="number " style="width: 100%; height:100%; " value=" " />
                                    </td>
                                </tr>
                                <tr>
                                    <th style="border: double black 1.5pt; text-align: left;">Aproape</th>
                                    <td>
                                        <input name="ODSFap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="ODCYLap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="ODAXap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSSFap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSCYLap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="OSAXap" type="number " style="width: 100%; " value=" " />
                                    </td>
                                    <td>
                                        <input name="DPap" type="number " style="width: 100%; height:100%; " value=" " />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="float:right; text-align:center; width:30%;">
                            <div class="spacerX-10px"></div>
                            <span style="text-align:center;">Dr.</span><br/>
                            <span>Martiniuc Georgeta</span>
                            <br/><br/>
                            <div class="spacerX-50px"></div>
                        </div>
                        <script>
                            autosize(document.querySelectorAll(\'textarea\'));
                            var observe;
                                if (window.attachEvent) {
                                    observe = function (element, event, handler) {
                                        element.attachEvent(\'on\'+event, handler);
                                    };
                                }
                                else {
                                    observe = function (element, event, handler) {
                                        element.addEventListener(event, handler, false);
                                    };
                                }
                                function init () {
                                    var text = document.getElementById(\'text\');
                                    function resize () {
                                        text.style.height = \'auto\';
                                        text.style.height = text.scrollHeight+\'px\';
                                    }
                                    /* 0-timeout to get the already changed text */
                                    function delayedResize () {
                                        window.setTimeout(resize, 0);
                                    }
                                    observe(text, \'change\',  resize);
                                    observe(text, \'cut\',     delayedResize);
                                    observe(text, \'paste\',   delayedResize);
                                    observe(text, \'drop\',    delayedResize);
                                    observe(text, \'keydown\', delayedResize);

                                    text.focus();
                                    text.select();
                                    resize();
                                }
                        </script>
                    </form>
                </body>
                
            </html>';
    }

    ?>
    <?php
        if(isset($_POST['action']) and ($_POST['action'] == 'print' || $_POST['action'] == 'editdiag')){
            $diagid = $_POST['diagid'];
            $sql = "SELECT * FROM diagnostice WHERE ID='$diagid'";
            $diagnostic = $db->query($sql);
            $diagnostic = $diagnostic->fetchArray(SQLITE3_ASSOC);

            
            $sql = "SELECT * FROM part2diag WHERE DiagAtt='$diagid'";
            $part2diag = $db->query($sql);
            $part2diag = $part2diag->fetchArray(SQLITE3_ASSOC);
            
            $sql = "SELECT PacientID FROM Rope WHERE DiagnosticID='$diagid'";
            $pacient = $db->query($sql);
            $pacient = $pacient->fetchArray(SQLITE3_ASSOC);
            $pacient = $pacient['PacientID']; 
            
            $sql = "SELECT * FROM pacienti WHERE ID='$pacient'";
            $pacient = $db->query($sql);
            $pacient = $pacient->fetchArray(SQLITE3_ASSOC);
            $i = 0;
            $day=''; 
            $luna=''; 
            $year='';
            while($diagnostic['Data'][$i] != '/'){
                $day = $day.$diagnostic['Data'][$i++];
            }
            $i++;
            while($diagnostic['Data'][$i] != '/'){
                $luna = $luna.$diagnostic['Data'][$i++];
            }
            $i++;
            while(isset($diagnostic['Data'][$i])){
                $year = $year.$diagnostic['Data'][$i++];
            }



            echo '
            <html>

                <head>
                
                    <title>Raport medical</title>
                    <link href="/icons/fontawesome-icons-web/css/all.css" rel="stylesheet"> <!--load all styles -->
                    <script src="/icons/fontawesome-icons-web/js/all.js" ></script>
                    <link rel="stylesheet" type="text/css" href="/css/table.css"/>
                    <link rel="stylesheet" type="text/css" href="/css/search.css"/>
                    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
                    <script src="/js/jquery.min.js"></script>
                
                    <style>
                        table td {
                            position: relative;
                        }
                
                        input::-webkit-outer-spin-button,
                        input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                        }
                
                        /* Firefox */
                        input[type=number] {
                        -moz-appearance: textfield;
                        }
                        
                        table td input {
                            text-align:center;
                            display: inline-block;
                            margin: 0;
                            margin-left: 0;
                            margin-right: 0;
                            left: 0;
                            right: 0;
                            height: 100%;
                            width: 100%;
                            border: none;
                            padding: 10px;
                            box-sizing: border-box;
                        }
                        
                        textarea{
                            display: inline-block;
                            margin: 0;
                            height: 100%;
                            width: 100%;
                            border: none;
                            padding: 10px;
                            box-sizing: border-box;
                        }
                    </style>
                        
                    <style>
                        textarea{
                            overflow: hidden; overflow-wrap: break-word; resize: vertical;
                        }
                    </style>
                </head>
            
                <body onload="init();">
                    <script>
                        window.onscroll = function() {myFunction()};

                        var navbar = document.getElementById("top");
                        var sticky = navbar.offsetTop;

                        function myFunction() {
                            if (window.pageYOffset >= sticky) {
                                navbar.classList.add("sticky")
                            } else {
                                navbar.classList.remove("sticky");
                            }
                        }
                    </script>
                    <form method="post">
                        <div class="top">
                            <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
                            
                                <button name="save" value="save" class="print" onclick="" title="save"><i class="fas fa-save"></i></button>
                                <input type="hidden" name="nume" value="'.$pacient['Nume'].'" />
                                <input type="hidden" name="prenume" value="'.$pacient['Prenume'].'" />
                                <input type="hidden" name="cnp" value="'.$pacient['CNP'].'" />
                                <input type="hidden" name="jud" value="'.$pacient['Judet'].'" />
                                <input type="hidden" name="ani" value="'.$pacient['Varsta'].'" />
                                <input type="hidden" name="loc" value="'.$pacient['Localitate'].'" />
                                <input type="hidden" name="id" value="'.$pacient['ID'].'" />
                                <input type="hidden" name="diagid" value="'.$diagnostic['ID'].'" />
                            
                        </div>
                        <div>
                            <div class="logo" style="display:inline-block; width:100px; float:left">
                                <img src="/img/logo.png" width="100px" />
                            </div>

                            <div class="contact" style="display:inline-block; float:right">
                                <p><b>Adresa:</b>România, jud. Suceava, </p><p>loc. Suceava, str. Mărășești, nr. 48</p>
                                <p><b>Telefon:</b><span>0230 523 055</span></p>
                            </div>

                            <div style="display:inline-block;">
                                <h3>SC GLAUCOS MEDICAL SRL</h3>
                            </div>
                        </div>
                
                        <div class="spacerX-10px"></div>
                        <h1 style="Text-align:center;">Raport Medical</h1>
                        <div class="spacerX-25px"></div>
                        <table style="width:100%;border-collapse:collapse;border:none;">
                            <tbody>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-bottom:solid black 1pt">
                                        Data consulta&#355;iei
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:double black 1.5pt;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        
                    
                                        <input name="day" type="number" style="width: 40px;" value="' . $day . '"/>/
                                        <input name="luna" type="number" style="width: 40px;" value="' . $luna . '" />/
                                        <input name="year" type="number" style="width: 50px;" value="' . $year . '" />
                    
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Date pacient
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        ' . $pacient['Nume'] . ' ' . $pacient['Prenume'];
                                        if(isset($pacient['Varsta']) && $pacient['Varsta']!='') echo ', ' . $pacient['Varsta'] . 'ani'; 
                                        if(isset($pacient['CNP']) && $pacient['CNP']!='') echo ', CNP:' . $pacient['CNP'];
                                        if(isset($pacient['Judet']) && $pacient['Judet']!='') echo ', Jude&#355;:' . $pacient['Judet'];
                                        if(isset($pacient['Localitate']) && $pacient['Localitate']!='') echo ', Localitate:' . $pacient['Localitate'] ;
                                        echo '
                                        <!--<input type="text" name="Nume" value="" style="width:50%" /><input type="text" name="PreNume" value="" style="width:50%" />-->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Motive la prezentare
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        <textarea id="text"type="text" name="MLP" value="">'.$diagnostic['MotiveLaPrezentare'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        APP
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text"type="text" name="APP" value="" >'.$diagnostic['APP'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-top:none; border-bottom: solid black 1pt;">
                                        AHC
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none; border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AHC" value="'.$diagnostic['AHC'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt; border-top:none; border-bottom:solid black 1pt;"></td>
                                    <td width="350" style="width:210.0pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <p style="text-align:center;">OD</p>
                                    </td>
                                    <td width="346" style="width:207.8pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt;">
                                        <p style="text-align:center;">OS</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        AV
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AVD" value="'.$diagnostic['ODAV'].'" />
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="AVS" value="'.$diagnostic['OSAV'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        PIAO
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="PIAOD" value="'.$diagnostic['ODPIAO'].'" />
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <input type="text" name="PIAOS" value="'.$diagnostic['OSPIAO'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Ex. LF
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="LFD" value="" >'.$diagnostic['OD_exLF'].'</textarea>
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="LFS" value="" >'.$diagnostic['OS_exLF'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Ex. FAO
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="FAOD" value="" >'.$diagnostic['OD_exFAO'].'</textarea>
                                    </td>
                                    <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text" type="text" name="FAOS" value="" >'.$diagnostic['OS_exFAO'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                                        Diagnostic
                                        <br/>
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                                        <textarea id="text"type="text" name="Diagnostic" value="" required >'.$diagnostic['Diagnostic'].'</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:77.4pt;border:double black 1.5pt;border-top:none">
                                        Tratament
                                        <br/>
                                        <br/>
                                        <br/>
                                    </td>
                                    <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:double black 1.5pt;border-right:double black 1.5pt">
                                        <textarea id="text"type="text" name="Tratament" value="" required>'.$diagnostic['Tratament'].'</textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="spacerX-25px"></div>
                        <div style="float:left; width:70%;">
                            <table class="surplus">
                                <tr>
                                    <td rowspan="2"></td>
                                    <td colspan="3">OD</td>
                                    <td colspan="3">OS</td>
                                    <td rowspan="2">D.P.</td>
                                </tr>
                                <tr>
                                    <th>SF</th>
                                    <th>CYL</th>
                                    <th>AX</th>
                                    <th style="border-left: double black 1.5pt;">SF</th>
                                    <th>CYL</th>
                                    <th>AX</th>
                                </tr>
                                <tr>
                                    <th style="border: double black 1.5pt; text-align: left;">Distanță</th>
                                    <td>
                                        <input name="ODSFdist" type="number " style="width: 100%; " value="'.$part2diag['ODSFdist'].'" />
                                    </td>
                                    <td>
                                        <input name="ODCYLdist" type="number " style="width: 100%; " value="'.$part2diag['ODCYLdist'].'" />
                                    </td>
                                    <td>
                                        <input name="ODAXdist" type="number " style="width: 100%; " value="'.$part2diag['ODAXdist'].'" />
                                    </td>
                                    <td>
                                        <input name="OSSFdist" type="number " style="width: 100%; " value="'.$part2diag['OSSFdist'].'" />
                                    </td>
                                    <td>
                                        <input name="OSCYLdist" type="number " style="width: 100%; " value="'.$part2diag['OSCYLdist'].'" />
                                    </td>
                                    <td>
                                        <input name="OSAXdist" type="number " style="width: 100%; " value="'.$part2diag['OSAXdist'].'" />
                                    </td>
                                    <td>
                                        <input name="DPdist" type="number " style="width: 100%; height:100%; " value="'.$part2diag['DPdist'].'" />
                                    </td>
                                </tr>
                                <tr>
                                    <th style="border: double black 1.5pt; text-align: left;">Aproape</th>
                                    <td>
                                        <input name="ODSFap" type="number " style="width: 100%; " value="'.$part2diag['ODSFap'].'" />
                                    </td>
                                    <td>
                                        <input name="ODCYLap" type="number " style="width: 100%; " value="'.$part2diag['ODCYLap'].'" />
                                    </td>
                                    <td>
                                        <input name="ODAXap" type="number " style="width: 100%; " value="'.$part2diag['ODAXap'].'" />
                                    </td>
                                    <td>
                                        <input name="OSSFap" type="number " style="width: 100%; " value="'.$part2diag['OSSFap'].'" />
                                    </td>
                                    <td>
                                        <input name="OSCYLap" type="number " style="width: 100%; " value="'.$part2diag['OSCYLap'].'" />
                                    </td>
                                    <td>
                                        <input name="OSAXap" type="number " style="width: 100%; " value="'.$part2diag['OSAXap'].'" />
                                    </td>
                                    <td>
                                        <input name="DPap" type="number " style="width: 100%; height:100%; " value="'.$part2diag['DPap'].'" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="float:right; text-align:center; width:30%;">
                            <div class="spacerX-10px"></div>
                            <span style="text-align:center;">Dr.</span><br/>
                            <span>Martiniuc Georgeta</span>
                            <br/><br/>
                            <div class="spacerX-50px"></div>
                        </div>
                        <script>
                            autosize(document.querySelectorAll(\'textarea\'));
                            var observe;
                                if (window.attachEvent) {
                                    observe = function (element, event, handler) {
                                        element.attachEvent(\'on\'+event, handler);
                                    };
                                }
                                else {
                                    observe = function (element, event, handler) {
                                        element.addEventListener(event, handler, false);
                                    };
                                }
                                function init () {
                                    var text = document.getElementById(\'text\');
                                    function resize () {
                                        text.style.height = \'auto\';
                                        text.style.height = text.scrollHeight+\'px\';
                                    }
                                    /* 0-timeout to get the already changed text */
                                    function delayedResize () {
                                        window.setTimeout(resize, 0);
                                    }
                                    observe(text, \'change\',  resize);
                                    observe(text, \'cut\',     delayedResize);
                                    observe(text, \'paste\',   delayedResize);
                                    observe(text, \'drop\',    delayedResize);
                                    observe(text, \'keydown\', delayedResize);

                                    text.focus();
                                    text.select();
                                    resize();
                                }
                        </script>';

                    if($_POST['action'] == 'print'){
                        if( !is_numeric($part2diag['ODSFdist']) && !is_numeric($part2diag['OSSFdist']) && !is_numeric($part2diag['ODSFap']) && 
                            !is_numeric($part2diag['OSSFap']) && !is_numeric($part2diag['ODCYLdist']) && !is_numeric($part2diag['OSCYLdist']) && 
                            !is_numeric($part2diag['ODCYLap']) && !is_numeric($part2diag['OSCYLap']) && !is_numeric($part2diag['ODAXdist']) && 
                            !is_numeric($part2diag['OSAXdist']) && !is_numeric($part2diag['ODAXap']) && !is_numeric($part2diag['OSAXap']) && 
                            !is_numeric($part2diag['DPdist']) && !is_numeric($part2diag['DPap']))
                                
                            {
                                echo '
                                    <script type="text/javascript">
                                        var x = document.getElementsByClassName("surplus");
                                        x[0].style.display = "none";
                                    </script>

                                
                                ';
                            }
                        echo '
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    window.print();
                                    setTimeout("closePrintView()", 1000);
                                });
                                function closePrintView() {
                                    document.location.href = \'../\';
                                }
                            </script>            
                        ';
                    }

                    echo '
                    </form>
                </body>
            
            </html>
            ';

        }


    ?>
