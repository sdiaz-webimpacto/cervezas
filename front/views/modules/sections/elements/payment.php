<?php

$totalProducts = $total;
$totalCarrier = $priceForCarrier;
$taxValue = $international['tax']/100;
$tax = $totalProducts*$taxValue;
$id_customer = $_SESSION['id'];
$id_cart = $cart_id;
$id_carrier = $carrierSelected;
$id_address = $addressSelected;

$total = $totalProducts+$totalCarrier+$tax;

if(empty($directions))
{
    $html = '
   <div class="alert alert-info"><b>Cree su primera dirección para poder ofrecerle los métodos de transporte</b></div>
   ';
}
elseif(empty($carriers))
{
    $html = '
    <div class="alert alert-info"><b>No existe transporte para su selección, pruebe a cambiar su dirección o a aumentar sus productos.</b></div>
    ';
} else {
    $html = '
<script src="https://www.paypal.com/sdk/js?client-id=AXldK0mExFjoq27sU8CbqbuxBXcUYdaiV5WDT3dCX798KCRZihRki7swc5e-0PpmjMIlRgLKSnGA3GFZ&currency=EUR"></script>
            <div id="paypal-button-container" data-pay-method="Paypal"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '.number_format($total,2).' // Can also reference a variable or function
              }
            }]
          });
        },
        //Data for buy test
        //email = sb-nfcjd20775253@personal.example.com
        //pass = 12345678
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log("Capture result", orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            
            if(transaction.status == "COMPLETED"){
                const method = $("#paypal-button-container").attr("data-pay-method");
                payCompleted('.$_SESSION['id'].',method);
            }
            
            
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById("paypal-button-container");
            // element.innerHTML = "<h3>Thank you for your payment!</h3>";
            // Or go to another URL:  actions.redirect("thank_you.html");
          });
        }
      }).render("#paypal-button-container");
</script>
';
}

echo $html;
