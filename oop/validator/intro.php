<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Intro till PHP</h1>
        <?php
        class User {
            /* Denna variabel syns inte utåt: den går inte att nå */
            private $username, $email;

            public function __construct($uname)
            {
                $this->username = $uname;
            }

            /* Denna funktion syns utåt: den går att använda */
            public function addEmail() {
                $this->email = $mail;
            }
        }

        /* Skapa ett objekt */
        $user1 = new User("Gene");
        /* Använd onjektens funktion */
        $user1->addEmail("Genehelli@gmail.com");

        /* Skapa ett till objekt */
        $user2 = new User("Obama");
        $user2->addEmail("Obama@gmail.com");
        ?>
    </div>
</body>
</html>