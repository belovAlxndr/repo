<?php
interface Assignee {
  public function canHandleTask($task): bool;
  public function takeTask($task);
}

class Employee implements Assignee {
  // реализуем методы интерфейса
}

class Team implements Assignee {
  /** @var Assignee[] */
  private $assignees;

  // вспомогательные методы для управления композитом:
  public function add($assignee);
  public function remove($assignee);

  // метода интерфейса Employee

  public function canHandleTask($task): bool {
    foreach ($this->assignees as $assignee) if ($assignee->canHandleTask($task)) return true;
    return false;
  }
  public function takeTask($task) {
    // может быть разная имплементация - допустим, некоторые задания требуют нескольких человек из команды одновременно
    // в простейшем случае берем первого незанятого работника среди this->assignees
    $assignee = ...;
    $assignee->takeTask($task);
  }
}


class TaskManager {
  private $assignees;
  public function performTask($task) {
    foreach ($this->assignees as $assignee) {
       if ($assignee->canHandleTask($task)) {
         $assignee->takeTask($task);
         return;
       }
    }

    throw new Exception('Cannot handle the task - please hire more people');
  }
}

$employee1 = new Employee();
$employee2 = new Employee();
$employee3 = new Employee();
$employee4 = new Employee();
$team1 = new Team([$employee3, $employee4);

// ВНИМАНИЕ: передаем команду в taskManager как единый композит.
// Сам taskManager не знает, что это команда и работает с ней без модификации своей логики.
$taskManager = new TaskManager([$employee1, $employee2, $team1]);
$taskManager->preformTask($task);
