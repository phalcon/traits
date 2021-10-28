## Phalcon Traits

Phalcon Traits is a package that contains traits useful to Phalcon v6+. That 
does not stop developers for including the package in their applications and 
even enhancing it.

The available traits contain as little code as possible and in most cases cover 
only one method. This might seem as an overkill since each trait inclusion in a 
class will result in the same amount of file reads when the class file is read. 
On the other hand, it is beneficial to do so, since only code that is required 
by the class is going to be interpreted. 

The available traits are:

### Factory
#### FactoryTrait
This trait offers the skeleton for creating factories. It contains an array 
where all the definitions are stored, which can be extended by passing 
additional definitions as an array in the constructor. The string keys of the 
array reflect the names of each service, while the values contain the string 
name of the class (using the full namespace). By using the constructor injected 
array of definitions, it is possible that certain elements will be replaced 
if they have the same name.

The methods offered are:

**getService**
```php
protected function getService(string $name)
```
Returns a service based on the name; throws exception if it does not exist.
(see `getExceptionClass()` method)

**getServices**
```php
abstract protected function getServices(): array
```
Returns the services for the factory. This is a string key/value array. As a key 
we define the name of each service, while the value has the class name (with 
the full namespace).

**init**
```php
protected function init(array $services = []): void
```
Initializes services. Called in `__construct` and merges the passed services 
with those set in the `getServices()` method.


**getExceptionClass**
```php
abstract protected function getExceptionClass(): string;
```
Returns the exception class for the factory (as a string with the full 
namespace).

### Helper
#### Arr
Namespace containing traits relevant to array manipulation and processing.

##### FilterTrait
```php
/**
 * @param array<array-key, mixed> $collection
 * @param callable|null           $method
 * @param int                     $mode
 *
 * @return array<int|string,mixed>
 */
protected function toFilter(
    array $collection,
    callable $method = null,
    int $mode = 0
): array {
 ```
Provides a wrapper to `array_filter` with a callable on an array.

**Example**
```php
$filtered = $this->toFilter(
    $collection, 
    function ($element) { 
        return $element > 1; 
    }
);
```

#### Str
Namespace containing traits relevant to string manipulation and processing.

##### DirFromFileTrait

```php
/**
 * @param string $file
 *
 * @return string
 */
protected function toDirFromFile(string $file): string
```
Accepts a file name (without extension) and returns a calculated directory
structure with the filename in the end. The file structure keeps two letters
from the file to create a deep directory structure based on the file name. This
method is used to store files without ever reaching file system directory limits
for files.

**Example**
```php
echo $this->toDirFromFile('abcdef12345.jpg');
// 'ab/cd/ef/12/3/'
```

##### DirSeparatorTrait
```php
/**
 * @param string $directory
 *
 * @return string
 */
protected function toDirSeparator(string $directory): string
```
Accepts a directory name and ensures that it ends with `DIRECTORY_SEPARATOR`

**Example**
```php
echo $this->toDirSeparator('/home/phalcon');
// '/home/phalcon/'
```

##### EndsWithTrait
Checks if a string ends with a given string

```php
/**
 * @param string $haystack
 * @param string $needle
 * @param bool   $ignoreCase
 *
 * @return bool
 */
protected function toEndsWith(
  string $haystack,
  string $needle,
  bool $ignoreCase = true
): bool
```

**Example**
```php
var_dump($this->toEndsWith('Hello', 'O', true);
// true
````

##### InterpolateTrait
Interpolates context values into the message placeholders [link][psr-3]

```php
/**
 * @param string $input
 * @param array  $context
 * @param string $left
 * @param string $right
 *
 * @return string
 */
protected function toInterpolate(
  string $input,
  array $context = [],
  string $left = '%',
  string $right = '%'
): string
```

**Example**
```php
$input   = '[date] is the date [stub] is context';
$context = [
    'date' => '2020-09-09',
    'stub' => 'AAA',
];
echo $this->toInterpolate($input, $context, '[', ']');
// 2020-09-09 is the date AAA is context
````

##### LowerTrait
Converts the passed string to lowercase using the `mbstring` extension.

```php
/**
 * @param string $text
 * @param string $encoding
 *
 * @return string
 */
protected function toLower(
  string $text,
  string $encoding = 'UTF-8'
): string
```

**Example**
```php
echo $this->toEndsWith('PhAlcOn');
// phalcon
````

##### StartsWithTrait
Checks if a string starts with a given string

```php
/**
 * @param string $haystack
 * @param string $needle
 * @param bool   $ignoreCase
 *
 * @return bool
 */
