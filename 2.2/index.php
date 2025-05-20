<?php
error_reporting(E_ALL);


// Напишите простенький валидатор форм. В форме могут быть поля типа text, phone, e-mail. Если поля являются обязательными, то text должен быть не пустым, а phone и e-mail должны соответствовать маске (имеется ввиду маска регулярки). Валидацию нужно написать с нуля, а не использовать плагины!




// print_r("<pre>" . print_r($_POST, true) . "</pre>");


$pattern_mail = '/\w+@\w+\.\w+/';
$pattern_number = '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/';




$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['phone'];

$status_error = 'Success';

if (strlen($name) <= 0) {
    $status_error = "У вас должно быть имя!";
} elseif (!preg_match($pattern_mail, $email)) {
    $status_error =  "Что-то не так с почтой!";
} elseif (!preg_match($pattern_number, $number)) {
    $status_error = "Что-то не так с номером!";
}


// if ( (strlen($name) > 2) && preg_match($pattern_mail, $email) && preg_match($pattern_number, $number)) {
//     echo "Success";
// } else {
//     echo "Oops, something went wrong!";
// }


function render_template($template_name, $status_error) 
{
    $status_error = $status_error;
    require_once $template_name . ".html";
}


if ($status_error == "Success") {
    render_template('home', $status_error);
    
} else {
    render_template('index', $status_error);
}
