<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <?php
        $task = getTask($_GET['title']);
        
        function getTask($title) {
            $hostname = 'localhost';
            $username = 'root';
            $password = 'root';

            $conn = new PDO("mysql:host=$hostname;dbname=todo", $username, $password);

            $statement = $conn->prepare("SELECT * FROM `tasks` WHERE `title` = :title");
            $statement->bindParam(':title', $title);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_OBJ);
            return $result;
        }
        ?>
        <h1>Edit</h1>
        <div id="textboxes">
            <form id="updateForm" action="user_action.php" method='POST'>
                <p>
                    Title <input type="text" name="title" value="<?php echo $task->title ?>" >
                    <input type="text" name="index" value="<?php echo $task->index ?>" hidden>
                </p>
                <p>Details <textarea name="details" cols="10" rows="5"><?php echo $task->details ?></textarea></p>
                <p>Deadline <input type="date" data-date-format="YYYY MMM DD" name="deadline" value='<?php echo $task->deadline ?>'></p>
            </form>
        </div>
        <div id="buttons">
            <p>
                <input type="submit" form='updateForm' name="update" value="Confirm">
                <input type="button" name="back" value="Back" onclick="backBtn()">
            </p>
        </div>
        <script type="text/javascript">
            function backBtn() {
                window.location.href = 'mainPage.php';
            }
        </script>
    </body>
</html>


