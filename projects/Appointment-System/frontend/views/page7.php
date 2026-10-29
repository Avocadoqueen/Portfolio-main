<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="central">
       <div class="pep2">
        <h1><span class="the-a">A</span>ppointment Booking</h1><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name">
            <p class="the-s"><?php echo $nameErr?></p>

            <label for="aptype">Appointment Type:</label>
            <select name="aptype" id="">
                <optgroup>
                    <option value="Offline(In Person)">Offline(In-person)</option>
                    <option value="Online">Online</option>
                </optgroup>
            </select><br><br>

            <label for="doc">Doctor:</label>
            <select name="doc" id="">
            <optgroup>
                <option value="Cardiology">Cardiology</option>
                <option value="Dental Health">Dental Health</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Emergency">Emergency</option>
                <option value="General">General</option>
                <option value="Gynaecology">Gynaecology</option>
                <option value="Internal Medcine">Internal Medcine</option>
                <option value="Laboratory">Laboratory</option>
                <option value="Orthopaedics">Orthopaedics</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="Surgeon">Surgeon</option>
                <option value="Urology">Urology</option>
            </optgroup>
           </select>
      
            
            <label for="aptime"> Appointment Time:</label>
            <select name="aptime" id="">
                <optgroup>
                    <option value="12am">12am</option>
                    <option value="12pm">12pm</option>
                </optgroup>
             </select><br><br>
             <label for="apdate">Appointment Date:</label>
             <input type="date" name="apdate"><br><br>
             <label for="rap">Reason for Appointment:</label>
             <textarea class="textarea" name="reason"></textarea>
             <p class="the-s"><?php echo $appointmentMessage?></p>

             <div>
                <input type="submit" value="Submit" class="next" name="pib">
               </div>
              </form>
             
       </div>
    </div>
<?php include 'toes.php'; ?>

