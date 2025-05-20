<?php
error_reporting(E_ALL);


// Создайте фотогалерею. Ваш скриптдолжен читать список файлов из определенной папки, отбирать из них изображения и выводить их на страницу. Также на странице должна быть форма добавления файла в галерею. Обработчик этой формы должен копировать загруженный файл в указанную папку и возвращаться на страницу галереи. (*Можете организовать проверку загружаемого файла)




// print_r("<pre>" . print_r($_FILES, true) . "</pre>");
// Array
// (
//     [preview] => Array
//         (
//             [name] => x-men.png
//             [full_path] => x-men.png
//             [type] => image/png
//             [tmp_name] => /opt/lampp/temp/phpacj3Hb
//             [error] => 0
//             [size] => 1064571
//         )

// )




if (empty($_FILES['preview']['name'])) {
    header("Location: index.php");
    die;
}

$allowed_types  = ['png', 'jpg', 'jpeg', 'webp', 'gif'];

$data = $_FILES['preview']['type'];
$file_type = explode('/', $data)[1]; // ["image", "png"]
$file_name = $_FILES['preview']['name'];
$file_tmp = $_FILES['preview']['tmp_name'];
move_uploaded_file($file_tmp, 'uploads/' . $file_name);



if (in_array($file_type, $allowed_types)) {
    header("Location: index.php");
} else {
    ?> 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <script>alert('Формат не поддерживается')</script>
        <button onclick="history.back()">Go Back</button>
    </body>
    </html>

    <?php

}








