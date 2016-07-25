<?php
require __DIR__ . '\\vendor\\autoload.php';
use Lcobucci\JWT\Builder;
$token = (new Builder())->setId('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + 3600) // Configures the expiration time of the token (nbf claim)
                        ->set('userEmail', '443474713@qq.com') // Configures a new claim, called "uid"
                        ->set('userPass', 'fuckJava')
                        ->getToken(); // Retrieves the generated token


$token->getHeaders(); // Retrieves the token headers
$token->getClaims(); // Retrieves the token claims

echo $token; // The string representation of the object is a JWT string (pretty easy, right?)