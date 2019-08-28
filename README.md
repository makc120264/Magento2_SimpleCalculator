# Magento2 simple calculator with use REST API

## Installation:

Copy and paste(or clone) module to folder [root_magento_dir]/app/code/Tests 
then in CLI run php bin/magento setup:upgrade

## How to use
Call url http://[host-name]/rest/V1/api/rce/calculator/

## Parameters
* "left": First number (int|float),<br>
* "right": Second number (int|float),<br>
* "operator": Operator for operation (string), may take values - [add,subtract,multiply,divide,power]<br>
* "precision": Precision (int) - Optional parameter , default value - 2<br>

## Example request
{<br>
  "left": 12.34,<br>
  "right": 56.78,<br>
  "operator": "string",<br>
  "precision": 2<br>
}

## Example response
{<br>
  "status": "OK",<br>
  "result": 123.45<br>
}
