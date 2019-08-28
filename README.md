# Magento2 simple calculator with use REST API

## Installation:

Copy and paste(or clone) module to folder [root_magento_dir]/app/code/Tests 
then in CLI run php bin/magento setup:upgrade

## How to use
Call url http://[host-name]/rest/V1/api/rce/calculator/

## Parameters
"left": First number (int|float),
---
"right": Second number (int|float),
---
"operator": Operator for operation (string), may take values - [add,subtract,multiply,divide,power]
---
"precision": Precision (int) - Optional parameter , default value - 2
---

## Example request
{
"left": 12.34,
"right": 56.78,
"operator": "string",
"precision": 2
}

## Example response
{
"status": "OK",
"result": 123.45
}
