<?php
// include 'tuts.php';
// echo " this is my first script";

?>

<?php
define('NAME', 'Eniola');
// $firstName = 'Eniola';
// $lastName = 'Abdul';
$age = 30;


?>
<?php
// $stringOne = 'my email is ';
// $stringTwo = 'eniollaa@gmail.com'; 


// echo $stringOne . $stringTwo;

// $name = 'eniola';
// // echo ' Hey, my name is ' . $name;

// echo 'Hey my name is $name';

// echo " the ninja screamed \"whaaa\"";
// echo 'the ninja screamed "whaaa"';

//echo $name[0];
//echo strlen($name);
// echo strtoupper($name);
// echo strtolower($name);
// echo str_replace('e', 'b', $name);

// $radius = 25;
// $pi = 3.14;  
// // echo $pi  * $radius **2;
// // echo 2 * (4 + 9) / 3;

// // echo $radius--; and echo $radius++;
// // echo $radius;
// $age = 20;
// // $age += 10;
// // echo $age;
// // echo floor($pi);
// // echo ceil($pi);
// echo pi();

//indexed arrays
$peopleOne = ['john', 'mary', 'veronica'];
$peopleTwo = array('princess', 'carla', 'may');
// echo $peopleTwo[1];

$ages = [20, 30, 50 ,70];
//print_r($ages); 
$ages[1] = 25;
//print_r($ages);
$ages[] = 60;
//print_r($ages);
// array_push($ages, 70);
// print_r($ages);
// echo count($ages);
$peopleThree = array_merge($peopleOne, $peopleTwo);
//print_r($peopleThree);

//associative arrays(keys and value pairs)
$eniola1 = ['shaun'=>'blue', 'princess'=>'purple', 'Abiodun'=>'black'];
//echo $eniola1['princess'];
// print_r($eniola1);

$eniola2 = array('benny'=>'brown', 'march'=>'red');
// print_r($eniola2);

$eniola2['peach'] = 'pink';
// print_r($eniola2);
// echo count($eniola1);
$eniola3 = array_merge($eniola1,$eniola2);
// print_r($eniola3);

//multidimensional array
$blogs = [
    ['eniola party', 'princess', 'abdul', 20],
    ['candy crush', 'cats', 'sleep', 40],
    ['chocolate', 'rice', 'market', 22],
];
// print_r($blogs[1]);
// print_r($blogs[1][1]);
$blogs = [
    ['title' => 'eniola party', 'Author' => 'princess', 'Publisher' => 'abdul', 'Likes' => 20],
    ['Game' => 'candy crush','Animal' => 'cats','action' => 'sleep','likes' => '40'],
    ['title' => 'chocolate','Author' => 'rice','publisher' => 'market','likes' => 22],
];
// echo $blogs[2]['Author'];
// echo count($blogs);

$blogs[] = ['title'=>'castle party', 'author'=> 'peach','content'=>'lorem', 'likes'=> 100 ];
// print_r($blogs);
// $popped = array_pop($blogs);
// print_r($popped);

//Loops
$eniola = ['shaun',' kat', ' kate'];

// for ($i = 0; $i < count($eniola); $i++) {
    // echo $eniola[$i]. '<br/>';
// }

// foreach
// foreach($eniola as $eniolas){
    // echo $eniolas . '<br/>';
// }

//while loops

$i = 0;

// while($i < count($eniola)){
    // echo $products[$i][''];
// }


// booleans
$products = [
    ['name'=> 'shiny star', 'price'=> 20],
    ['name'=> 'green shell', 'price'=> 10],
    ['name'=> 'red shell', 'price'=> 15],
    ['name'=> 'gold coin', 'price'=> 5],
    ['name'=> 'lightning bolt', 'price'=> 40],
    ['name'=> 'banana skin', 'price'=> 2]
    
];

while($i < count($products)){
    echo $products[$i]['name'];
    echo '<br/>';
    $i++;
}

//comparison booleans(true or false)
//echo true; "1"
//echo false; ""

echo 5<60;

//loose vs strict equal comparison
// echo 5 == '5';
// echo 5 ==='5';
// echo 5 === 5;

// conditional statement
$price = 20;

if ($price<30) {
    echo 'the condition is met';
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User Profile Page</h1>

    <div><?php echo NAME; ?></div>
    <div><?php echo $age; ?></div>
</body>
</html>