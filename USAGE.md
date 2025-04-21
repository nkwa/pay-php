<!-- Start SDK Example Usage [usage] -->
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