<?php $title = 'Connexion Administrateur'; ?>

<?php ob_start(); ?>

<h1>Connexion Administrateur</h1>

<form style = " margin-left: 30%;margin-right: 30%; padding: 10px; margin-top: 50px; margin-bottom: 50px; text-align: center; background-color: #CCCCCC" action="connexion.php" method="post">
	<p>
	    <span style="color:red">Mauvais identifiant ou mot de passe !</span>
	    <p><label for="pseudo">Votre pseudo</label>    <input type="text" name="pseudo" id="pseudo" value= "<?php if (isset ($_COOKIE['pseudo'])) echo htmlspecialchars($_COOKIE['pseudo']); ?>"/><br /></p>
	    <p><label for="pass">Mot de passe</label>    <input type="password" name="pass" id="pass" value= "<?php if (isset ($_COOKIE['pass'])) echo htmlspecialchars($_COOKIE['pass']); ?>"/><br /></p>
	    <p style="position: relative; left: -105px">  <label for="case">Connexion automatique</label> <input type="checkbox" name="case" checked="checked" id="case" /><br /></p>
	    <p><input type="submit" name="submit" value="Valider" /></p>
	</p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>