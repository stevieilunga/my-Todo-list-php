<?php
session_start ();
//session_destroy();

?>

<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Todo List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script language="javascript" src="try.js"></script>

</head>
<body>
 

<div id=h2>

    <h2>todo list</h2>
<div class=pargraph>
    <p>enter your task here</p>
</div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<input type="text" name="userentry">
<input type="submit"> 



    
  
<?php
    
if (isset($_POST['userentry'])){

    if(!isset($_SESSION['list'])){
    $_SESSION["list"] = array();
    }

   

    // Set session variables
$_SESSION["list"][] = $_POST['userentry'];
header('location:'.$_SERVER['PHP_SELF']);

}
//var_dump($_SESSION["list"]);
foreach($_SESSION["list"] as $value){
    echo "<li>".$value."</li>"."<br>";
}



?>

    <script>
    
   $(document).ready(function(){
        var itemDone = 0;
        $("li").each(function(i){
        $(this).click(function(){
            checkIndex = i;
            //get a line through completed activities
            if(itemDone == 0){
            $(this).css("text-decoration","line-through");
            itemDone = 1;
            sessionStorage.setItem(checkIndex,itemDone);
            
            //Removing the line through the activity
            } else {
            $(this).css("text-decoration","none");
            itemDone = 0
            sessionStorage.setItem(checkIndex,itemDone);
            }
         });
        });
        //Keeping the line while new activities are added
        $("li").each(function(i){
            if(sessionStorage.getItem(i)== 1){
            $(this).css("text-decoration","line-through");
            }

        });
            
    });
    
    
    </script>

</body>



</html>