<html>
    <head>
        
    </head>
    <body>
        Hello
    </body>
</html>

if (cb.checked) {
//                //switch to TRUE php
//                $.post('user_action.php', { id: cb.id , checked: cb.checked });
//                <?php include 'user_action.php'; ?>
//            }
//            if (!cb.checked) {
//                //switch to FALSE php
//                $.post('user_action.php', { id: cb.id , checked: cb.checked });
//                 <?php include 'user_action.php'; ?>
                        document.getElementsByName('checkbox')[0].addEventListener('click', function() {
                document.getElementById("javascriptText").innerHTML = 'aaa';            
            });
            
                            document.getElementById('javascriptText').innerHTML = obj.name;