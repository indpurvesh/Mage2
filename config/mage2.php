<?php

return array(
    'payment' => array(
                'paypal' => array('class' => '/Modules/Core/Payment',
                                    'label' => 'Paypal'),
                'creditcart' => array('class' => '/Modules/Core/Payment',
                                    'label' => 'Credit Cart')
            ),
    'shipping' => 
            array(
                'freeshipping' => array('class' => "/Modules/Core/Shipping",
                                        'label' => 'Free Shipping'),
                'pickup' => array('class' => "/Modules/Core/Shipping",
                                    'label' => 'Pick Up from Store')
            ),
);