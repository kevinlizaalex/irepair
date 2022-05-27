<?php
require('stripe-php-master/init.php');
$publishableKey = "pk_test_51K3Zq4SJlW41rTlc7WOcIBcz4Ly24cK2KlklLNCJzaWmztNOxRvKC0HhwyhGY3b8BnNBZeaLAAgPsVNeR6HSYmwS0093ftdJ4x";
$secretKey = "sk_test_51K3Zq4SJlW41rTlcpbgNsjRWmqk8k7MTYKtICvBAZBZ41l1lFftoe5MPW26tH7i7H7sZKQLQZZaJkPAlNm6ziCkg00OLdJzBmQ";
\Stripe\Stripe::setApiKey($secretKey);
