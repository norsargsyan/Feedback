<main class="auth-main">
    <section class="auth-section">
        <div class="form-section big-section">
            <div class="get_blur"></div>
            <div class="form-section__inner">
                <h1 class="form-section__title">Message list <?php  if(\App\Models\MessagesModel::$emptyList)  echo('is empty');  ?></h1>
                <div class="message-list">
                    <?php
                    foreach ($messageData as $index => $item):
                        ?>
                        <div class="message-item <?php if($item['status'] == 0) echo 'readed'; ?>" id="item<?php echo $item['id']; ?>">
                            <div class="message-item-info">
                                <a href="/messages/read/<?php echo $item['id']; ?>">
                                    <div class="message-item-info__inner">
                                        <span><?php echo ++$index; ?></span>
                                        <span><?php echo $item['name']; ?></span>
                                        <span><?php echo $item['last_name']; ?></span>
                                        <span><?php echo $item['email']; ?></span>
                                        <span><?php echo substr($item['date'], 0,-5); ?></span>
                                    </div></a>
                                <span>
                                        <img src="/template/img/<?php if($item['status'] == 0) echo 'email'; else echo 'email-green'; ?>.svg" title="Mark as read" class="read-icon" width="24px"  data-id="<?php echo $item['id']; ?>" alt="icon">
                                        <img src="/template/img/remove.svg" title="Delete" class="delete-icon" width="24px"  data-id="<?php echo $item['id']; ?>" alt="icon">
                                    </span>
                            </div>
                            <a href="/messages/read/<?php echo $item['id']; ?>">
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
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="/template/js/main.js"></script>
