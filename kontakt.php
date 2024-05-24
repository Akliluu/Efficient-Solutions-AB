<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efficient-Solutions-AB</title>
    <link rel="stylesheet" href="kontakt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Edu+NSW+ACT+Foundation:wght@400..700&family=Gruppo&family=Sniglet:wght@400;800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="head">
            <div class="name">
                <a href="./Landing.html">EFFICIENT SOLUTIONS AB</a>
            </div>
            <div class="headermenu">
                <div class="Om oss">
                    <a href="./om oss.html">OM OSS</a>
                </div>
                <div class="Kontakt">
                    <a href="./kontakt.php">KONTAKT</a>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="kontaktsektion">
            <div class="kontakt-left">
                <h1>Kontakta Oss</h1>
                <p>Är du redo att ta nästa steg i din karriär? Kontakta oss nedan för att utforska möjligheterna att arbeta tillsammans.</p>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);

                    $to = 'aklilunebi05@gmail.com';  
                    $subject = 'Nytt kontaktformulärmeddelande';
                    $headers = "From: $email\r\n";
                    $headers .= "Reply-To: $email\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    $email_message = "
                    <html>
                    <head>
                        <title>$subject</title>
                    </head>
                    <body>
                        <h2>Kontaktformulärmeddelande</h2>
                        <p><strong>Namn:</strong> $name</p>
                        <p><strong>E-post:</strong> $email</p>
                        <p><strong>Meddelande:</strong><br>$message</p>
                    </body>
                    </html>
                    ";

                    if (mail($to, $subject, $email_message, $headers)) {
                        echo '<p class="success">Tack för ditt meddelande. Vi kommer att kontakta dig snart.</p>';
                    } else {
                        echo '<p class="error">Ett fel uppstod när ditt meddelande skulle skickas. Försök igen senare.</p>';
                    }
                }
                ?>
                <form action="kontakt.php" method="post">
                    <label for="name">Namn</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">E-post</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Meddelande</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                    <button type="submit">Skicka</button>
                </form>
            </div>
            <div class="kontakt-right">
                <img src="bird.jpg" alt="Kontaktbild">
            </div>
        </section>
    </main>
</body>
</html>
