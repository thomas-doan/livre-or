<div class="login">
    <form method="POST" action="validation_creerCompte">

        <h4>Création de compte</h4>
        <div class="social-media">
            <p><i class="fab fa-google"></i></p>
            <p><i class="fab fa-youtube"></i></p>
            <p><i class="fab fa-facebook-f"></i></p>
            <p><i class="fab fa-twitter"></i></p>
        </div>

        <div class="inputs">

            <label for="login">Login</label>
            <input type="text" id="login" name="login" required>

            <label for="mail">mail</label>
            <input type="mail" id="mail" name="mail" required>

            <label for="prenom">prenom</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="nom">nom</label>
            <input type="text" id="nom" name="nom" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password"> Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div align="center">
            <button type="submit">Créer !</button>
        </div>
    </form>
</div>