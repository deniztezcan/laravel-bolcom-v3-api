# Laravel Bol.com Retailer v3 API
[![Latest Stable Version](https://poser.pugx.org/deniztezcan/laravel-bolcom-v3-api/v/stable)](https://packagist.org/packages/deniztezcan/laravel-bolcom-v3-api) 
[![Total Downloads](https://poser.pugx.org/deniztezcan/laravel-bolcom-v3-api/downloads)](https://packagist.org/packages/deniztezcan/laravel-bolcom-v3-api) 
[![Latest Unstable Version](https://poser.pugx.org/deniztezcan/laravel-bolcom-v3-api/v/unstable)](https://packagist.org/packages/deniztezcan/laravel-bolcom-v3-api) 
[![License](https://poser.pugx.org/deniztezcan/laravel-bolcom-v3-api/license)](https://packagist.org/packages/deniztezcan/laravel-bolcom-v3-api)

A Laravel package for the Bol.com v3 Retailer API. Losely based on the incomplete `jasperverbeet/bolcom-retailer-api-v3-php` package.

## Instalation
```
composer require deniztezcan/laravel-bolcom-v3-api
```

Add a ServiceProvider to your providers array in `config/app.php`:
```php
    'providers' => [
    	//other things here

    	DenizTezcan\BolRetailerV3\BolServiceProvider::class,
    ];
```

Add the facade to the facades array:
```php
    'aliases' => [
    	//other things here

    	'BolRetailerV3' => DenizTezcan\BolRetailerV3\Facades\BolRetailerV3::class,
    ];
```

Finally, publish the configuration files:
```
php artisan vendor:publish --provider="DenizTezcan\BolRetailerV3\BolServiceProvider"
```

### Configuration
Please set your API: `key` and `secret` in the `config/bolcom-retailer-v3.php`

## How to use
- [Commission](#commission)
- [Offers](#offers)
- [Orders](#orders)
- [All features](#features)

### Commission
To get commissions in bulk, we need to send EANs in bulk.
```php
$request 		= BolRetailerV3::commissions()->getCommissions([['ean' => '3615674428738'], ['ean' => '0958054542376'], ['ean' => '1863180850327']]);
$commissions 	= $request->commissions;
```

To get commissions for the single EAN.
```php
$commission = BolRetailerV3::commissions()->getCommission('3615674428738');
```

### Offers

## Features
The following features are available (an - means the feature is planned, but not yet included):


Method | URI | From Version | Link to Bol documentation
--- | --- | --- | ---
POST | /retailer/commission | v1.1.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-commissions)
GET | /retailer/commission/{ean} | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-commission)
POST | /retailer/offers | v1.1.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/post-offer)
POST | /retailer/offers/export | v1.3.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/post-offer-export)
GET | /retailer/offers/export/{offer-export-id} | v1.3.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-offer-export)
GET | /retailer/offers/{offer-id} | v1.1.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-offer)
PUT | /retailer/offers/{offer-id} | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/put-offer)
PUT | /retailer/offers/{offer-id}/price | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/update-offer-price)
PUT | /retailer/offers/{offer-id}/stock | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/update-offer-stock)
GET | /retailer/orders | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-orders)
GET | /retailer/orders/{orders-id} | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/get-order)
PUT | /retailer/orders/{order-item-id}/cancellation | v1.1.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/cancel-order)
PUT | /retailer/orders/{order-item-id}/shipment | v1.0.0 | [link](https://api.bol.com/retailer/public/redoc/v3#operation/ship-order-item)
