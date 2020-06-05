
    <script
        src="https://www.paypal.com/sdk/js?client-id=ARgs-HAJc8YKzu4yLF3CfWHJs616kOemPfSB8pC053iucVrKBm67OjAz-7LuCcolKHa9qbAIyeCf3tuS&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
{{--                                <script>paypal.Buttons().render('#paypal-button-container');</script>--}}
<script>
    {{--/*   @foreach($result as $kaina)--}}
    {{--   <h2 class="total" style="text-align: end">Total &nbsp;<span class="kaina">{{$kaina->kr_kaina}} €</span></h2>--}}
    {{--   @break--}}
    {{--   @endforeach*/--}}
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {@foreach($result as $kaina)
                        value:"{{$kaina->kr_kaina}}"
                        @break
                        @endforeach
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);

            });
        }
    }).render('#paypal-button-container');
    </script>

