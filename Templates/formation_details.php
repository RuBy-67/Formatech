<?php
use Mapper\FormationMapper;

    $formationId = $_GET['id'];

    $formationMapper = FormationMapper::getInstance();
    $formation = $formationMapper->getOneById($formationId);

if($formation->getAccessibility())
{
    $visibility = 'Public';
}
else
{
    $visibility = 'Privé';
}

?>

<section class="container flex flex-col items-center">
    <h2  class=" text-center">Formation <?= $formation->getName()?></h2>

    <div class=" container ">
        <div class="flex flex-col justify-center items-center w-full gap-y-12 ">
            <div class="flex flex-col sm:flex-row gap-x-5 ">
                <p>Nom de la formation:<?= $formation->getName()?></p>
                <p>Durée : <?= $formation->getDurationInMonth()?> mois</p>
                <p>Abréviation : <?= $formation->getDurationInMonth()?> mois</p>
                <p>Niveau Rncp :<?= $formation->getRncpLvl()?></p>
                <p>Visibilité : <?= $formation->getAccessibility()?></p>
            </div>
            <div class="flex flex-col sm:flex-row gap-x-5 ">
                <p>Contenue de la formation :</p>
                <ul class="flex flex-col items-center"> 
                <?php foreach($formation->getModules() as $module):?>
                    <li><p><?= $module->getName() ?></p></li>
                <?php endforeach ?>
                </ul>
            </div>
            <?php require_once(__DIR__ . "\..\\Actions\\student_list_by_formation.php"); ?>
        </div>
    </div>
    <a class="button" href="<?= $_SERVER['HTTP_REFERER'] ?>">Retourner à la liste des formations</a>
</section>


                
              