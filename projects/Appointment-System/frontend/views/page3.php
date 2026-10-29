<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central">
        <div class="pep2">
        <br><br><h1><span class="the-s">S</span>ign Up</h1>
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
       
        <br><br><label for="uni">University:</label>
        <input type="text" name="uni"><br>
        <p class="the-s"><?php echo $uniErr?></p>

        <br><label for="stdno">Student Number:</label>
        <input type="number" name="stdno">
        <p class="the-s"><?php echo $stdnoErr?></p>

        <div>
        <input type="submit" value="Next" class="next" name="sub">
       </div>
       </form>
      
    </div>
    </div> 
<?php include 'toes.php'; ?>

