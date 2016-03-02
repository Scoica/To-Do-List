<html>
    <head>
		<title> Project 1</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>To-Do List</h1>   
        </div>  
        <div id="todo_List">
            <?php
            $tasks = show();
            
            echo "<table>";
            echo "<tr><th> </th><th>Title</th><th>Details</th><th>Deadline</th><th>Commands</th></tr>";
            for($r = 0; $r < count($tasks); $r++) {
                echo "<tr>";
                
                $completed = $tasks[$r]->completed;
                $title = $tasks[$r]->title;
                $details = $tasks[$r]->details;
                $deadline = $tasks[$r]->deadline;
                if($completed == 'FALSE') {
                    echo "<td>" . "<input id='". $title ."' type='checkbox' onclick='validate(this)' name='checkbox' >" ."</td>";  
                } elseif($completed == 'TRUE') {
                    echo "<td>" . "<input id='". $title ."' type='checkbox' onclick='validate(this)' name='checkbox' checked>" ."</td>";  
                }
                echo "<td>" .$title ."</td>";   
                echo "<td>" .$details ."</td>";   
                echo "<td>" .$deadline ."</td>";   
                echo "<td>" . "<p><input id='". $title ."' type='button' onclick='editBtn(this)' name='edit' value='edit' ></p>"
                            . "<p><input id='". $title ."' type='button' onclick='deleteBtn(this)' name='delete' value='delete'></p>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            
            function show() {
                $hostname = 'localhost';
                $username = 'root';
                $password = 'root';
                
                $conn = new PDO("mysql:host=$hostname;dbname=todo", $username, $password);
                
                $querry = $conn->query("SELECT * FROM `tasks` ORDER BY `tasks`.`deadline` ASC");
                $result = $querry->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
            ?>
        </div>
        <div id="nav">
            <form id="user_action" method ="POST" action="user_action.php">
                    <p>
                        Title <input type="text" name="title" > 
                        Details <textarea name="details" cols="10" rows="5"></textarea>
                        Date <input type="date" name="deadline" min="<?php echo date('Y-m-d') ?>">
                    </p>
            </form>      
            <input type="submit" form="user_action" value="Add" name="add">
            <form id='editForm' method='POST' action='editPage.php'></form>
        </div>

        <script type="text/javascript" >
            function validate(obj) {
                $.post( "user_action.php", { checked: obj.checked, title: obj.id });
            }
            function deleteBtn(obj) {
                //$.post( "user_action.php", { name: obj.name, title: obj.id });
                window.location.href = "user_action.php?name=delete&title=" + obj.id;
            }
            function editBtn(obj) {
                //$.post( "gotoEdit.php", { title: obj.id } );
                //window.location.href = "editPage.php";
                window.location.href = "editPage.php?title=" + obj.id; 
            }
        </script> 
    </body>
</html>

