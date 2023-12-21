<?php 

use Mapper\EmployeeMapper;

$employeeMapper = EmployeeMapper::getInstance();
$employees = $employeeMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression de employee</h2>
<form action="/Actions/employee_delete.php" method="post" class="flex flex-col justify-center items-center ">
    
    <label for="employeeIdToDelete" class="mb-3">Employé à supprimer:</label>
    <select id="employeeIdToDelete" name="employeeIdToDelete" required>
       <?php foreach ($employees as $employee) :?>
            <option value="<?=$employee->getId()?>"><?=$employee->getId()?> - <?= $employee->getFirstName()?> <?= $employee->getLastName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>