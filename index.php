<?php
   require_once 'data.in.php';

   session_start();
   //session_destroy();

   for ($i = 1; $i <= count($students); $i++) {
        $_SESSION['ID_' . $i] = $students[$i];
    }
print_r($_SESSION);
    $id = " ";
    $firstname = " ";
    $lastname = " ";
    $gender = "";
    $dateofbirth = "";
    $address = "";
    $city = "";
    $country = "";
    $tel = "";

    $warning = " ";

   if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Perform actions based on the clicked button
        if ($action == 'View') {
            if (isset($_POST['studentID']) && isset($_SESSION['ID_' . (int)$_POST['studentID']])) {
                $stuView = $_SESSION['ID_' . (int)$_POST['studentID']];

                $id = $stuView->getId();
                $firstname = $stuView->getFirstName();
                $lastname = $stuView->getLastName();
                $gender = $stuView->getGender();  
                $dateofbirth = $stuView->getBirthday();
                $address = $stuView->getAddress();
                $city = $stuView->getCity();
                $country = $stuView->getCountry();
                $tel = $stuView->getPhone();
                $warning = "Viewed";
                
            }
            else{
                $warning = "Error: Invalid request. Please try again.";
            }
        } elseif ($action == 'Insert') {
                if(!isset($_SESSION['ID_' . (int)$_POST['studentID']]) &&
                    isset($_POST['studentID']) && isset($_POST['firstName']) && 
                    isset($_POST['lastName']) && isset($_POST['gender']) && isset($_POST['dateOfBirth']) && 
                    isset($_POST['address']) && isset($_POST['city']) && isset($_POST['country']) 
                ){
                    
                    $sel = $_POST['gender'];
                    if($sel === 'F' ){
                        
                        $gender = "F";
                        $newStudent = new Student((int)$_POST['studentID'], $_POST['firstName'],
                        $_POST['lastName'], $gender, $_POST['dateOfBirth'],
                        $_POST['address'], $_POST['city'], $_POST['country'],
                        $_POST['tel']
                         );
                        
                    }else{
                        
                        $gender = "M";
                        $newStudent = new Student((int)$_POST['studentID'], $_POST['firstName'],
                        $_POST['lastName'], $gender, $_POST['dateOfBirth'],
                        $_POST['address'], $_POST['city'], $_POST['country'],
                        $_POST['tel']
                        );
                       
                    }
                    
                    $_SESSION['ID_' . (int)$_POST['studentID']] = $newStudent;
                    $warning = "Inserted!!";
                }
                else{
                    $warning = "Error: Invalid request. Please try again.<br>'STUDENT STORED!!!'";
                }
        } else if ($action == 'Update') {
            if(isset($_SESSION['ID_' . (int)$_POST['studentID']]) &&
                    isset($_POST['studentID']) && isset($_POST['firstName']) && 
                    isset($_POST['lastName']) && isset($_POST['gender']) && isset($_POST['dateOfBirth']) && 
                    isset($_POST['address']) && isset($_POST['city']) && isset($_POST['country']) 
                ){
                    
                    $sel = $_POST['gender'];
                    if($sel === 'F' ){
                        
                        $gender = "F";
                        $newStudent = new Student((int)$_POST['studentID'], $_POST['firstName'],
                        $_POST['lastName'], $gender, $_POST['dateOfBirth'],
                        $_POST['address'], $_POST['city'], $_POST['country'],
                        $_POST['tel']
                         );
                        
                    }else{
                        
                        $gender = "M";
                        $newStudent = new Student((int)$_POST['studentID'], $_POST['firstName'],
                        $_POST['lastName'], $gender, $_POST['dateOfBirth'],
                        $_POST['address'], $_POST['city'], $_POST['country'],
                        $_POST['tel']
                        );
                       
                    }
                    
                    $_SESSION['ID_' . (int)$_POST['studentID']] = $newStudent;
                    $warning = "Updated!";

            }else{
                $warning = "Error: Invalid request. Please try again.";
            }
        }
        
        else if($action == 'Clear'){
            $id = " ";
            $firstname = " ";
            $lastname = " ";
            $gender = "";
            $dateofbirth = "";
            $address = "";
            $city = "";
            $country = "";
            $tel = "";
            echo '<br>';echo '<br>';echo '<br>';
            print_r($_SESSION);
            $warning = "Done!!";
        }
       
     }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssTwo</title>

    <link rel="stylesheet" href="css.css">
</head>
<body>
    <header>
        <h1>View/Add/Update Student Information</h1>
    </header>
    <main>
    <section>
    <form action="index.php" method="post" class="form">
        <fieldset>
            <legend>Student Prfoile</legend>
            <p>
                <label for="stu_ID">Student ID: </label>
                <input type="text" name="studentID" id="stu_ID" value="<?php 
                    echo $id;
                ?>">
            </p>
            <p>
                <label for="name1">First Name: </label>
                <input type="text" name="firstName" id="name1" value="<?php 
                    echo $firstname
                ?>">
                <span>  </span>
                <label for="name2">Last Name: </label>
                <input type="text" name="lastName" id="name2" value="<?php 
                    echo $lastname;
                ?>">
            </p>
            <p>
                <label >Gender</label>
                <input type="radio" name="gender" id="G_male" value="M" <?php 
                        if($gender === 'M'){ ?>
                            checked
                        <?php }
                     ?> 
                >
                <label for="G_male">Male</label>
                <input type="radio" name="gender" id="G_female" value="F" <?php 
                        if($gender === 'F'){ ?>
                            checked
                        <?php }
                     ?>   
                >
                <label for="G_female">Female</label>
            </p>
            <p>
                <label for="DOB">Date Of Birth</label>
                <input type="date" name="dateOfBirth" id="DOB" value="<?php 
                        echo htmlspecialchars($dateofbirth);
                ?>">
            </p>
            <p>
                <label for="addr">Address: </label>
                <input type="text" name="address" id="addr" value="<?php 
                    echo $address;
                ?>">
            </p>
            <p>
                <label for="city_">City: </label>
                <input type="text" name="city" id="city_" value="<?php 
                    echo $city;
                ?>">
                <span>   </span>
                <label for="country_">Country: </label>
                <input type="text" name="country" id="country_" value="<?php 
                    echo $country;
                ?>">
            </p>
            <p>
                <label for="tel_">Tel: </label>
                <input type="text" name="tel" id="tel_" placeholder="02-2954367" value="<?php 
                    echo $tel;
                ?>">
            </p>
            <p>
                <input type="submit" name="action" id="view_" value="View">
                <input type="submit" name="action" id="insert_" value="Insert">
                <input type="submit" name="action" id="update_" value="Update">
                <input type="submit" name="action" id="clear_" value="Clear">
            </p>
        </fieldset>
    </form>
    </section>
    <section>
        <p class="error"><?php echo $warning ?></p>
    </section>
    </main>
    <footer>
        <a href="">Worood Assi </a>&#127802;
    </footer>
</body>
</html>
