<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/todo.php');

$todoApp = new \MyApp\todo();
$todos = $todoApp->getAll();

// var_dump($todos);
// exit;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>todoリスト</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
 <div id="container">
  <h1>todos</h1>
  <form action="" id="new_todo_form">
    <input id="new_todo" type="text" placeholder="needs to be done">
  </form>
  <ul id="todos">
  <?php foreach($todos as $todo) : ?>
    <li id="todo_<?php echo h($todo->id); ?>" data-id="<?php echo h($todo->id); ?>">
      <input type="checkbox" class="update_todo" <?php if ($todo->state === '1') { echo 'checked'; }?>>
      <span class="todo_title <?php if ($todo->state === '1') { echo 'done'; }?>"><?php echo h($todo->title); ?></span>
      <div class="delete_todo">❎</div>
    </li>
  <?php endforeach; ?>
    <li id="todo_template" data-id="">
      <input type="checkbox" class="update_todo">
      <span class="todo_title"></span>
      <div class="delete_todo">❎</div>
    </li>
  </ul>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="todo.js"></script>
</body>
</html>
