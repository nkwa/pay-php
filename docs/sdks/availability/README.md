# Availability
(*operators->availability*)

## Overview

### Available Operations

* [get](#get) - Check which operators and operations are currently available.

## get

Check which operators and operations are currently available.

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



$response = $sdk->operators->availability->get(

);

if ($response->availabilities !== null) {
    // handle response
}
```

### Response

**[?Operations\GetAvailabilityResponse](../../Models/Operations/GetAvailabilityResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\HttpError    | 401                 | application/json    |
| Errors\HttpError    | 500                 | application/json    |
| Errors\APIException | 4XX, 5XX            | \*/\*               |