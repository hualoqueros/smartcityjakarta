# smartcityjakarta
SDK for API smartcity jakarta
## What it is?
This is PHP SDK for access to http://api.jakarta.go.id/
# Installation
1. You have to register at http://api.jakarta.go.id/
2. Login and create new APP
3. Select All API service
4. Click Create Button
5. Now you have Token for your app (click your App Name)

Run this with your composer:
```code
composer require hualoqueros/smartcityjakarta
```
# Example
This is simple example :
```php
$token = "This is your token"
$class = new SmartCity\Jakarta($token);
echo $class->getRW();
```

# Development
We still updating for more endpoint..
