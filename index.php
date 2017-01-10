 <?php
 
ini_set('display_errors', true);
error_reporting(E_ALL);
 
require_once "../php-mercadobitcoin-api/vendor/autoload.php";
require_once 'config.php';

use JonasOF\PHPMercadoBitcoinAPI\PHPMercadoBitcoinAPI;
use JonasOF\PHPMercadoBitcoinAPI\NonceMethods\File;
use \JonasOF\PHPMercadoBitcoinAPI\Exceptions\WrongNonceNumberException;

$api = new PHPMercadoBitcoinAPI([
    "TAPI_ID" => $TAPI_ID,
    "TAPI_PASSWORD" => $TAPI_PASSWORD,
], new File ($NONCE_FILE));

echo "<h1> Informações da conta: </h1>";
try {
    var_dump($api->getAccountInfo());
} catch(WrongNonceNumberException $e) 
{
    echo "Seu número nonce é menor que o último usado ($e->nonce_atual). Favor ajuste-o";
}