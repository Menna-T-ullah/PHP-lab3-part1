<!DOCTYPE html>
<html>
<head>
<style>
    * {
    box-sizing: border-box;
    }

    input, textarea {
    padding: 8px;
    resize: vertical;
    }
    textarea{
        width: 500px;
        height: 150px;
    padding: 12px 20px;
    }
    #lab {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {

    padding: 12px 20px;
    cursor: pointer;
    float: left;
    }

    .container {
    border-radius: 5px;
    padding: 20px;
    }

    .col-10 {
    float: left;
    width: 10%;
    margin-top: 6px;
    }

    .col-90 {
    float: left;
    width: 90%;
    margin-top: 6px;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    .error{
        color:red;
    }

</style>
</head>
<body>

<?php 
$nameErr=$emailErr=$genderErr=$agreeErr="";
$name=$email=$gender=$agree=$group=$details=$course="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if(empty($_POST["name"])){
        $nameErr="Name is required";
    }
    else{
        $name=$_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
            $nameErr = "Only alphabets and white space are allowed";  
        }  
    }
    if(empty($_POST["email"])){
        $emailErr="Email is required";
    }
    else{
        $email=$_POST["email"];
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $_POST["email"]) ){  
            $emailErr = "Email is not valid.";   
} 
}
    if(empty($_POST["gender"])){
        $genderErr="Gender is required";
    }
    else{
        $gender=$_POST["gender"];
    }
    if(empty($_POST["agree"])){
        $agreeErr="You must agree to terms";}
        else{
            $agree=$_POST["agree"];
        }
        if (empty($_POST["group"])) {
            $group = "";
          } else {
            $group = $_POST["group"];
    }
    if (empty($_POST["details"])) {
        $details = "";
      } else {
        $details = $_POST["details"];
}
if(!empty($_POST["course"])){
    foreach ($_POST['course'] as $course)
    echo "$course ";

}
else{
    $course="";
}
}
    
?>


    <h1>Application name: AAST_BIS class registration</h1>
    <span class="error">* Required field.</span><br>
    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST">
    <div class="row">
        <div class="col-10">
            <label id="lab">Name: </label>
        </div>
        <div class="col-90">
         <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Email:</label>
        </div>
        <div class="col-90">
        <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Group:</label>
        </div>
        <div class="col-90">
            <input type="number" name="group" value="<?php echo $group;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Class details:</label>
        </div>
        <div class="col-90">
            <textarea name="details" ><?php echo $details;?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Gender:</label>
        </div>
        <div class="col-90">
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" >
            <label>Female</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
            <label>Male</label><label style="color:red"> *</label><span class="error"><?php echo $genderErr ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Select Courses:</label>
        </div>
        <div class="col-90">
            <select id="course" name="course[]" size="4" multiple <?php if (isset($course)) echo "checked";?>>
                <option value="PHP">PHP</option>
                <option value="Java Script">Java Script</option>
                <option value="MySQL">MySQL</option>
                <option value="HTML">HTML</option>
                <option value="presentation">presentation</option>
        </select>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label id="lab">Agree:</label>
        </div>
        <div class="col-90">
            <input type="checkbox" name="agree" <?php if (isset($agree)) echo "checked";?>>
  <span class="error">* <?php echo $agreeErr;?></span>
        </div>
    </div>
    
    <br>
    <div class="row">
        <input type="submit" value="Submit">
    </div>
    </form>
    </div>

</body>
</html>
<?php 
if(!isset($_POST["submit"])){
    echo "<h1>Your given values are as: </h1><br>";
    echo "Name: ";
        echo $name;  
echo "<br>Email: ";
    echo $email;
echo "<br>Group: ";
    echo $group;
    echo "<br>Class details: ";
    echo $details;
    echo "<br>Gender: ";
    echo $gender;

    echo "<br>Your courses are: ";
    if(!empty($_POST["course"])){
    foreach ($_POST['course'] as $course)
    echo "$course ";

}
}
?>

