<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-size: large;
    }
    #navbar{
       height:50px;
        background-color: grey;
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* border-radius: 10px; */
       
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
    #dear{
        margin-top: 10%;
    }
    #reg_btn{
        width: 20%;
        height: 40px;
        margin-left: 38%;
        margin-top: 150px;
        border: none;
        border-radius: 2px;
        background-color: brown;
    }
    #reg_btn:hover{
        background-color: green;
        color: white;
        cursor: pointer;
    }
    #log{
        width:50%;
        height: 35px;
        font-size: medium;
        border-radius: 2px;
        border: none;
        margin-right: 55px;
    }
    #log:hover{
        background-color: yellowgreen;
        color: white;
        cursor: pointer;
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
</style>
<body>
<div class="container">
       <nav id="navbar">
        <p id="hog">
            HOGWARTS UNIVERSITY
        </p>
        <a href="../view/login.php"> <button id="log">LOG IN</button> </a>
        </nav>

      
       
       <p id="dear">Dear learners summer cources registration are open now.Please enrol if not already.</p>
       <a href="../view/register_info.php"><button id="reg_btn">Register Now </button></a>

       <footer>
            <p>@DCKAP Palli.com</p>
      </footer>     
    </div>
</body>
</html>