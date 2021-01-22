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
            <a href="/"><img src="/template/img/logo.png" alt="logo"></a> Welcome <?php echo($_SESSION['username']); ?>
            <a href="/sign/signout">Sign out</a>
        </div>
    </header>
    <main class="auth-main">
        <section class="auth-section">
            <div class="form-section big-section">
                <div class="get_blur"></div>
                <div class="form-section__inner inner_padding">
                    <h3><?php echo $messageData[1] . ' ' . $messageData[2];  ?> </h3>
                    <h4><?php echo $messageData[3]; ?></h4>
                    <small><?php echo substr($messageData[5], -4) ?></small>
                    <div class="equal"><?php echo $messageData[4];  ?></div>
                    <a href="/messages">Back to message list</a>
                </div>
            </div>
        </section>
    </main>

</div>

</body>
</html>