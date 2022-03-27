<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./faculty.css">
</head>
<body>
    <nav class="navbar">
            <div class="text"><b>Assignment Management System</b></div>
    </nav>
    <div class="container">
           <div class="container1">
             <div class="menu">
                 <a href="home.php">Home</a>
                 <a href="faculty.php">Faculties</a>
                 <a href="students.php">Students</a>
                 <a href="#">Profile</a>
                 <a href="login.php">Logout</a>
             </div> 
           </div>  
           
           <div class = "container2">
                <div class="box">
                        <SELECT> 
                                <OPTION Value="Faculty">    Select your faculty</OPTION>
                                <OPTION Value="BCA">BCA</OPTION>
                                <OPTION Value="BIM">BIM</OPTION>
                                <OPTION Value="BBM">BBA</OPTION>
                                <OPTION Value="CSIT">BIT</OPTION>
                            </SELECT>

                            <SELECT> 
                                <OPTION Value="Semester">    Select your semester</OPTION>
                                <OPTION Value="First">First Sem</OPTION>
                                <OPTION Value="Second">Second Sem</OPTION>
                                <OPTION Value="Third">Third Sem</OPTION>
                                <OPTION Value="Fourth">Forth Sem</OPTION>
                                <OPTION Value="Fifth">Fifth Sem</OPTION>
                                <OPTION Value="Sixth">Sixth Sem</OPTION>
                                <OPTION Value="Seventh">Seventh Sem</OPTION>
                                <OPTION Value="Eight">Eighth Sem</OPTION>
                            </SELECT>

                            <SELECT> 
                                <OPTION Value="Subject">    Select your Subject</OPTION>
                                <OPTION Value="English">English</OPTION>
                                <OPTION Value="DL">DL</OPTION>
                                <OPTION Value="Math">Math</OPTION>
                                <OPTION Value="Sociology">Sociology</OPTION>
                                <OPTION Value="CFA">CFA</OPTION>
                            </SELECT>

                            <input type="text" placeholder="Student Name" name="name">

                            <input type="submit" value="Search">
                    </div>

           </div>
    </div>           
</body>
</html>