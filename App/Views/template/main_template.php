<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="/template/css/style.min.css">
</head>
<body>
<div class="wrapper messages">
    <header class="header-auth">
        <div class="header-main">
            <a href="/"><img src="/template/img/logo.png" alt="logo"></a>
            <?php
            if(isset($_SESSION['username'])) {
                echo ('<div class="links-elem">' . ucfirst($_SESSION['username']) . '<a href="/">Send Message</a><a href="/messages">Message list</a> <a href="/sign/signout">Sign out</a></div>');
            }
            else{
                echo ('<div class="links-elem"><a href="/">Send Message</a><a href="/sign">Sign in</a></div>');
            }
            ?>

        </div>
    </header>

    <?php
        if(file_exists($temName)){
            require_once $temName;
        }
    ?>

    <footer>
        <div class="header-main">
            <a href="/"><img src="/template/img/logo.png" alt="logo"></a>
            <div class="gray-block">
                <img src="/template/img/Rectangle59.png" alt="block">
                <img src="/template/img/Rectangle59.png" alt="block">
            </div>
        </div>
    </footer>
</div>
</body>
</html>