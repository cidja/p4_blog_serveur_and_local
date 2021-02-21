<?php

try
    {
        $db = new PDO("mysql:host=localhost;dbname=p4;charset=utf8", "cidja", "pi");
        

    }
    catch(Exception $e)
    {
        die("Erreur: " . $e->getMessage());
    }

$user = htmlspecialchars($_POST["user"]);
$pwd = htmlspecialchars($_POST["mdp"]);
$pwdHash = password_hash($pwd,PASSWORD_DEFAULT); //source: https://www.php.net/manual/en/function.password-hash.php

$req = $db->prepare("INSERT INTO users (user, mdp, inscription_date, update_date)
                    VALUES (:user, :mdp, now(), now())");
$req->execute(array(
    "user"             => $user,
    "mdp"               => $pwdHash
));

?>
<div>
    <div>
        Nouveau id : <?= $user; ?>
    </div>
    <div>
        Nouveau mdp avant hashage: <?= $pwd; ?>
    </div>
    <div>
        Nouveau mdp crypté : <?= $pwdHash; ?>
    </div>
</div>

