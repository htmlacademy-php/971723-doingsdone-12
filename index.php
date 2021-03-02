<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$title = 'Дела в порядке';
$username = 'Константин';
$projects = [
    [ 'id' => 1,
    'title' => 'Входящие'],
    [ 'id' => 2,
    'title' => 'Учёба'],
    [ 'id' => 3,
    'title' => 'Работа'],
    ['id' => 4,
    'title' => 'Домашние дела'],
    ['id' => 5,
    'title' => 'Авто']
];

$tasks = [
     [
     'id' => 1,
     'project' => 3,
     'title' => 'Собеседование в IT компании',
     'due_date' => '27.02.2021',
     'isDone' => false,
    ],
     [
     'id' => 2,
     'project' => 3,
     'title' => 'Выполнить тестовое задание',
     'due_date' => '25.12.2019',
     'isDone' => false,
    ],
     [
     'id' => 3,
     'project' => 2,
     'title' => 'Сделать задание первого раздела',
     'due_date' => '21.12.2019',
     'isDone' => true,
    ],
     [
     'id' => 4,
     'project' => 1,
     'title' => 'Встреча с другом',
     'due_date' => '22.12.2019',
     'isDone' => false,
    ],
     [
     'id' => 5,
     'project' => 4,
     'title' => 'Купить корм для кота',
     'due_date' => null,
     'isDone' => false,
    ],
     [
     'id' => 6,
     'project' => 4,
     'title' => 'Заказать пиццу',
     'due_date' => null,
     'isDone' => false,
    ],
];
function tasks_count ($project, $tasks)
{
    $quantity = 0;
    foreach ($tasks as $task)
    {
      if ($task['project'] === $project ['id']) {
          $quantity++;
      }
    }
    return $quantity;
}
function task_stringency ($task) {
    if ($task ['due_date']) {
        $cur_date = date_create('now');
        $deadline_date = date_create($task ['due_date']);
        $interval = $cur_date->diff($deadline_date);
       return ((int)$interval->format('%r%h') + ((int)$interval->format('%r%a')* 24)) < (24);

    }
    return false;
}
require('helpers.php');

$content = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks ]);
$page = include_template('layout.php', ['title' => $title, 'username' => $username, 'content' => $content]);

print($page);

function esc($str) {
 $text = htmlspecialchars($str);
 return $text;
}
?>

