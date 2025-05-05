# pay-php
Nkwa Pay SDK for PHP

<!-- Start Summary [summary] -->
## Summary

Nkwa Pay API: Use this API to integrate mobile money across your payment flows, create and manage payments, collections, and disbursements.

Read the docs at https://docs.mynkwa.com/api-reference
<!-- End Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents
<!-- $toc-max-depth=2 -->
* [pay-php](#pay-php)
  * [SDK Installation](#sdk-installation)
  * [SDK Example Usage](#sdk-example-usage)
  * [Authentication](#authentication)
  * [Available Resources and Operations](#available-resources-and-operations)
  * [Error Handling](#error-handling)
  * [Server Selection](#server-selection)

<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "nkwa-pay/sdk"
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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
<!-- End SDK Example Usage [usage] -->

<!-- Start Authentication [security] -->
## Authentication

### Per-Client Security Schemes

This SDK supports the following security scheme globally:

| Name         | Type   | Scheme  |
| ------------ | ------ | ------- |
| `apiKeyAuth` | apiKey | API key |

To authenticate with the API the `apiKeyAuth` parameter must be set when initializing the SDK. For example:
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
<!-- End Authentication [security] -->

<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [operators](docs/sdks/operators/README.md)


#### [operators->availability](docs/sdks/availability/README.md)

* [get](docs/sdks/availability/README.md#get) - Check which operators and operations are currently available.


### [payments](docs/sdks/payments/README.md)

* [get](docs/sdks/payments/README.md#get) - Get the payment (collection or disbursement) with the specified ID.
* [collect](docs/sdks/payments/README.md#collect) - Collect a payment from a phone number.
* [disburse](docs/sdks/payments/README.md#disburse) - Disburse a payment from your balance to a phone number.

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\APIException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `get` method throws the following exceptions:

| Error Type          | Status Code | Content Type     |
| ------------------- | ----------- | ---------------- |
| Errors\HttpError    | 401, 404    | application/json |
| Errors\HttpError    | 500         | application/json |
| Errors\APIException | 4XX, 5XX    | \*/\*            |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Pay;
use Pay\Models\Errors;

$sdk = Pay\Pay::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

try {
    $response = $sdk->payments->get(
        id: 'b888f774-3e7c-4135-a18c-6b985523c4bc'
    );

    if ($response->payment !== null) {
        // handle response
    }
} catch (Errors\HttpErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\HttpErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\APIException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

### Override Server URL Per-Client

The default server can be overridden globally using the `setServerUrl(string $serverUrl)` builder method when initializing the SDK client instance. For example:
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Pay;

$sdk = Pay\Pay::builder()
    ->setServerURL('https://api.pay.staging.mynkwa.com')
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
<!-- End Server Selection [server] -->

<!-- Placeholder for Future Speakeasy SDK Sections -->
