<?php 
    include '../connexion/connexion.php';//Se connecter à la BD
    #Appel de la page qui permet de faire les affichages
    require_once('../models/select/select-cours.php');
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$title?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                <h4 class=""><?=$title?></h4>
                </div>
                <!-- pour afficher les massage  -->
                <?php
                if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
                    ?><div class="alert-info alert text-center alert-dismissible fade show" role="alert">
                        <?=$_SESSION['msg']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><?php
                }
                unset($_SESSION['msg']);#Cette ligne permet de vider la valeur qui se trouve dans la session message
            ?>
                <div class="col-xl-12 ">
                    <form class="card p-3" action="<?=$url?>" method="POST">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Intitulé du Cours<span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: Comptabilité" name="nomcours"
                                    <?php if (isset($_GET['idpro'])) { ?> value="<?php echo $tab['nomcours']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Crédit<span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: 2" name="credit"
                                    <?php if (isset($_GET['idpro'])) { ?> value="<?php echo $tab['credit']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Nombre Heure<span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: 60" name="nbreheure"
                                    <?php if (isset($_GET['idpro'])) { ?> value="<?php echo $tab['nbreheure']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Objectif<span class="text-danger">*</span></label>
                                <input autocomplete="off" required type="text" class="form-control" placeholder="Ex: Comptabilité" name="objectif"
                                    <?php if (isset($_GET['idpro'])) { ?> value="<?php echo $tab['objectif']; ?> <?php }?>">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                            <input type="submit" class="btn btn-info w-100" name="valider" value="<?=$btn?>">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- La table qui affiche les données  -->
                <div class="col-xl-12 table-responsive px-3 card mt-4 px-4 pt-3">
                     <table class="table table-borderless datatable ">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Intitulé du cours</th>
                                <th>Crédit</th>
                                <th>Nombre d'heure</th>
                                <th>Objectif</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n=0;
                                while($idpro=$getData->fetch()){
                                $n++;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $n;?></th>
                                            <td> <?= $idpro["nomcours"] ?></td>
                                            <td> <?= $idpro["credit"] ?></td>
                                            <td> <?= $idpro["nbreheure"] ?></td>
                                            <td> <?= $idpro["objectif"] ?></td>
                                            
                                            <td>
                                                <a href='cours.php?idpro=<?=$idpro['id'] ?>' class="btn btn-info btn-sm "><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                    href='../models/delete/del-cours-post.php?idSupcat=<?=$idpro['id'] ?>'
                                                    class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>