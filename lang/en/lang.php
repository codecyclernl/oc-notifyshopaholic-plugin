<?php return [
    'plugin' => [
        'name'          => 'Shopaholic for Notify',
        'description'   => 'Shopaholic integration for the Notify plugin for October CMS',
    ],

    'events' => [
        'order_created' => [
            'name' => 'Order created',
            'description' => 'When an order is created',
            'group' => 'shopaholic',
        ],
    ],

    'rules' => [
        'title' => [
            'order_number'  => 'Order number',
            'name'          => 'Name',
            'last_name'     => 'Last name',
            'email'         => 'Emailaddress',
        ],
        'label' => [
            'order_number'  => 'The order number',
            'name'          => 'Name of the user',
            'last_name'     => 'Last name of the user',
            'email'         => 'Emailaddress of the user',
        ],
    ],
];
