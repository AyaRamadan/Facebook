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

        #address {
            display: inline-block;
            margin-right: 11px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body background="images/3.jpg" style="background-repeat: no-repeat; background-size:cover;">
    <div class="container" style="width: 50%; background-color: rgb(201, 174, 139); opacity: 0.9;  height:600px">
        <h1 style="text-align: center; color: rgb(32, 5, 9);">Registeration Form </h1>
        <form method="POST" action="userController.php">
            
            <div class="form-group">
                <label>FullName</label>
                <input type="text" name="fullName" class="form-control" />
            </div>
            <div class="form-group">
                <label>UserName</label>
                <input type="text" name="userName" class="form-control" />
            </div>
            <div class="form-group">
                <label>UserPassword</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" name="gender" class="form-control" />
           </div>
           <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" />
       </div>
        
     <input class="btn btn-primary btn-lg" style=" width:150px; margin: auto; display: block; margin-top:50px" type="submit" value="Register" name="register">

        </form>
    </div>
</body>

</html>