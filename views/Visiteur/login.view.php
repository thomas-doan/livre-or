<div class="login">
    <form method="POST" action="<?= URL ?>validation_login">

        <h4>Se connecter</h4>
        <div class="social-media">
            <p><i class="fab fa-google"></i></p>
            <p><i class="fab fa-youtube"></i></p>
            <p><i class="fab fa-facebook-f"></i></p>
            <p><i class="fab fa-twitter"></i></p>
        </div>

        <p class="choose-email">ou utiliser mon login :</p>

        <div class="inputs">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>


        <div align="center">
            <button type="submit">Connexion</button>
        </div>
    </form>
</div>