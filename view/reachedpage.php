
<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>reached_page</title>
</head>

<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-size: large;
    }
    body{
        background-image: url("../src/bg.jpg");
    }
    #navbar{
       height:50px;
        background-color: grey;
        display: flex;
        justify-content: space-between;
        align-items: center;
       
    }
    .container{
        width: 100%;
        height: 100vh;
        background-color: pink;
        
    }
    p{
        text-align: center;
        font-size: larger;
        
    }
    #hog{
        margin-left: 40%;
    }
    footer{
        position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 50px;
   background-color: grey;
   color: white;
   text-align: center;
    }
    h1{
        text-align: center;
        justify-content: center;
        align-items: center;
        font-size: x-large;
        
    }
    span{

        color: red;
        font-size: xx-large;

        font-weight: bold;
    }
    #output{
        width: 50%;
        height: 200px; 
        margin-left: 25%;  
        background-color: #cccccc;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin-top: 10%;
        border-radius: 10px;
       
        
    }
    
</style>
<body>



    <div>
    <nav id="navbar">
        <p id="hog">
            HOGWARTS UNIVERSITY
        </p>


  <!-- <a href="#"><button id="log">LOG IN</button></a> -->
 </nav>




 <div id="output">
<h1 id="wel">Welcome <span><?php echo $_SESSION["email"] ?></span></h1>
</div>

      <footer>
        <p>@DCKAP Palli.com</p>
      </footer>       


    </div>
</body>
</html>