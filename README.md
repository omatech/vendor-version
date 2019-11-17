# Usage

```
$vv = new VendorVersion();
$vv->init(YOUR_PROJECT_ROOT_FOLDER);
$res=$vv->isInstalled('phpunit/phpunit');
// returns true or false

if ($res)
{
    $version_res=$vv->checkMinVersion('phpunit/phpunit', '8.0');
    // returns true if at least you have version 8.0 installed
    $version=$vv->getVersion('phpunit/phpunit');
    // now $version have the exact phpunit/phpunit installed
}
````

# Test

```
phpunit --bootstrap vendor/autoload.php tests
```