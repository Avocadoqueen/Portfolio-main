<?php include 'nav.php'?>
<?php include '../../backend/authentication.php'?>

<div class="conton">
        <div class="central3">
            <div>
             <h1 class="dings"><span class="the-a">C</span>urrent Appointments</h1>
     
     
              <div class="pip0">
             <?php
             $appointments = list_appointments(50);
             if (!$appointments) {
                 echo '<p>No appointments yet.</p>';
             } else {
                 foreach ($appointments as $appointment) {
                     $doctor = htmlspecialchars($appointment['doctor'] ?? 'Doctor', ENT_QUOTES, 'UTF-8');
                     $time = htmlspecialchars($appointment['time'] ?? '', ENT_QUOTES, 'UTF-8');
                     $date = htmlspecialchars($appointment['date'] ?? '', ENT_QUOTES, 'UTF-8');
                     $name = htmlspecialchars($appointment['name'] ?? '', ENT_QUOTES, 'UTF-8');
                     echo '<div class="pip1">';
                     echo '<h2>' . $doctor . '</h2>';
                     echo '<div class="sider">';
                     echo '<p>' . $time . '</p>';
                     echo '<p>' . $date . '</p>';
                     echo '</div>';
                     echo '<p>' . $name . '</p>';
                     echo '<button class="view1">View</button>';
                     echo '</div>';
                 }
             }
             ?>
         </div>
            </div>
     </div>
     
     <div class="book">
         <img src="images/Frame365.png" alt="">
     </div>
       </div>
<?php include 'toes.php'; ?>

