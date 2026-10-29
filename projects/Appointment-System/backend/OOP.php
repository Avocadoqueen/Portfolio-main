<?php

//    class User {
    //properties & methods
//     public $username;
//     public $email;

//     public function __construct($username, $email){
//         $this->username = $username;
//         $this->email = $email;
//     }

//     public function addFriend() {   //addFriend() is a method
       
//         return "$this->email added a new friend";
//     }

//    }

//     $userOne = new User('eniola','eniola@gmail.com');
//     $userTwo = new User('princess','princess@gmail.com');

//     // echo 'the class is ' . get_class($userOne);
//     echo $userOne -> username . '<br/>';
//     echo $userOne -> email . '<br/>';
//     echo $userOne -> addFriend() . '<br/>';

//     // $userTwo->username = 'princess';
//     // $userTwo->email = 'princess@gmail.com';

//     echo $userTwo -> username . '<br/>';
//     echo $userTwo -> email . '<br/>';
//     echo $userTwo -> addFriend() . '<br/>';

//     // print_r(get_class_vars('User'));
//     // print_r(get_class_methods('User'));

        class User {
          
            public $username; 
            private $email;
            
            public function __construct($username, $email){
                $this->username = $username;
                $this->email = $email;
            }
            
            public function addFriend(){
                return "$this->email added a new friend";
        }
        //getters
        public function getEmail(){
            return $this ->email;
        }

        //setters
        public function setEmail($email){
            if(strpos($email, '@') > -1){
                $this->email = $email;
            }

        }
    }

         //inheritance
        class AdminUser extends User{
            public $level;
            public function __construct($username,$email, $level){
                $this->level = $level;
                parent::__construct($username, $email);
            }
          
        } 


    $userOne = new User('eniola','eniola@gmail.com');
    $userTwo = new User('princess','princess@gmail.com');
    $userThree = new AdminUser('abiodun', 'abi@gmail.com', 5);

    echo $userThree->username.'<br/>';
    echo $userThree->getEmail().'<br/>';
    echo $userThree->level.'<br/>';
    


     
    $userOne->setEmail('beniola@gmail.com');
    echo $userOne->getEmail() .'<br/>';
    echo $userTwo->getEmail();
    
?>




<html lang="en">
    <head>
        <title>PHP OOP Tutorial</title>
    </head>
    <body>
        
    </body>

</html>