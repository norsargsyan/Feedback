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
                <div class="form-section__inner">
                    <h1 class="form-section__title">Message List</h1>
                        <div class="message-list">
                            <?php
                            foreach ($messageData as $index => $item):
                            ?>
                                <a href="/messages/read/<?php echo $item['id']; ?>">
                            <div class="message-item readed">
                                <div class="message-item-info">
                                    <div class="message-item-info__inner">
                                        <span><?php echo ++$index; ?></span>
                                        <span><?php echo $item['name']; ?></span>
                                        <span><?php echo $item['last_name']; ?></span>
                                        <span><?php echo $item['email']; ?></span>
                                        <span><?php echo $item['date']; ?></span>
                                    </div>
                                    <span><img src="/template/img/email.svg" title="Mark as read" class="read-icon" width="24px" alt=""><img src="/template/img/remove.svg" title="Delete" class="delete-icon" width="24px" alt=""></span>
                                </div>
                                <div class="message-item-message">
                                    <?php
                                    if(strlen($item['message']) > 600) {
                                        echo substr($item['message'], 0, 600) . '...';
                                    }
                                    else{
                                        echo $item['message'];
                                    }

                                    ?>
                                </div>
                            </div>
                                </a>
                            <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>
    </main>

</div>

</body>
</html>