<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="/template/css/style.min.css">
</head>
<body>
<div class="wrapper">
    <main class="auth-main">
        <section class="auth-section">
            <div class="form-section">
                <div class="get_blur"></div>
                <div class="form-section__inner">
                    <h1 class="form-section__title">Feedback</h1>
                    <div class="form-section__restrict">
                        <form action="/validate" method="POST">
                            <div class="form-input-group">
                                <div class="input-group">
                                    <input type="text" class="input-text" name="fname" placeholder="First Name">
                                </div>
                                <div class="input-group">
                                    <input type="text" class="input-text" name="lname" placeholder="Last Name" >
                                </div>
                                <div class="input-group">
                                    <input type="text" class="input-text" name="email" placeholder="E-mail" >
                                </div>
                                <div class="input-group">
                                    <textarea name="message" maxlength="20000" class="input-text textarea" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="input-group submit-elem get-indent">
                                <input type="submit" value="Send" name="message_send" class="button-fill">
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </section>
    </main>

</div>

</body>
</html>