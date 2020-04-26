<?php

return [
    'alipay' => [
        'app_id' => '2016073100130079',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0akvRS6fxDs9BSfvJWpJAyEqu7VYgM0MW2ZwXOR20prGnL/2TSBm35kihG1qdUmx+Vc7rtNNd9n6BDM70YcOBAaiASwpbMjqFHbuN3XfOO7nys9ImM7A3B1efCY6CmbD4O3FSrbsk51U9zo+Azwd+jtuulvxMAAuNkTIGPKUReGbqHDPEdUpcCAE357AuWlwUP5k3YUjHz/6zoADccQSP1wMpnHbNRzwWm4fVuW83SMSAWAjnArvxAikxZS8Ek1eibU7wURNzQrfhIE3FrZ5xij1wSbQTptFuWgq2e09DgdcXFAC9ascKq2gb12DTetn5otUjbaZax4qeykG3I6Z4wIDAQAB',
        'private_key' => 'MIIEowIBAAKCAQEAheZfwc8ULWcs0bVxxYlFGMosc5C/lZbzx4TN1yA9Bm4BoMjX7OoomCB1T+KNnU8zRVeM/Gc1mpFnD5s9RvUz3XCrAaPVnDfGDnVRj6SPoi3trUoDJSYDPT4XGs2SzhMGLFkU80n86YdImr5qTFxyVcp0NPsLp6aXX5glBc/0ZjMv7QdKDS9ZQyO00/zJL6DMzRXEGGNXJO2+NridklVyyPYtbaKswIIWIaTzeAiU+1rNIJLAq5qdV5U0+Pu7ZS4Lr9DYxGwFKUtJhy3nNkfEB8+CLCcsiH+GMW1twJus2Yz/NT1eBAu1f+mcGOA4n6W1Zat8g5lci47I4Jf19JsmsQIDAQABAoIBAF6/6Qy04xtJwh5XHb3hZ+Kl1ZSlXdyVp8WMhTfwWR5+o2pKFPlRrQ4REdJIh1tEmww7asmEoxrQPzR87nySsHPG8UtEyrgzg1Ph0qgpk3X4uBICqH0WC/6/PAw8YeCu95RUKQ4LUgtSLp9JlOCaHlH05AxFhTbKHJ2JhNE7GT9jfIXRUd+sn0LsrPkcaN2tdw5RnuS7jfk2IdiiHqGVxfsBzj2/AdPQtuQUwwp0LQuRVVMZfUGd/oXzzWVtp4Uk1iStP8Ucn/zqe1Oqloem9J4F8U2nsSmRib4t4pa5qWlvsma9PWQbEN8mXu0oP6/OOqqgC5AddoGUutGxoipNMAECgYEAx6bnYqqEbdp8cBGDX1u40hsGHfNfii1PvRwcJiWYpvRFLezXjIF3O/lkOr/D58D7/F3NxxBR7yTo1JPA+r2MqH9z1nh7ADNkRnI9NWOXIc+RXKgFZXO/xpjkCkpRJniVPBsd5XgW6+qRc3VMxOPYNph/ow8nUkbVfrAhywhUHwECgYEAq7DNvLVrINjUfaK4Se0LHITkF+RnXWkXFZt5rTiMEO8g/xBfdkeg/LLHbkMOa9ZCWSshULLMc+eeYuq5fzr2h5jxDwY2pTLJq7ZoMIydGgZqCTXwKE6iuhgAITBCoVgwqO2knLw+mS5Rui6bb2fL6fdY6lnywzkYzzUlUFhIt7ECgYBQSnr7Xv/q/dbVavWeP9DQDjYjjWB6vUY4EznuzWfanJnFol39D4PYBq+cQMqURTQRhdffmlyZBAruko0lSV1r1fXL5p/wsLo+6mpbMjXxTvxyes/QwP/66jmrOb/w7MV3aqBXTDhLoAXmnOHGvKqTKjkKZmm12O67CDJO6IaMAQKBgCTVbY4Krc0CN7QscLULcdLQf87QZYyYuycbj+Mluob3hnCyJojNnTAZesehAzsHYHyY0DDr6wkCq+w0x08Qa0tz+GNsxdRzLOj13SxtPlcTATSwqbE8DZU3CPAV1nWe4fGb6jDmAdgDI+15ikdAUXMEacL9QSO44CW0FSlDh3ZBAoGBALUsw06UPjb/PfpKH80W5fdI+oP1aTXTar5u4BLLnL4QJhhhtfBahuQgtpvIjqHpH4GyR0TAORdB+pqFG9G2aBE6khrhEQZY9IHvTcxVd09nTJRmZ4b5dIFNbv4zGZn5VrqEeAMb5nPMvDE4BYF2Q8Sc6ug0zTRAlIo4ExcO0m0N',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id' => '',
        'mch_id' => '',
        'key' => '',
        'cert_client' => '',
        'cert_key' => '',
        'log' => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
