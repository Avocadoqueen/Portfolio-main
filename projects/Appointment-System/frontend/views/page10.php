<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central2">
        <div class="pep4">
            <h1><span class="the-a">A</span>ppointment Rescheduling</h1><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                <label for="aptime">Appointment Time:</label>
                <select name="aptime" id="">
                    <optgroup>
                        <option value="12am">12am</option>
                        <option value="12pm">12pm</option>
                    </optgroup>
                </select><br><br>

                <label for="apdate">Appointment Date:</label>
                <input type="Date" name="apdate">
                <p class="the-s"><?php echo $apdateErr?></p>

                <br><br> <div>
                <input type="submit" value="Confirm" class="next" name="flop">
            </div>
            </form>
           
        </div> 
  </div>

