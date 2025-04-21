# Payments
(*payments*)

## Overview

### Available Operations

* [get](#get) - Get the payment (collection or disbursement) with the specified ID.
* [collect](#collect) - Collect a payment from a phone number.
* [disburse](#disburse) - Disburse a payment from your balance to a phone number.

## get

Get the payment (collection or disbursement) with the specified ID.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Pay;

$sdk = Pay\Pay::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->payments->get(
    id: 'b888f774-3e7c-4135-a18c-6b985523c4bc'
);

if ($response->payment !== null) {
    // handle response
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `id`                   | *string*               | :heavy_check_mark:     | ID of payment to fetch |

### Response

**[?Operations\GetPaymentsIdResponse](../../Models/Operations/GetPaymentsIdResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\HttpError    | 401, 404            | application/json    |
| Errors\HttpError    | 500                 | application/json    |
| Errors\APIException | 4XX, 5XX            | \*/\*               |

## collect

Collect a payment from a phone number.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Pay;
use Pay\Models\Components;

$sdk = Pay\Pay::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$request = new Components\PaymentRequest(
    amount: 834011,
    phoneNumber: '237650000000',
);

$response = $sdk->payments->collect(
    request: $request
);

if ($response->payment !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                              | Type                                                                   | Required                                                               | Description                                                            |
| ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| `$request`                                                             | [Components\PaymentRequest](../../Models/Components/PaymentRequest.md) | :heavy_check_mark:                                                     | The request object to use for the request.                             |

### Response

**[?Operations\PostCollectResponse](../../Models/Operations/PostCollectResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\HttpError    | 400, 401, 403       | application/json    |
| Errors\HttpError    | 500                 | application/json    |
| Errors\APIException | 4XX, 5XX            | \*/\*               |

## disburse

Disburse a payment from your balance to a phone number.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Pay;
use Pay\Models\Components;

$sdk = Pay\Pay::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$request = new Components\PaymentRequest(
    amount: 382447,
    phoneNumber: '237650000000',
);

$response = $sdk->payments->disburse(
    request: $request
);

if ($response->payment !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                              | Type                                                                   | Required                                                               | Description                                                            |
| ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| `$request`                                                             | [Components\PaymentRequest](../../Models/Components/PaymentRequest.md) | :heavy_check_mark:                                                     | The request object to use for the request.                             |

### Response

**[?Operations\PostDisburseResponse](../../Models/Operations/PostDisburseResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\HttpError    | 400, 401, 403       | application/json    |
| Errors\HttpError    | 500                 | application/json    |
| Errors\APIException | 4XX, 5XX            | \*/\*               |