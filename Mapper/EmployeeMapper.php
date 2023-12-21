<?php

namespace Mapper;

use Repository\EmployeeRepository;
use Entity\Employee;
//Transformer la Donnée de la Database en entité
class EmployeeMapper
{
    private static ?EmployeeMapper $instance = null;
    private EmployeeRepository $employeeRepository;

    public function _construct(): void
    {
        $this->employeeRepository = new EmployeeRepository();
    }

    public static function getInstance(): EmployeeMapper
    {
        
        if (self::$instance === null) {
            self::$instance = new EmployeeMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }

    /**
     * @return Employee[]
     */
    public function getList(): array
    {  
        $employeeArrayFromDb = $this->employeeRepository->getList();
        $employeeEntities = [];

        foreach($employeeArrayFromDb as $employeeFromDb){
            $entity = null;
            $employeeId = $employeeFromDb['employee_employeeId'];

            if (isset($employeeEntities[$employeeId])) {
                $entity = $employeeEntities[$employeeId];
            } else {
                $entity = new Employee();
            }
              
            $entity->setId($employeeId)
                   ->setFirstName($employeeFromDb['employee_firstName'])
                   ->setLastName($employeeFromDb['employee_lastName'])
                   ->setJob($employeeFromDb['employee_job'])
                   ->setMail($employeeFromDb['employee_mail'])
                   ->setPassword($employeeFromDb['employee_password']);

            $employeeEntities[$entity->getId()] = $entity;
        }

        return $employeeEntities;
    }

    public function getOneByArray(array $employeeDataFromDb = null): ?Employee
    {
        if (!isset($employeeDataFromDb['employee_employeeId'])) {
            return null;
        }

        $entity = new Employee();
        $entity->setId($employeeDataFromDb['employee_employeeId'])
               ->setFirstName($employeeDataFromDb['employee_firstName'])
               ->setLastName($employeeDataFromDb['employee_lastName'])
               ->setJob($employeeDataFromDb['employee_job'])
               ->setMail($employeeDataFromDb['employee_mail'])
               ->setPassword($employeeDataFromDb['employee_password']);

        return $entity;
    }

    public function getOneById(int $employeeId): ?Employee
    {
        $employeeRowsFromDb = $this->employeeRepository->getOneById($employeeId);

        if (empty($employeeRowsFromDb)) {
            return null;
        }

        $employeeEntities = [];
        foreach($employeeRowsFromDb as $row) {
            $entity = null;
            $employeeId = $row['employee_employeeId'];

            if (isset($employeeEntities[$employeeId])) {
                $entity = $employeeEntities[$employeeId];
            } else {
                $entity = new Employee();
            }

            $entity->setId($row['employee_employeeId'])
                   ->setFirstName($row['employee_firstName'])
                   ->setLastName($row['employee_lastName'])
                   ->setJob($row['employee_job'])
                   ->setMail($row['employee_mail'])
                   ->setPassword($row['employee_password']);


            $employeeEntities[$entity->getId()] = $entity;
        }        

        return reset($employeeEntities) ?: null;
    }
}