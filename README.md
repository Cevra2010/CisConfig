# CisConfig
#### A simple database-based configuration storage


## Installation
```
composer require cis/cis-config
```


## Usage

#### Get config
```
<?php
use CisConfig\Config;
$myValue = Config::get('my-key');
```

#### Set config
```
<?php
use CisConfig\Config;
Config::get('my-key','my-value');
Config::get(['my-key','my-value']);
Config::get(['my-key' => 'my-value','my-key-2' => 'my-value-2']);
```
