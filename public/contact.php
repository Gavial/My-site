<?php
    include('header.php');
?>

<div class="container theme-showcase" role="main">
    <div class="panel panel-default">
       <div class="panel-heading">
               <h2 class="text-center">Vous pouvez me contacter</h2>
        </div>
    </div>   
 
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Votre e-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="votre@adresse.mail">
            </div>
        </div>

        <div class="form-group">
            <label for="objet" class="col-sm-2 control-label">Objet</label '.stripslashes($objet).'" tabindex="3" />
            <div class="col-sm-10">
                <textarea class="form-control" rows="1"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="text" class="col-sm-2 control-label">Votre message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="10"></textarea>
                </div>
         </div>   
    </form>
</div>

   <div class="container theme-showcase" role="main">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                <p><a href="en cours de developpement" class="btn btn-success btn-lg" role="button">
                <span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp&nbspEnvoyer</a></p>
                </div>
            </div>
        </div>
    </div> 
<?php
$mail=$_GET['mail'];
$objet=$_GET['objet'];
$message=$_GET['message'];

$SQL_INSERT="insert into contact(mail, objet, message) values('".$mail."','".$objet."','".$message."')";

$link = mysqli_connect('127.0.0.1', 'root', '', 'projetweb');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

$link->query($SQL_INSERT);

$query = "SELECT * from contact" or die("Error in the consult.." . mysqli_error($link)); 

$result = $link->query($query); 

mysqli_close($link);
?>