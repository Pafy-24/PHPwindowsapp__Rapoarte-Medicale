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
    if(isset($_POST['submit'])){
            $nume= $_POST['Nume'];
            $prenume= $_POST['Prenume'];
            $age= $_POST['Varsta'];
            $cnp= $_POST['CNP'];
            $tel= $_POST['Telefon'];
            $jud= $_POST['Judet'];
            $loc= $_POST['Localitate'];
        if($_POST['submit'] == 'add'){
            $id = uniqid();
            if(isset($nume)){
                $sql = "INSERT INTO pacienti 
                            ('Nume','Prenume','Varsta','telefon','CNP','Judet', 'Localitate') 
                        values 
                            ( '$nume', '$prenume', '$age', '$tel', '$cnp', '$jud', '$loc')
                        ";
                if($db->query($sql)){
                    echo '
                    <html>
                        <head>
                            <title>Raport medical</title>
                            <script src="/js/w3icons.js"></script>
                            <link rel="stylesheet" type="text/css" href="/css/table.css" />
                            <link rel="stylesheet" type="text/css" href="/css/search.css" />
                            <link rel="stylesheet" type="text/css" href="/css/style.css" />
                            <script src="/js/jquery.min.js"></script>
                            <script src="/js/autosize-pak.js"></script>
                        </head>
                        <body>
                            <div class="top">
                                <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
                            </div>
                            <p>Un nou pacient a fost adaugat!!</p>
                        </body>';
                   // header("Location:../");
	   	   // echo '<a href="../">Inapoi</a>';
                }

            }
        } else if($_POST['submit'] == 'edit'){
            $id=$_POST['id'];
            $sql = "UPDATE pacienti SET Nume='$nume', Prenume='$prenume', Varsta='$age', telefon='$tel', CNP='$cnp', Judet='$jud', Localitate='$loc' WHERE ID='$id'";
            $db->query($sql);
           // header("Location:../");
	   // echo '<a href="../">Inapoi</a>';
        }
    }
    ?>
<body>
    <div class="top">
        <a href="/index.php" style="float:left;"><i class="fa fa-home"></i>Home</a>
    </div>               
    
    <form method="post">
        <p><input type="text" name="Nume" placeholder="Nume.." required value="<?php if(isset($_POST['nume'])) echo $_POST['nume']; ?>" /></p>
        <p><input type="text" name="Prenume" placeholder="Prenume.." required value="<?php if(isset($_POST['prenume'])) echo $_POST['prenume']; ?>" /></p>
        <p><input type="number" name="Varsta" placeholder="Varsta.." value="<?php if(isset($_POST['ani'])) echo $_POST['ani']; ?>" /></p>
        <p><input type="number" name="Telefon" placeholder="Telefon.." value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" /></p>
        <p><input type="number" name="CNP" placeholder="CNP.." value="<?php if(isset($_POST['cnp'])) echo $_POST['cnp']; ?>" /></p>
        <p><input type="text" name="Judet" placeholder="Judet.." value="<?php if(isset($_POST['jud'])) echo $_POST['jud']; ?>" /></p>
        <p><input type="text" name="Localitate" placeholder="Localitate.." value="<?php if(isset($_POST['loc'])) echo $_POST['loc']; ?>" /></p>
        <?php
            if(isset($_POST['action']) && $_POST['action'] == 'editpac'){
                echo '<p><button name="submit" value="edit">Editeaza datele pacientului</button></p>
                        <input type="hidden" name="id" value="'.$_POST['id'].'"/>
                ';
            } else {
                echo '<p><button name="submit" value="add">Adauga pacient</button></p>';
            }
        ?>
        
    </form>
</body>