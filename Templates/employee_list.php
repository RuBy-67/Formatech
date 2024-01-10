<?php
require_once(__DIR__ . "/../Autoloader.php");

use Mapper\EmployeeMapper;

$employeeMapper = EmployeeMapper::getInstance();
$employees = $employeeMapper->getList();

?>

<section class="container">
    <h2 class=" text-center">Liste des Employees</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Métier</th>
                <th>Email</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td>
                        <?= $employee->getId() ?>
                    </td>
                    <td>
                        <?= $employee->getFirstName() ?>
                    </td>
                    <td>
                        <?= $employee->getLastName() ?>
                    </td> 
                    <td>
                        <?= $employee->getJob() ?>
                    </td>
                    <td>
                        <?= $employee->getMail() ?>
                    </td>
                    
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=employee_update&id=<?= $employee->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</section>