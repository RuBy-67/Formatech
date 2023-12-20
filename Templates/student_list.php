<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\StudentMapper;

$studentMapper = new StudentMapper();
$students = $studentMapper->getList();

?>

<section>
    <h2>Liste des étudiants</h2>
    <table>
        <thead>
            <tr>
                <th hidden>StudentId</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Birth Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td hidden></td>
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
                        <?= $student->getBirthDate();?>
                        
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>