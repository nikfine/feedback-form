<?php

    /* Загрузку файлов можно обрабатывать по разному, для примера я выбрал просто сохранение */

    if(is_array($_FILES['file']) AND !empty($_FILES['file'])){
        
        for($i = 0; $i < count($_FILES['file']); $i++){

            $name = $_FILES['file']['name'][$i];
            $tmp = $_FILES['file']['tmp_name'][$i];
            if(file_exists($tmp)){
                if(!move_uploaded_file($tmp, "uploads/$name")){
                    die("Не удалось загрузить файлы");
                }
            }

        }

    }

    $db = new mysqli("localhost", "root", "", "interview_feedback_form");
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);
    if($db->query("INSERT INTO `users` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')")){
        echo "Данные загружены";
    }else{
        echo "Произошла ошибка: " . $db->errno . " " . $db->error;
    }

