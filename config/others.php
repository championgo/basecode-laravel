<?php
return [
    'alipay' => [
        'app_id' => env('ALIPAY_APP_ID', ''),
        'merchant_private_key' => env('ALIPAY_MERCHANT_PRIVATE_KEY', ''),
        'charset' => env('ALIPAY_CHARSET'),
        'sign_type' => env('ALIPAY_SIGN_TYPE'),
        'gatewayUrl' => env('ALIPAY_GATEWAYURL'),
        'alipay_public_key' => env('ALIPAY_PUBLIC_KEY'),
        'return_url' => env('RETURN_URL'),
        'notify_url' => env('NOTIFY_URL')
    ],
    'wechat' => [
        'app_id' => env('WECHAT_APP_ID'),
        'secret' => env('WECHAT_SECRET'),
        'token' => env('WECHAT_TOKEN'),
        'aes_key' => env('WECHAT_AES_KEY'),
        'payment_merchant_id' => env('WECHAT_PAYMENT_MERCHANT_ID'),
        'payment_key' => env('WECHAT_PAYMENT_KEY'),
        'notify_url' => env('WECHAT_PRODUCT_NOTIFY_URL'),
    ]
];