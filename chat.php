<?php
date_default_timezone_set("Asia/Vladivostok");

$messages = json_decode(file_get_contents('data/messages.json'), true);

if (isset($_GET['auth']) and $_GET['auth'] === 'true') {
    $login = $_GET['login'];
    $authorized = true;
    if (isset($_POST["message"]) and $_POST["message"] != null) {
        $messages["messages"][] = [
            "date" => date("d.m.Y H:i"),
            "user" => $login,
            "message" => htmlspecialchars($_POST["message"], ENT_QUOTES)
        ];
        file_put_contents('data/messages.json', json_encode($messages));
    }
} else {
    $authorized = false;
}


function get_message($date, $user, $message): string
{
    return sprintf("<div class='message'>
                    <div>%s</div>
                    <div>%s</div>
                </div>
                <div class='message_text'>%s</div>
                <hr>", $user, $date, $message);
}


?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <div class="messages_wrapper">
        <?php
        if (isset($_GET['auth']) and $_GET['auth'] === 'true') {
            echo
            sprintf('<form id="authForm" class="auth__form" method="POST">
            <label for="message" class="form-label">
            %s, введите сообщение:</label>
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <input name="message" class="form-control" id="message">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
         </form>', $login);
        }
        ?>
        <div class="messages" id="messages" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">
            <?php
            foreach ($messages["messages"] as $message) {
                echo get_message($message["date"], $message["user"], $message["message"]);
            }
            ?>
        </div>
    </div>
    </body>
    </html>
<?php
