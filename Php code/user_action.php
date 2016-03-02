<?php
    if($_POST['add']) {
        insertDB($_POST['title'], $_POST['details'], $_POST['deadline']);
        header("Location: mainPage.php");
    }   
    if($_GET['name'] == 'delete') {
        deleteDB($_GET['title']);
        header('Location: mainPage.php');
    }
    if($_POST['checked'] == 'true') {
        updateTrue($_POST['title']);
    }
    if ($_POST['checked'] == 'false') {
        updateFalse($_POST['title']);
    }
    if ($_POST['update']) {
        update($_POST['index'], $_POST['title'], $_POST['details'], $_POST['deadline']);
        header("Location: mainPage.php");
    }
    
    function insertDB($title, $details, $deadline) {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $add =   new PDO("mysql:host=$hostname;dbname=todo", $username, $password);

        $command = $add->prepare("INSERT INTO `todo`.`tasks` (`index`, `completed`, `title`, `details`, `deadline`) VALUES (NULL, 'FALSE', :title, :details, :deadline);");
        $command->bindParam(':title', $title);
        $command->bindParam(':details', $details);
        $command->bindParam(':deadline', $deadline);
        $command->execute();
    }
    
    function deleteDB($title) {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $delete =   new PDO("mysql:host=$hostname;dbname=todo", $username, $password);
                
        $command = $delete->prepare("DELETE FROM `todo`.`tasks` WHERE `tasks`.`title` = :title");
        $command->bindParam(':title', $title);
        $command->execute();
    }
    
    function updateTrue($title) {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';

        $update =   new PDO("mysql:host=$hostname;dbname=todo", $username, $password);
        $command = $update->prepare("UPDATE `todo`.`tasks` SET `completed` = 'TRUE' WHERE `tasks`.`title` = :title;");
        $command->bindParam(':title',$title );
        $command->execute();                   
    }
    
    function updateFalse($title) {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $id = $title;

        $update =   new PDO("mysql:host=$hostname;dbname=todo", $username, $password);
        $command = $update->prepare("UPDATE `todo`.`tasks` SET `completed` = 'FALSE' WHERE `tasks`.`title` = :title;");
        $command->bindParam(':title', $title );
        $command->execute();    
    }
    
    function update($index, $title, $details, $deadline) {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $add =   new PDO("mysql:host=$hostname;dbname=todo", $username, $password);

        $command = $add->prepare("UPDATE `todo`.`tasks` SET `title` = :title, `details` = :details, `deadline` = :deadline WHERE `tasks`.`index` = :index;");
        $command->bindParam(':index', $index);
        $command->bindParam(':title', $title);
        $command->bindParam(':details', $details);
        $command->bindParam(':deadline', $deadline);
        $command->execute();    
    }
?>