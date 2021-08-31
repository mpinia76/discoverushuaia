<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-735757274935125-092821-8c4e34a4a7bfe324f899a6e2154917c1-652228506');



// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Discover Ushuaia Rent a Car';
$item->quantity = 1;
$item->unit_price = $pago;
$preference->items = array($item);
$preference->back_urls = array(
    "success" => "http://localhost//discoverushuaia/pagos/successMP.php?noperacion=".$nroOperacion,
    "failure" => "http://localhost//discoverushuaia/pagos/failureMP.php?noperacion=".$nroOperacion,
    "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";
$preference->statement_descriptor= "Discover Ushuaia Rent a Car";
$preference->binary_mode= true;
$preference->init_point;
$preference->external_reference= $nroOperacion;
$preference->save();
?>

<form action="/discoverushuaia/pagos" method="POST">
    <input type="hidden" name="nroOperacion" value="345">
    <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
        data-preference-id="<?php echo $preference->id; ?>">
    </script>
</form>

