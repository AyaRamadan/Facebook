<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 10px;
        }

        .form-control {
            width: 70%;
        }
        
        .container{
            width: 50%; 
            height: 400px;
           
            margin: auto;

        }
        form{
            
            margin: 50px auto;
            margin-left: 150px;
            margin-top: 70px;
        }
    </style>
</head>

<body background="images/4.jpg" style="background-repeat: no-repeat; background-size:cover;">
    <div class="container">
        <h1 style="text-align: center; color: rgb(32, 5, 9);">Login Form </h1>
        
            <form action="userController.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label style="color: rgb(59, 7, 7);" for="password">UserPassword</label>
                    <input type="password" placeholder="UserPassword" name="password" class="form-control" />
                </div>
                <input type="submit" name="login" value="Login" class="btn btn-primary btn-lg">  
                <a class="btn btn-secondary btn-lg" href="register.php">Register</a>


            </form>
      
    </div>


    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <script src="js/JQuery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>