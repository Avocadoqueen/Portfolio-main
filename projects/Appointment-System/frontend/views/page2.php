<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central">
        <div class="pep2">
           <br><br> <h1><span class="the-s">S</span>ign Up</h1>
            
           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <br><br><label for="fname">First Name:</label>
            <input type="text" name="fname">
            <p class="the-s"><?php echo $fnameErr?></p>

            <br><label for="lname">Last Name:</label>
            <input type="text" name="lname">
            <p class="the-s"><?php echo $lnameErr?></p>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob"><br>
            <p class="the-s"><?php echo $dobErr?></p>

            <label for="gender">Gender:</label>
           <select name="gender">
            <optgroup label="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
    
            </optgroup>
           </select>
           <label for="occupation">Occupation:</label>
           <input type="text" name="occupation"><br><br>
           <p class="the-s" ><?php echo $occupationErr?></p>

           <div>
            <input name="submit" type="submit" value="Next" class="next">
           </div>
           </form>
        </div> 
       </div>
<?php include 'toes.php'; ?>