protected function toStartsWith(
  string $haystack,
  string $needle,
  bool $ignoreCase = true
): bool
```

**Example**
```php
var_dump($this->toStartsWith('Hello', 'h', true);
// true
````

##### UpperTrait
Converts the passed string to uppercase using the `mbstring` extension.
```php
/**
 * @param string $text
 * @param string $encoding
 *
 * @return string
 */
protected function toUpper(
  string $text,
  string $encoding = 'UTF-8'
): string
```

**Example**
```php
echo $this->toEndsWith('PhAlcOn');
// PHALCON
````

#### Php
PHP function wrappers. These are strongly typed (compared to the methods they 
wrap). They are very useful when testing different paths of an application 
that rely on these methods. The wrapper method can be easily mocked to ensure
high code coverage.

##### FileTrait
File based wrapper methods.

**phpFileExists**
```php
/**
 * @param string $filename
 *
 * @return bool
 */
protected function phpFileExists(string $filename)
```
[file_exists][file-exists]

**phpFileGetContents**
```php
/**
 * @param string $filename
 *
 * @return string|false
 */
protected function phpFileGetContents(string $filename)
```
[file_get_contents][file-get-contents]

**phpFilePutContents**
```php
/**
 * @param string   $filename
 * @param mixed    $data
 * @param int      $flags
 * @param resource $context
 *
 * @return int|false
 */
protected function phpFilePutContents(
  string $filename,
  $data,
  int $flags = 0,
  $context = null
)
```
[file_put_contents][file-put-contents]

**phpFclose**
```php
/**
 * Closes an open file pointer
 *
 * @param resource $handle
 *
 * @return bool
 */
public function phpFclose($handle)
```
[fclose][fclose]

**phpFgetCsv**
```php
/**
 * @param resource $stream
 * @param int      $length
 * @param string   $separator
 * @param string   $enclosure
 * @param string   $escape
 *
 * @return array|null|false
 */
protected function phpFgetCsv(
  $stream,
  int $length = 0,
  string $separator = ',',
  string $enclosure = '"',
  string $escape = '\\'
)
```
[fgetcsv][fgetcsv]

**phpFopen**
```php
/**
 * @param string $filename
 * @param string $mode
 *
 * @return resource|false
 */
protected function phpFopen(string $filename, string $mode)
```
[fopen][fopen]

**phpFwrite**
```php
/**
 * Binary-safe file write
 *
 * @param resource $handle
 * @param string   $data
 *
 * @return int|false
 */
protected function phpFwrite($handle, string $data)
```
[fwrite][fwrite]

**phpIsWritable**
```php
/**
 * Tells whether the filename is writable
 *
 * @param string $filename
 *
 * @return bool
 */
protected function phpIsWritable(string $filename): bool
```
[is_writable][is-writable]

**phpParseIniFile**
```php
/**
 * Parse a configuration file
 *
 * @param string $filename
 * @param bool   $process_sections
 * @param int    $scanner_mode
 *
 * @return array|false
 */
protected function phpParseIniFile(
  string $filename,
  bool $process_sections = false,
  int $scanner_mode = 1
)
```
[parse_ini_file][parse-ini-file]

**phpUnlink**
```php
/**
 * @param string $filename
 *
 * @return bool
 */
protected function phpUnlink(string $filename)
```
[unlink][unlink]

##### InfoTrait
Information method wrappers

**phpExtensionLoaded**
```php
/**
 * @param string $name
 *
 * @return bool
 */
protected function phpExtensionLoaded(string $name)
```
[extension_loaded][extension-loaded]

**phpFunctionExists**
```php
/**
 * @param string $function
 *
 * @return bool
 */
protected function phpFunctionExists(string $function)
```
[function_exists][function-exists]

**phpIniGet**
```php
/**
 * @param string $varname
 *
 * @return string
 */
protected function phpIniGet(string $varname): string
```
[ini_get][ini-get], [ini list][ini-list]

##### JsonTrait
JSON wrapper methods

**phpJsonEncode**
```php
/**
 * @param mixed $value
 * @param int   $flags
 * @param int   $depth
 *
 * @return false|string
 */
protected function phpJsonEncode($value, int $flags = 0, int $depth = 512)
```
[json_encode][json-encode]

**phpJsonDecode**
```php
/**
 * @param string    $json
 * @param bool|null $associative
 * @param int       $depth
 * @param int       $flags
 *
 * @return mixed
 */
protected function phpJsonDecode(
  string $json,
  ?bool $associative = null,
  int $depth = 512,
  int $flags = 0
)
```
[json_decode][json-decode]

[psr-3]: https://www.php-fig.org/psr/psr-3/
[file-exists]: https://php.net/manual/en/function.file-exists.php
[file-get-contents]: https://php.net/manual/en/function.file-get-contents.php
[file-put-contents]: https://php.net/manual/en/function.file-put-contents.php
[fclose]: https://php.net/manual/en/function.fclose.php
[fgetcsv]: https://php.net/manual/en/function.fgetcsv.php
[fopen]: https://php.net/manual/en/function.fopen.php
[fwrite]: https://php.net/manual/en/function.fwrite.php
[is-writable]: https://php.net/manual/en/function.is-writable.php
[parse-ini-file]: https://php.net/manual/en/function.parse-ini-file.php
[unlink]: https://php.net/manual/en/function.unlink.php
[extension-loaded]: https://php.net/manual/en/function.extension-loaded.php
[function-exists]: https://php.net/manual/en/function.function-exists.php
[ini-get]: https://php.net/manual/en/function.ini-get.php
[json-encode]: https://php.net/manual/en/function.json-encode.php
[json-decode]: https://php.net/manual/en/function.json-decode.php
[ini-list]: https://php.net/manual/en/ini.list.php
