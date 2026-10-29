<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central">
       <div class="pep2">
     <br><br>  <br> <h1><span class="the-s">S</span>ign up</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <br><br><label for="email">Email:</label>
            <br><br><input type="email" name="email">
            <p class="the-s"><?php echo $emailErr?></p>

            <br><br><label for="phoneno">Phone Number:</label>
            <input type="number" name="phoneno">
            <p class="the-s"><?php echo $phonenoErr?></p>

            <br><br><label for="pword">Password:</label>
            <input type="password" name="pword">
            <p class="the-s"><?php echo $pwordErr?></p>
            
            <br><br><label for="password">Confirm Password:</label>
            <input type="password" name="password">
            <p class="the-s"> <?php echo $pwordErr?></p>
            <div>
            <input type="submit" value="Next" class="next" name="blop">
           </div>
         
        </form>
       
       </div>
    </div>
<?php include 'toes.php'; ?>

