<style>
<?php include 'style.css'; ?>
</style>

<?php

$postData = $_POST;

if (isset($postData['username']) &&  isset($postData['password'])) 
{
    if ($user['username'] === $postData['username'] &&  $user['password'] === $postData['password']) 
    {
        $loggedUser = ['username' => $user['username'], ];

        /**
         * Cookie qui expire dans 2h
         */
        setcookie('LOGGED_USER',  $loggedUser['username'], ['expires' => time() + 2*3600, 'secure' => true, 'httponly' => true, ]);

        $_SESSION['LOGGED_USER'] = $loggedUser['username'];
    } 
    else 
    {
        echo "<br>";
        $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $postData['username'], $postData['password']);
    }
}

// Si le cookie ou la session sont présentes
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) 
{
    $loggedUser = ['username' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'], ];
}
?>

<?php if(!isset($loggedUser)): ?>

    <form action="index.php" method="post">
        <?php if(isset($errorMessage)) : ?>
            <?php echo($errorMessage); ?>
        <?php endif; ?>
        <br>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
        <br>
        <button type="submit">Se connecter</button>
    </form>
<?php endif; ?>