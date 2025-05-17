<?php
error_reporting(E_ALL);

// Создайте простейший калькулятор. Два текстовых поля для ввода чисел, и select между ними для выбора операции (+, -, /, *) вычисления значений


$result = '';

if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = (int)$_GET['num1']; 
    $num2 = (int)$_GET['num2']; 

    $operation = $_GET['operation'];

    switch ($operation) {
        case 'addition': $result = $num1 + $num2; break;
        case 'subtraction': $result = $num1 - $num2; break;
        case 'division': $result = $num1 / $num2; break;
        case 'multi': $result = $num1 * $num2; break;
        
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="form-control" method="get" action="index.php">
    <h1>Результат: <?php echo $result?></h1>
    <p style="display: inline;"><input required type="text" name="num1" placeholder="значение"></p>
    <p style="display: inline;">
        <select style="width: 50px;" name="operation">
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="division">/</option>
            <option value="multi">*</option>
        </select>
    </p>
    <p style="display: inline;"><input required type="text" name="num2" placeholder="значение" require></p>
    <button type="submit" name="send_form">отправить</button>
</form>
</body>
</html>











