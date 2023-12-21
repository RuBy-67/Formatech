<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Mapper\StudentMapper;

$studentMapper = StudentMapper::getInstance();
$students = $studentMapper->getList();

?>

<section class="container">
    <h2 class=" text-center">Liste des étudiants</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th hidden>StudentId</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>Promotion ID</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td hidden>
                        <?= $student->getId() ?>
                    </td>
                    <td>
                        <?= $student->getFirstName() ?>
                    </td>
                    <td>
                        <?= $student->getLastName() ?>
                    </td>
                    <td>
                        <?= $student->getMail() ?>
                    </td>
                    <td>
                        <?= $student->getBirthDate() ?>
                    </td>
                    <td>
                        <?= $student->getPromotionId() ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_update&id=<?= $student->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</section>