<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-04e68125-e200-4a81-8320-c60650f4e06a');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'discoverushuaia';
$item->quantity = 1;
$item->unit_price = 78.90;
$preference->items = array($item);
$preference->save();
?>

<form action="/procesar-pago" method="POST" id="form_mercadopago">
              <script
               src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
               data-preference-id=<?php echo $preference->id; ?>
              </script>
            </form>
