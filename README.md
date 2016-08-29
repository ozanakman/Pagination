# Pagination
This class has written for building advanced and beautiful pagination output.

You can easily build your structure with just 2 lines.

For Example:
```php
$pagination	= new \Sythdev\Pagination(100, 1, 20, 1, 3);
$output		= $pagination->build('somelink/page/','ul','li','ul-class','li-class', 'active');

echo $output;
```

Please check example.php file for more information.

## Installation

**Via composer:** composer require sythdev/pagination

**Manual:**
[Download Pagination Class](https://github.com/sythdev/pagination/archive/master.zip) 
Then use "require" or "include" like this
```php
require 'src/Pagination.php';
```
