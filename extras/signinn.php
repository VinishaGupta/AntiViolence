<?php
if (isset($_POST['submit'])) {
    // Include your database connection
    include('connection.php');

    // Sanitize user inputs
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
	  $pws = mysqli_real_escape_string($conn, $_POST['pws']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } else {
        $duplicate = mysqli_query($conn, "SELECT * FROM registration WHERE `PASSWORD`='$pws' OR `EMAIL ID`='$email'");

        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script>alert('Username or Email has already been taken');</script>";
        } elseif (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($pws)) {
            // No password hashing, storing plaintext
            // Prepare and execute the query
            $query = "INSERT INTO registration(`FIRST NAME`,`LAST NAME`,`EMAIL ID`,`PHONE NO.`,`PASSWORD`) VALUES ('$fname','$lname','$email','$phone','$pws')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registration successful');</script>";
                header("location:action.php");
                exit;
                // You can handle session and redirection here if needed
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Please fill in all the fields');</script>";
        }
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="frontttn.css" rel="stylesheet">

    <style>
        body{
    background-image: url('Qwerty/1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    mix-blend-mode:color-burn;
    

}

.qwe{
    background-color: rgb(128, 108, 148);
    display: flex;
    justify-content: center;
    padding-top: 50px;
    margin-top: 40px;
    width: 430px;
    

}

.abc{
    
    display: flex;
    flex-direction: column;
    height: 450px;

}

.all{
    display: flex;
    justify-content: center;
}

.abc1{
    margin-top: 5px;
    margin-bottom: 5px;
}

.sub{
    margin-top: 5px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-bottom: 8px;
}

.abc_1{
    width: 100%;
    padding: 5px;
    background-color: rgb(214, 212, 212);
    border: none;
    border-radius: 5px;

}

.abc_2{
    margin-top: 15px;
}

p{
    margin-top: -15px;
    text-align: center;
}

.abc_3{
    margin-top: -6px;
}

.abc_4{
    margin-top: 25px;
}

.abc_5{
    margin-bottom: 12px;
}

.abc_3{
    display: flex;
    flex-direction: row;
    
}

.abc_7{
    width: 155px;
    
}

.abc_8{
    margin-right: 10px;
}

.abc_9{
    margin-right: -11px;
}

.abc_10{
    margin-top: 17px;
    text-align: center;
    font-size: 13px;
}

#submit{
    width: 300px;
    background-color: rgb(214, 212, 212);
    border: none;
    padding: 10px 0px;
    border-radius: 20px;

}

.terms{
    font-size: 11px;
    
}

.abc_4{
    text-align: center;
    margin-top: 30px;
}

.abc_11{
    font-size: 30px;
    font-weight: bold;
    
}

.abc_6{
    margin-top: -10px;
}

.abc_12{
    font-size: 12px;
    
}

.abc_13{
    margin-top: 10px;
}

.abc_1{
    outline: none;
}

.abc{
    margin-top: 15px;
}

.qwe{
    border-radius: 7px;
    box-shadow: 2px 5px 25px rgba(0, 0, 0, 0.7);
}

.abc_14{
    color: white;
    cursor: pointer;
}

.abc_1{
padding: 10px 5px;
}

.qwe{
    margin-top: 100px;
    background-color: rgba(204, 193, 215, 0.2);

}

input{
    background-color: white;
    color: black;

}


    </style>

</head>
<body>

    <div class="all">

        <div class="qwe">

            <form action="signin.php" method="post">
    
                <div class="abc">

                    <p class="abc_11">Sign Up</p>
    
                    <div class="abc1 abc_3">

                        <div class="abc_6">
                            <label for="fname"></label><br>
                            <input class="abc_1 abc_7 abc_8" type="text" id="fname" required name="fname" placeholder="First Name">        
                        </div>

                        <div class="abc_6">
                            <label for="lname"></label><br>
                            <input class="abc_1 abc_7 abc_9" type="text" id="lname" required name="lname" placeholder="Last Name">        
                        </div>
                    </div>   
    
                    
    
                    <div class="abc1">
                        <label for="email"></label><br>
                        <input class="abc_1" type="email" id="email" required placeholder="Email" name="email">    
                    </div>
                        
                    
    
                    <div class="abc1">
                        <label for="phone"></label><br>
                        <input class="abc_1" type="tel" id="phone" name="phone" placeholder="Phone Number" >    
                    </div>
                
                    
    
                    <div class="abc1">
                        <label for="pass"></label><br>
                        <input class="abc_1" type="password" class="pass" id="pass" required name="pws" placeholder="Password">  <!-- title="Must contain at least one number and uppercase and one lowercase letter, and at least 8 or more character" > -->
                    </div>

                    

                    <!-- <div class="abc1 abc_2">
                        <label id="date">Date of Birth: </label>
                        <input class="abc_1"  type="date" name="date">
                    </div> -->
                
                
                    

    
                    <!-- <div class="abc1 abc_10">
                        <div>
                            <span>Gender:</span>
                            <input type="radio" id="female" required name="gender" value="F">
                            <label for="female">Female</label>
                
                            <input type="radio" id="male" required name="gender" value="M">
                            <label for="male">Male</label>
                
                            <input type="radio" id="no" required name="gender" value="N">
                            <label for="no">Prefer not to say</label>
                            
                        </div>                
                    </div> -->

                    <div class="abc1 abc_4">
                        
                        <input type="checkbox" id="terms" required>
                        <label for="terms"><span class="terms">I accept Terms of Use & Privacy Policy</span></label>
                        

                    </div>
         
                    
                    <div class="sub">

                        <div class="abc1 abc_5">
                            <label for="submit"></label>
                            <input id="submit" type="submit" name="submit" value="Sign Up">
                        </div>
    
                    </div>

                    <div class="abc1 abc_13">
                        <p class="abc_12">Already have an account?<span><a class="abc_14" href="login.html"> Sign in here</a></span></p>
                    </div>
            
                </div>
        </form>
        </div>
    </div>

</body>
</html>