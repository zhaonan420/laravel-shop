<?php

return [
    'alipay' => [
        'app_id' => '2016073100130079',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0akvRS6fxDs9BSfvJWpJAyEqu7VYgM0MW2ZwXOR20prGnL/2TSBm35kihG1qdUmx+Vc7rtNNd9n6BDM70YcOBAaiASwpbMjqFHbuN3XfOO7nys9ImM7A3B1efCY6CmbD4O3FSrbsk51U9zo+Azwd+jtuulvxMAAuNkTIGPKUReGbqHDPEdUpcCAE357AuWlwUP5k3YUjHz/6zoADccQSP1wMpnHbNRzwWm4fVuW83SMSAWAjnArvxAikxZS8Ek1eibU7wURNzQrfhIE3FrZ5xij1wSbQTptFuWgq2e09DgdcXFAC9ascKq2gb12DTetn5otUjbaZax4qeykG3I6Z4wIDAQAB',
        'private_key' => 'MIIEpAIBAAKCAQEAsabYOMBlB7Q6c8LBZHXjlqZMoi2ghn/ZrT5uvi+J3QH38kinvDf1Z12uYPU3z+5SPSCOid76DTKSfeQ5WDSe3IIkH44pdoxpqT3zpEwZwlu7QVgwYbP0zRxU7SLXu1akxbz7ZYIw3hR8enASwfYjHNEqI2GphiE+IGfut6Ng86sfAQK4rKekMchPyGdMyFFB0PSBlvNe2rtmA2/SdkmwDWqrcmf/mrI3kNqOvEeCbBH/3h/y/pvSql8olOx9uO8R/3aQydKs/9Eknpp49iBcCIGE3Nzm0JyMQbtlD6Qtpp7mC9b6Jj5BjnocyzMHwi5/YbqCCz0N9HYKwYRgf3hn3wIDAQABAoIBAQCleajL7AHvVCRiMZWcMudEKzEUm3V78tjas13KD1PWJgBDkQOUoXcXyj4kmCVdrDq0L4A10hmOc33af9weWh1jfmGRdwUOJKpC967baftQe8uHiVK/nzU2XN6KaDsUiBdBDNAKdGN6aRCtp3kBbHi2XepnPJAAnTRWURkdurQTItK77H3TqF8uC6hG/Qpv951Gh7ZkDKuKfWKGRuf9kDHKUNNB4Vo37symrk6Ll3HDFLGECZHktgpF4W3l5MnRsdMZWjQeWuvUY1CZF47VBvIJPlBJHiLab4u8p4U0RWVF9tYwhkMawSFGr7nPjPnyz0LImWDql+ynX+N5tf5s4XGBAoGBAOPhj/v93JTmYwaEhZfjRWebxN43Snn2+/GuheAZGyz2leI82dwOu5iP/JrVYnuz2vcIk/kAp8ezI+96nS3r2IRmv0NAf9mKi9WaeWkSHwLexfUr3OlZHLjBYEv/6e6f80ePW3LvvlRrbULcvCexteLEVwUALPFUmfH809JuvmZBAoGBAMeSm8OsRaG790PYIz0YZrgIhRIzHWHYs8EPShjcCcQZ0ZRjM0eAb1yQ4FiqtkDUF6FPuCkvl/JXUjjKhNtvL5XzEymNgSGa5CNfEChqrivvF3maDPgxaNgo4C3Xe/kFM8CB9R+8LL/xZcvKGArrf844yGbYsaY5eWijPDGb5IYfAoGBAOBq+d5jkoD9JpZ7mgkL5AT2DXn+H5VfW50Wj3czomS0bsU/whmKVMsZOd7NuFA0vrY7t2YodBMh44jrSrG3qyIxAbjcY0w8uhthJqIIG4w7Ed6yFLula7izj/8ohxveX7qgfqIBYoJGzXJkadP5mjM5wq0FED2WYIlEwOJi95VBAoGAbcqT8qPVctKLh0FisXu5FslpG8gPBANJcI5OvzpeDQn/KFkintVjblMteNoBhcyoa1AGCnJqbyHm0+NmD6otTZr6EcQNJEWn+GWV6AY4Z2cTTQyY0fmsqi5ilhWT2D0qaV+VUK4fGEFfNSuq6mcAWp0Wcq4HnWDFD/GtbcVLhRUCgYBWcMfB7z2Os0jLlw9J/T7/s82nOcko0mG5sXYAGx+IvmTU/T2+fvTzMViRCDbC+U0Vy7k1VTLNntHgrVWTVqHk4JcD0z+whd/sGhX9b6a2CBcHbOLFPZpRazsryRHmmvQA2vy6vbW5nmoMXxs5nCW4T0Ifx8wWZfqMp8YrijPf4w==',
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
