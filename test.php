<?php
$url = 'https://graphql.kuitansiku.my.id/graphql';
$payload = json_encode([
    'query' => '
        query GetAllSalesPackagePlans($filter: SalesPackagePlanFilter) {
            GetAllSalesPackagePlans(filter: $filter) {
                data {
                    _id
                    package_name
                }
            }
        }
    ',
    'variables' => [
        'filter' => [
            'page' => 1,
            'limit' => 10
        ]
    ]
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$response = curl_exec($ch);
curl_close($ch);

echo "RESPONSE KUITANSIKU:\n$response\n";

$url2 = 'https://graphql.pantoo.my.id/graphql';
$ch2 = curl_init($url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload);
$response2 = curl_exec($ch2);
curl_close($ch2);

echo "RESPONSE PANTOO:\n$response2\n";
