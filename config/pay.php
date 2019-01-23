<?php

return [
    'alipay' => [
        'app_id'         => '2016092300575442',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA6wufbReaJvAvdQt0n2Ri/1PGVID7kRU8Tj1OD/gNuy7fYC4jO9VH387g4+ppXt82BzSJ/WHb0wMThbCl1pvknFIyFWClaMDwHV1VZ7YBjkAYTKT8gzRZrSmlr3UF63eKlZ5zOjGcqtUDWuhxVwb5ubduY3IC8lxpwGGNTTWLdDFMDDLaHAKJi2PoymQFtC1AeQ5hJrteV6pln6RcYDu7RQr2W8+1T7e7J8is0UOTtC1qY1S7+8uRtFVuVyKkSy9cmruifbt/wMR/UXnouVjqzqo7lpAGTNPJ5XjONY6ODYNnksj8qUaj6FxKHdtCMDNlE/ML/ZCcptLqkcDLnrP/cwIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEA6wufbReaJvAvdQt0n2Ri/1PGVID7kRU8Tj1OD/gNuy7fYC4jO9VH387g4+ppXt82BzSJ/WHb0wMThbCl1pvknFIyFWClaMDwHV1VZ7YBjkAYTKT8gzRZrSmlr3UF63eKlZ5zOjGcqtUDWuhxVwb5ubduY3IC8lxpwGGNTTWLdDFMDDLaHAKJi2PoymQFtC1AeQ5hJrteV6pln6RcYDu7RQr2W8+1T7e7J8is0UOTtC1qY1S7+8uRtFVuVyKkSy9cmruifbt/wMR/UXnouVjqzqo7lpAGTNPJ5XjONY6ODYNnksj8qUaj6FxKHdtCMDNlE/ML/ZCcptLqkcDLnrP/cwIDAQABAoIBAQCsDngHva1EL7IttdMLEss9KLAYD8sXazoX89x+6A/1I9y0ZVG5bOkONjx92oyDvFWqdJVGfCoUjz3tMWBUdw2kOK8c4wBybDnY5QetwZfl75laEbQev2Wd0szMYZeRxJIX8ENdKBANJZ0tINZG5H5Nqq8N8NmjXG61OzPafwW0aTKYZgYOwwzZZIfLhsrCRC8NfvaTramFF54AKlfD38NG26AzxM0g7oNNJsdjvObA7d2Ok2yx6xb784cr5nWb33YzY9YjfgLjHucVey+N/R1YknkG2MGTV1DYxMyjbJRa+/RQFCdqa0Q+f6FgZIdygyA4Y3oBeP43YEqTb1PzuecRAoGBAPmp3968BOt8G8Jhn739QMqdr70Rlq6jVoAgmMVYnmURinsTzMncEQLxfMmyjudJBUxe7AwnfwwhqTzYj3/0PKEJfwJZJYzezJ85H+3iUHhz/IjmRCkCwMdjwDfftK+Z/Oz/ch9oto+j06NYhsUJ86c2LhsB9Br3tYCDdZp8fFIXAoGBAPECxTphgs0MUXXzYJkTXQa8sm4Q34BLGhwpZaT6O96qnLyOpaCIWNdrjTBivbXgEe/z3ITP6edOP7Owz9wxLu+BbkQAJjIOuskCMazW5r8k5qiz79KuMA8nMwDd1TeJWUuglNINwiEhF100nLXNyu2Fd5MdFeLP4Gkr5kxB5OMFAoGBAJmv187N4R1w5cmvvN0AhBz2GtOBe0d/5uSyrDh3h/HhbWS8WIk+ff5Y15912oBHtApCOH525b97DSoWiaeTmqrrJJM2e2YPVNkDGkOe2Dh99cv0K6svNarIHfCHNjwOx+LAkOkC1bbwe3yHJ1ct/B5HvPQFLNZY/BLjWcbCsOj7AoGACxDGf2y0tbdoEhNPjxetgL6vLpCFwn0wQLTB3vZCQ3Hv6lReVGWONq3QeLU/4pbcG/lFWa+2HJGiKRzoHkL/1a1Ko8Kh/lBg0RPRtg7T31jRYlOIolKvEDMLi3Gj9X3P5MIFszNAg4bibLwaqdo+A/PJzq5aL+S9d/a1BzFLUgUCgYEAhU/Rg6Cz99phQ8GCu5PrJ4rELU019Mc+Ab+n9XrW8wTfYx1hXA+YmYpKmZa9DTaXGGUU8ZWsa9bcm+XJCx8VwkcRgZyqHwmmdbkLlA/kh1wGJWXK3VM4si4Oc4Zmx2Sm5SqQ+y7kap7JzUAUn7Gju24XkkvjU4uJHeI2Z6ueAx8=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];