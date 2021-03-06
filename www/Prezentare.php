<html>

<head>

    <title>Raport medical</title>
    <script src='/js/w3icons.js'></script>
    <link rel="stylesheet" type="text/css" href="/css/table.css" />
    <link rel="stylesheet" type="text/css" href="/css/search.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    
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
        
        table td textarea {
            resize: none;
            display: inline-block;
            margin: 0;
            height: 100%;
            width: 100%;
            border: none;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>

</head>

<body>
    <div>
        <div class="logo" style="display:inline-block; width:100px; float:left">
            <img src="/img/poza.png" width="100px" />
            <p style="font-family:arial; font-size:6.75px;">
                <i>
                    <b>"GANDESTE-TE LA OCHII TAI"</b>
                </i>
            </p>
        </div>
        <div style="display:inline-block;">
            <h3>SC GLAUCOS MEDICAL SRL</h3>
        </div>
    </div>

    <div class="spacerX-50px"></div>
    <h1 style="Text-align:center;">Raport Medical</h1>
    <div class="spacerX-50px"></div>
    <table style="width:100%;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width:77.4pt;border:double black 1.5pt;border-bottom:solid black 1pt">
                    Data consulta&#355;iei
                </td>
                <td colspan="2" style="width:417.8pt;border-top:double black 1.5pt;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                    <?php 
                        $day=date("d");
                        $luna=date("m");
                        $year=date("Y");
                    ?>

                    <input type="number" style="width: 40px;" value="<?php echo $day; ?>"/>/
                    <input type="number" style="width: 40px;" value="<?php echo $luna; ?>" />/
                    <input type="number" style="width: 50px;" value="<?php echo $year; ?>" />

                </td>
            </tr>
            <tr>
                <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                    Date pacient
                    <br/>
                    <br/>
                </td>
                <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt">
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
                    <textarea type="text" name="AHC" value=""></textarea>
                </td>
            </tr>
            <tr>
                <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                    APP
                </td>
                <td colspan="2" style="width:417.8pt;border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                    <input type="text" name="APP" value="" />
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
                    <input type="text" name="LFD" value="" />
                </td>
                <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                    <input type="text" name="LFS" value="" />
                </td>
            </tr>
            <tr>
                <td style="width:77.4pt;border-top:none;border-left:double black 1.5pt;border-bottom:solid black 1pt;border-right:double black 1.5pt">
                    Ex. FAO
                </td>
                <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                    <input type="text" name="FAOD" value="" />
                </td>
                <td style="border-top:none;border-left:none;border-bottom:solid black 1pt;border-right:double black 1.5pt;">
                    <input type="text" name="FAOS" value="" />
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
                    <textarea type="text" name="Diagnostic" value=""></textarea>
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
                    <textarea type="text" name="Tratament" value=""></textarea>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>