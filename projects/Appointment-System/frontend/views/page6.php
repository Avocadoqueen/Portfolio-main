<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central1">
       <div class="pep3">
        <h1><span class="the-s">L</span>ogin</h1><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
           <label for="emaila">Email:</label>
            <input type="email" name="emaila">
            <p class="the-s"><?php echo $emailaErr?></p>

            <br><br><label for="passworda">Password:</label>
            <input type="password" name="passworda">
            <p class="the-s"><?php echo $passwordaErr?></p>
            <div>
            <input type="submit" value="Next" class="next" name="mit">
           </div>
        </form>
       </div>
       </div>
<?php include 'toes.php'; ?>

