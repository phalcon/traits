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

## Factory
### FactoryTrait
This trait offers the skeleton for creating factories. It contains an array 
where all the definitions are stored, which can be extended by passing 
additional definitions as an array in the constructor. The string keys of the 
array reflect the names of each service, while the values contain the string 
name of the class (using the full namespace). By using the constructor injected 
array of definitions, it is possible that certain elements will be replaced 
if they have the same name.

The methods offered are:

**getCachedInstance**
```php
protected function getCachedInstance(string $name, mixed ...$arguments): object
```
Returns a instance based on its name. The instance is stored in an internal
array and the method returns the same instance once initialized.
(see `getService()` and `getExceptionClass()` method)

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
Initialize services. Called in `__construct` and merges the passed services 
with those set in the `getServices()` method.


**getExceptionClass**
```php
abstract protected function getExceptionClass(): string;
```
Returns the exception class for the factory (as a string with the full 
namespace).

## Helper
### Arr
Namespace containing traits relevant to array manipulation and processing.

#### FilterTrait
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

### Str
Namespace containing traits relevant to string manipulation and processing.

#### CamelizeTrait

```php
/**
 * @param string      $text
 * @param string|null $delimiters
 * @param bool        $lowerFirst
 *
 * @return string
 */
public function toCamelize(
    string $text,
    string $delimiters = '\-_',
    bool $lowerFirst = false
): string
```
Accepts a string and camelizes it based on the passed delimiter (or the 
default one). It also allows the developer to lowercase the first character.

**Example**
```php
echo $this->toCamelize('came_li_ze');
// CameLiZe
```

The trait also exposes `staticToCamelize()` for calling the method statically.

#### DirFromFileTrait

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

#### DirSeparatorTrait
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

#### EndsWithTrait
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

#### InterpolateTrait
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

#### LowerTrait
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

The trait also exposes `staticToLower()` for calling the method statically.

#### StartsWithTrait
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

#### UncamelizeTrait

```php
/**
 * @param string $text
 * @param string $delimiters
 *
 * @return string
 */
public function toUncamelize(
    string $text,
    string $delimiter = '_'
): string
```
Accepts a string and uncamelizes it based on the passed delimiter (or the
default one)

**Example**
```php
echo $this->toUncamelize('CameLiZe');
// came_li_ze
```

The trait also exposes `staticToUncamelize()` for calling the method statically.

#### UpperTrait
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
echo $this->toUpper('PhAlcOn');
// PHALCON
````

The trait also exposes `staticToUpper()` for calling the method statically.

### Php
PHP function wrappers. These are strongly typed (compared to the methods they 
wrap). They are very useful when testing different paths of an application 
that rely on these methods. The wrapper method can be easily mocked to ensure
high code coverage.

#### FileTrait
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


#### IniTrait
`ini` based wrapper methods.

**iniGet**
```php
/**
 * @param string $input
 * @param string $defaultValue
 *
 * @return string
 */
protected function phpIniGet(string $input, string $defaultValue = ""): bool
```
[ini_get][ini-get], [ini list][ini-list]

The trait also exposes `phpStaticIniGet()` for calling the method statically.

**iniGetBool**
```php
/**
 * @param string $input
 * @param bool   $defaultValue
 *
 * @return bool
 */
protected function phpIniGetBool(string $input, bool $defaultValue = false): bool
```
[ini_get][ini-get], [ini list][ini-list]

The trait also exposes `phpStaticIniGetBool()` for calling the method statically.

**iniGetInt**
```php
/**
 * @param string $input
 * @param int    $defaultValue
 *
 * @return int
 */
protected function phpIniGetInt(string $input, int $defaultValue = 0): int
```
[ini_get][ini-get], [ini list][ini-list]

The trait also exposes `phpStaticIniGetInt()` for calling the method statically.

**parseIniFile**
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

The trait also exposes `phpStaticParseIniFile()` for calling the method statically.

#### JsonTrait
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


#### UrlTrait
Url wrapper methods

**doBase64DecodeUrl**
```php
/**
 * @param string $input
 * @param bool   $strict
 *
 * @return string
 */
protected function doBase64DecodeUrl(string $input, bool $strict = false): string
```
Decodes a URL using `base64_decode`. The decoding takes into account 
replacements that occur during encoding.

**doBase64EncodeUrl**
```php
/**
 * @param string $input
 *
 * @return string
 */
protected function doBase64EncodeUrl(string $input): string
```
Encodes a URL using `base64_encode`. The encoding replaces `-` and `_` characters
with `+` and `/`.

**phpBase64Decode**
```php
/**
 * @param string $input
 * @param bool   $strict
 *
 * @return string|false
 *
 * @link https://www.php.net/manual/en/function.base64-decode.php
 */
protected function phpBase64Decode(string $input, bool $strict = false)
```
[base64-decode][base64-decode]

**phpBase64Encode**
```php
/**
 * @param string $input
 *
 * @return string
 *
 * @link https://www.php.net/manual/en/function.base64-encode.php
 */
protected function phpBase64Encode(string $input): string
```
[base64-encode][base64-encode]

**phpParseUrl**
```php
/**
 * @param string $url
 * @param int    $component
 *
 * @return array|false|int|string|null
 *
 * @link https://www.php.net/manual/en/function.parse-url.php
 */
protected function phpParseUrl(string $url, int $component = -1)
```
[parse-url][parse-url]

**phpRawUrlDecode**
```php
/**
 * @param string $string
 *
 * @return string
 *
 * @link https://www.php.net/manual/en/function.rawurldecode.php
 */
protected function phpRawUrlDecode(string $string): string
```
[rawurldecode][rawurldecode]

**phpRawUrlEncode**
```php
/**
 * @param string $string
 *
 * @return string
 *
 * @link https://www.php.net/manual/en/function.rawurlencode.php
 */
protected function phpRawUrlEncode(string $string): string
```
[rawurlencode][rawurlencode]







[base64-decode]: https://www.php.net/manual/en/function.base64-decode.php
[base64-encode]: https://www.php.net/manual/en/function.base64-encode.php
[extension-loaded]: https://php.net/manual/en/function.extension-loaded.php
[json-decode]: https://php.net/manual/en/function.json-decode.php
[json-encode]: https://php.net/manual/en/function.json-encode.php
[fclose]: https://php.net/manual/en/function.fclose.php
[fgetcsv]: https://php.net/manual/en/function.fgetcsv.php
[file-exists]: https://php.net/manual/en/function.file-exists.php
[file-get-contents]: https://php.net/manual/en/function.file-get-contents.php
[file-put-contents]: https://php.net/manual/en/function.file-put-contents.php
[fopen]: https://php.net/manual/en/function.fopen.php
[function-exists]: https://php.net/manual/en/function.function-exists.php
[fwrite]: https://php.net/manual/en/function.fwrite.php
[ini-get]: https://php.net/manual/en/function.ini-get.php
[ini-list]: https://php.net/manual/en/ini.list.php
[is-writable]: https://php.net/manual/en/function.is-writable.php
[parse-ini-file]: https://php.net/manual/en/function.parse-ini-file.php
[parse-url]: https://www.php.net/manual/en/function.parse-url.php
[psr-3]: https://www.php-fig.org/psr/psr-3/
[rawurldecode]: https://www.php.net/manual/en/function.rawurldecode.php
[rawurlencode]: https://www.php.net/manual/en/function.rawurlencode.php
[unlink]: https://php.net/manual/en/function.unlink.php
