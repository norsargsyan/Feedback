
    <main class="auth-main">
        <section class="auth-section">
            <div class="form-section big-section">
                <div class="get_blur"></div>
                <div class="form-section__inner inner_padding">
                    <h3><?php echo $messageData[1] . ' ' . $messageData[2];  ?> </h3>
                    <h4><?php echo $messageData[3]; ?></h4>
                    <small><?php echo substr($messageData[5], 0,-5); ?></small>
                    <div class="equal"><?php echo $messageData[4];  ?></div>
                    <a href="/messages">Back to message list</a>
                </div>
            </div>
        </section>
    </main>
