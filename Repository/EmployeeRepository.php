<?php
namespace Repository;

use DB\Database;
use Entity\Employee;
//Interagir avec la Database 
class EmployeeRepository
{
    private Database $database;
  

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getList(): array
    {
        return $this->database
                    ->executeQuery("SELECT 
                                        e.employeeId as employee_employeeId, 
                                        e.firstName as employee_firstName, 
                                        e.lastName as employee_lastName, 
                                        e.job as employee_job,
                                        e.mail as employee_mail, 
                                        e.password as employee_password
                                    FROM `employees` e;")
                    ->fetchAll();
    }


    public function createEmployee(string $firstName, string $lastName, string $job, string $mail, string $password): void
    {
        $employee = new Employee();
        $employee->setFirstName($firstName)
                 ->setLastName($lastName)
                 ->setJob($job)
                 ->setMail($mail)
                 ->setPassword($password);
        
        
        $this->database
             ->executeQuery("INSERT INTO employees (`firstName`, `lastName`, `job`, `mail`, `password`) 
                            VALUES (?, ?, ?, ?, ?)",
                            [$employee->getFirstName(), $employee->getLastName(), $employee->getJob(), $employee->getMail(), $employee->getPassword()]
                        );
    }

    public function deleteEmployee(int $id): void
    {
        //Delete into Table Formation
        $this   ->database
                ->executeQuery("DELETE FROM `employees`
                                WHERE `employeeId` = :employeeId"
                                ,[
                                    'employeeId' => $id
                                ]);
    }

    public function getOneById(int $id): array
    {
        return $this->database
                    ->executeQuery("SELECT 
                                        e.employeeId as employee_employeeId, 
                                        e.firstName as employee_firstName, 
                                        e.lastName as employee_lastName, 
                                        e.job as employee_job,
                                        e.mail as employee_mail, 
                                        e.password as employee_password
                                    FROM `employees` e
                                    WHERE e.employeeId = :employeeId;",
                                    ['employeeId' => $id])
                    ->fetchAll();
    }

    public function updateEmployee(Employee $employee): void
    {
        $this->database
             ->executeQuery("UPDATE employees SET
                                firstName = :employee_firstName, 
                                lastName = :employee_lastName, 
                                job = :employee_job,
                                mail = :employee_mail, 
                                password = :employee_password
                             WHERE employeeId = :employeeId;",
                            [
                                'employeeId' => $employee->getId(),
                                'employee_firstName' => $employee->getFirstName(),
                                'employee_lastName' => $employee->getLastName(),
                                'employee_job' => $employee->getJob(),
                                'employee_mail' => $employee->getMail(),
                                'employee_password' => $employee->getPassword(),
                            ]
                        );
    }

}
