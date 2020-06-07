
    <script
        src="https://www.paypal.com/sdk/js?client-id=ARgs-HAJc8YKzu4yLF3CfWHJs616kOemPfSB8pC053iucVrKBm67OjAz-7LuCcolKHa9qbAIyeCf3tuS&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>



    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR" data-sdk-integration-source="button-factory"></script>
    <script>
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'horizontal',
                label: 'paypal',

            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {@foreach($result as $kaina)
                            value:"{{$kaina->kr_kaina}}",
                            @break
                                @endforeach
                            currency: 'EUR'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    window.close('pay');
                });
            }
        }).render('#paypal-button-container');
    </script>
