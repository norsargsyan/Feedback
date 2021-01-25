    <main class="auth-main">
      <section class="auth-section">
        <div class="form-section">
          <div class="get_blur"></div>
          <div class="form-section__inner">
            <h1 class="form-section__title">Login</h1>
            <div class="form-section__restrict">
              <form action="/sign" method="POST">
               <div class="form-input-group">
                <div class="input-group">
                  <input type="text" class="input-text" name="username" placeholder="Username">
                </div>
                <div class="input-group">
                  <input type="password" class="input-text" name="password" placeholder="Password">
                </div>
                </div>
                <div class="input-group submit-elem get-indent">
                  <input type="submit" value="Войти" name="login_button" class="button-fill">
                </div>
                  <?php
                    if(!$status)
                    {
                        echo '<div class="error-message">';
                        echo 'Wrong Username or password';
                        echo '</div>';
                    }
                  ?>
                </form>
              </div>
          </div>
        </div>
      </section>
    </main>
