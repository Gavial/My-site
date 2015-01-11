<?php
    include('header.php');

$page = 'home.php';
$contact = '';
$home = '';
$passion = '';
$cv = '';
$PPE = '';
$stages = '';
$portfolio = '';
$veille = '';

if (TRUE == isset($_GET['page']) && FALSE == empty($_GET['page']))
{
    if($_GET['page'] == 'contact')
    {
        $page = 'contact.php';
        $contact = 'class="active"';
    }
    else if($_GET['page'] == 'passion')
    {
        $page = 'passion.php';
        $passion = 'class="active"';
    }
    else if($_GET['page'] == 'about')
    {
        $page = 'cv.php';
        $cv = 'class="active"';
    }
    else if($_GET['page'] == 'PPE')
    {
        $page = 'PPE.php';
        $PPE = 'class="active"';
    }
    else if($_GET['page'] == 'stages')
    {
        $page = 'stages.php';
        $stages = 'class="active"';
    }
    else if($_GET['page'] == 'portfolio')
    {
        $page = 'portfolio.php';
        $portfolio = 'class="active"';
    }
    else if($_GET['page'] == 'veille')
    {
        $page = 'veille.php';
        $veille = 'class="active"';
    }
    else
    {
        $page = 'home.php';
        $home = 'class="active"';
    }
}
?>
<html>
<body role="document">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><i>Projet web Odile</i></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $home; ?> ><a href="index.php?page=home">Accueil</a></li>
                <li <?php echo $cv; ?> ><a href="index.php?page=about">Mon experience</a></li>
                <li <?php echo $stages; ?> ><a href="index.php?page=stages">Stages</a></li>
                <li <?php echo $PPE; ?> ><a href="index.php?page=PPE">PPE</a></li>
                <li <?php echo $portfolio; ?> ><a href="index.php?page=portfolio">Portefeuille de compétences</a></li>
                <li <?php echo $veille; ?> ><a href="index.php?page=veille">Veille</a></li>
                <li <?php echo $passion; ?> ><a href="index.php?page=passion">Passions</a></li>
                <li <?php echo $contact; ?> ><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

    <!-- Presentation  -->
    <div class="container theme-showcase" role="main">
<?php
include $page;
?>
      <hr>

      <footer>
        <p>© Company 2014</p>
      </footer>
    </div> 
</body>
</html>





