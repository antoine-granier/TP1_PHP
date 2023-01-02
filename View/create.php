      <?php
        if(isset($error) && !empty($error)) {
          echo $error;
        }
      ?>
      <div class="wrapper-50 margin-auto center">
        <h2>Create</h2>
      <form class="form" action="index.php?ctrl=user&action=doCreate" method="POST">
        <input type="email" name="email" placeholder="Mail.." /><br />
        <input
          type="password"
          name="password"
          placeholder="Mot de
passe.."
        /><br />
        <input type="text" name="lastName" placeholder="Nom.." /><br />
        <input type="text" name="firstName" placeholder="Prénom.." /><br />
        <input type="text" name="address" placeholder="Adresse.." /><br />
        <input
          type="text"
          name="postalCode"
          placeholder="Code
Postal.."
        /><br />
        <input type="text" name="city" placeholder="Ville.." /><br />
        <p>
          <input type="submit" class="submit-btn" value="Créer/Valider" />
        </p>
      </form>
    </div>
