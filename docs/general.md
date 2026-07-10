## Phalcon Traits

Phalcon Traits is a package that contains traits useful to Phalcon v6+. That does not stop developers from including the package in their own applications and even enhancing it.

The available traits contain as little code as possible and in most cases cover only one method. This might seem like overkill, but it is beneficial: only the code that a class actually requires is interpreted, and each wrapper can be mocked in isolation to cover application paths that depend on it.

Most methods are declared `protected static`, so a composing class can call them through `$this->` or `self::`. The exceptions are `Support\Helper\Str\CamelizeTrait::toCamelize()`, which is `public static`, and the `Factory\FactoryTrait` methods, which are instance methods.

Namespaces: the array, string and JSON helpers live under `Phalcon\Traits\Support\Helper\*`, while the PHP function wrappers live under `Phalcon\Traits\Php\*`.

The available traits are:

## Factory

### FactoryTrait

This trait offers the skeleton for creating factories. It holds an array where all the definitions are stored; the array can be extended by passing additional definitions to the constructor. The string keys are the service names and the values are the fully-qualified class names. Because the constructor-injected definitions are merged in, elements sharing the same name are replaced.

The methods offered are:

**getCachedInstance**
```php
protected function getCachedInstance(string $name, mixed ...$arguments): object
```
Returns an instance based on its name. The instance is stored in an internal array and the same instance is returned once initialized (see `getService()` and `getExceptionClass()`).

**getService**
```php
protected function getService(string $name): string
```
Returns a service (the fully-qualified class name) based on the name; throws the configured exception if it does not exist (see `getExceptionClass()`).

**getServices**
```php
abstract protected function getServices(): array
```
Returns the services for the factory as a string key/value array, where the key is the service name and the value is the fully-qualified class name.

**init**
```php
protected function init(array $services = []): void
```
Initializes services. Called from `__construct` and merges the passed services with those returned by `getServices()`.

**getExceptionClass**
```php
abstract protected function getExceptionClass(): string
```
Returns the exception class for the factory as a `class-string<\Throwable>` (the fully-qualified class name of a throwable that `getService()` raises when a service is missing).

## Support\Helper

Helpers under the `Phalcon\Traits\Support\Helper` namespace, matching the `Phalcon\Support\Helper` namespace used by the framework.

### Arr

Namespace containing traits relevant to array manipulation and processing.

#### FilterTrait
```php
protected static function toFilter(
    array $collection,
    callable|null $method = null
): array
```
Wraps `array_filter`. When no callable is passed the collection is returned unchanged; otherwise the callable is applied as the filter.

**Example**
```php
$filtered = $this->toFilter(
    $collection,
    function ($element) {
        return $element > 1;
    }
);
```

#### GetTrait
```php
protected static function getArrVal(
    array $collection,
    int|string $index,
    mixed $defaultValue = null,
    ?string $cast = null
): mixed
```
Returns an array element by key; when the key does not exist the default value is returned. The result can optionally be cast to a specific type (using `settype` internally) by passing a `$cast` such as `'boolean'`, `'integer'`, `'array'` etc.

**Example**
```php
echo $this->getArrVal(['one' => 1, 'two' => 2], 'two');
// 2
```

### Str

Namespace containing traits relevant to string manipulation and processing.

#### CamelizeTrait
```php
public static function toCamelize(
    string $text,
    string $delimiters = '-_',
    bool $lowerFirst = false
): string
```
Camelizes a string based on the passed delimiters (or the default `-_`). It optionally lowercases the first character. The conversion is byte-based ASCII, matching the cphalcon builtin.

**Example**
```php
echo $this->toCamelize('came_li_ze');
// CameLiZe
```

#### DirFromFileTrait
```php
protected static function toDirFromFile(
    string $file,
    bool $filesystemSafe = false
): string
```
Accepts a file name (without extension) and returns a calculated directory structure with the filename at the end. It keeps two letters at a time to build a deep directory tree, which avoids ever reaching file-system directory limits. When `$filesystemSafe` is `true`, dots in the computed segments are replaced with dashes.

**Example**
```php
echo $this->toDirFromFile('abcdef12345.jpg');
// 'ab/cd/ef/12/3/'
```

#### DirSeparatorTrait
```php
protected static function toDirSeparator(string $directory): string
```
Accepts a directory name and ensures that it ends with exactly one `DIRECTORY_SEPARATOR`.

**Example**
```php
echo $this->toDirSeparator('/home/phalcon');
// '/home/phalcon/'
```

#### EndsWithTrait
```php
protected static function toEndsWith(
    string $haystack,
    string $needle,
    bool $ignoreCase = true
): bool
```
Checks if a string ends with a given string. The comparison is case-insensitive by default and multibyte-aware; an empty haystack or needle returns `false`.

**Example**
```php
var_dump($this->toEndsWith('Hello', 'O', true));
// true
```

#### InterpolateTrait
```php
protected static function toInterpolate(
    string $input,
    array $context = [],
    string $left = '%',
    string $right = '%'
): string
```
Interpolates context values into the message placeholders, following [PSR-3][psr-3].

**Example**
```php
$input   = '[date] is the date [stub] is context';
$context = [
    'date' => '2020-09-09',
    'stub' => 'AAA',
];
echo $this->toInterpolate($input, $context, '[', ']');
// 2020-09-09 is the date AAA is context
```

#### LowerTrait
```php
protected static function toLower(
    string $text,
    string $encoding = 'UTF-8'
): string
```
Converts the passed string to lowercase using the `mbstring` extension.

**Example**
```php
echo $this->toLower('PhAlcOn');
// phalcon
```

#### StartsWithTrait
```php
protected static function toStartsWith(
    string $haystack,
    string $needle,
    bool $ignoreCase = true
): bool
```
Checks if a string starts with a given string. The comparison is case-insensitive by default and multibyte-aware; an empty haystack or needle returns `false`.

**Example**
```php
var_dump($this->toStartsWith('Hello', 'h', true));
// true
```

#### UncamelizeTrait
```php
protected static function toUncamelize(
    string $text,
    string $delimiter = '_'
): string
```
Uncamelizes a string based on the passed delimiter (or the default `_`). The conversion is byte-based ASCII, matching the cphalcon builtin.

**Example**
```php
echo $this->toUncamelize('CameLiZe');
// came_li_ze
```

#### UpperTrait
```php
protected static function toUpper(
    string $text,
    string $encoding = 'UTF-8'
): string
```
Converts the passed string to uppercase using the `mbstring` extension.

**Example**
```php
echo $this->toUpper('PhAlcOn');
// PHALCON
```

### Json

Namespace containing traits that wrap `json_encode`/`json_decode`. Both throw the native `\JsonException` on failure (a framework-flavored exception can be layered on top by the `Support` helper classes that consume these traits). The default `$options` value is `79` and the default `$depth` is `512`.

#### EncodeTrait
```php
protected static function toEncode(
    mixed $data,
    int $options = 79,
    int $depth = 512
): string
```
Encodes data using [json_encode][json-encode], throwing `\JsonException` when the data cannot be encoded.

#### DecodeTrait
```php
protected static function toDecode(
    string $data,
    bool $associative = false,
    int $depth = 512,
    int $options = 79
): mixed
```
Decodes a string using [json_decode][json-decode], throwing `\JsonException` when the string cannot be decoded.

## Php

PHP function wrappers. These are strongly typed (compared to the methods they wrap) and are very useful when testing different paths of an application that rely on these functions: the wrapper method can be easily mocked to ensure high code coverage.

### ApcuTrait
`apcu` based wrapper methods.

**phpApcuDec**
```php
protected static function phpApcuDec(string $key, int $step = 1): bool|int
```
[apcu_dec][apcu-dec]

**phpApcuDelete**
```php
protected static function phpApcuDelete(array|string $key): bool|array
```
[apcu_delete][apcu-delete]

**phpApcuExists**
```php
protected static function phpApcuExists(array|string $key): bool|array
```
[apcu_exists][apcu-exists]

**phpApcuFetch**
```php
protected static function phpApcuFetch(array|string $key): mixed
```
[apcu_fetch][apcu-fetch]

**phpApcuInc**
```php
protected static function phpApcuInc(string $key, int $step = 1): bool|int
```
[apcu_inc][apcu-inc]

**phpApcuIterator**
```php
protected static function phpApcuIterator(string $pattern): APCUIterator|bool
```
[APCUIterator][apcu-iterator]

**phpApcuStore**
```php
protected static function phpApcuStore(
    array|string $key,
    mixed $payload,
    int $ttl = 0
): bool|array
```
[apcu_store][apcu-store]

### Base64Trait
`base64` based wrapper methods.

**doDecodeUrl**
```php
protected static function doDecodeUrl(string $input): string
```
Decodes a Base64 URL string. Missing padding is restored and the URL-safe `-`/`_` characters are translated back to `+`/`/` before decoding.

**doEncodeUrl**
```php
protected static function doEncodeUrl(string $input): string
```
Encodes a string in Base64 URL format, translating `+`/`/` to `-`/`_` and stripping the `=` padding.

**phpBase64Decode**
```php
protected static function phpBase64Decode(
    string $input,
    bool $strict = false
): string|false
```
[base64_decode][base64-decode]

**phpBase64Encode**
```php
protected static function phpBase64Encode(string $input): string
```
[base64_encode][base64-encode]

### FileTrait
File based wrapper methods.

**phpFclose**
```php
protected static function phpFclose($handle): bool
```
[fclose][fclose]

**phpFgetCsv**
```php
protected static function phpFgetCsv(
    $stream,
    int $length = 0,
    string $separator = ',',
    ?string $enclosure = null,
    ?string $escape = null
): array|false
```
[fgetcsv][fgetcsv]

**phpFileExists**
```php
protected static function phpFileExists(string $filename): bool
```
[file_exists][file-exists]

**phpFileGetContents**
```php
protected static function phpFileGetContents(
    string $filename,
    bool $useIncludePath = false,
    $context = null,
    int $offset = 0,
    ?int $length = null
): false|string
```
[file_get_contents][file-get-contents]

**phpFilePutContents**
```php
protected static function phpFilePutContents(
    string $filename,
    $data,
    int $flags = 0,
    $context = null
): false|int
```
[file_put_contents][file-put-contents]

**phpFopen**
```php
protected static function phpFopen(
    string $filename,
    string $mode,
    bool $useIncludePath = false,
    $context = null
)
```
[fopen][fopen]

**phpFwrite**
```php
protected static function phpFwrite(
    $handle,
    string $data,
    ?int $length = null
): false|int
```
[fwrite][fwrite]

**phpIsWritable**
```php
protected static function phpIsWritable(string $filename): bool
```
[is_writable][is-writable]

**phpUnlink**
```php
protected static function phpUnlink(string $filename, $context = null): bool
```
[unlink][unlink]

### HashTrait
`hash` based wrapper methods.

**phpHash**
```php
protected static function phpHash(
    string $algorithm,
    string $data,
    bool $binary = false
): string
```
[hash][hash]

**phpHashEquals**
```php
protected static function phpHashEquals(
    string $knownString,
    string $userString
): bool
```
[hash_equals][hash-equals]

**phpHashHmac**
```php
protected static function phpHashHmac(
    string $algorithm,
    string $data,
    string $key,
    bool $binary = false
): string
```
[hash_hmac][hash-hmac]

### HeaderTrait
Header based wrapper method.

**phpHeadersSent**
```php
protected static function phpHeadersSent(): bool
```
[headers_sent][headers-sent]

### IgbinaryTrait
`igbinary` based wrapper methods.

**phpIgbinarySerialize**
```php
protected static function phpIgbinarySerialize(mixed $value): string|null
```
[igbinary_serialize][igbinary-serialize]

**phpIgbinaryUnserialize**
```php
protected static function phpIgbinaryUnserialize(string $value): mixed
```
[igbinary_unserialize][igbinary-unserialize]

### InfoTrait
Information method wrappers.

**phpExtensionLoaded**
```php
protected static function phpExtensionLoaded(string $name): bool
```
[extension_loaded][extension-loaded]

**phpFunctionExists**
```php
protected static function phpFunctionExists(string $functionName): bool
```
[function_exists][function-exists]

### IniTrait
`ini` based wrapper methods.

**phpIniGet**
```php
protected static function phpIniGet(
    string $input,
    string $defaultValue = ""
): string
```
[ini_get][ini-get], [ini list][ini-list]

**phpIniGetBool**
```php
protected static function phpIniGetBool(
    string $input,
    bool $defaultValue = false
): bool
```
Queries a php.ini value and returns it as a boolean; the tokens `true`, `on`, `yes`, `y` and `1` (case-insensitive) map to `true`. [ini_get][ini-get], [ini list][ini-list]

**phpIniGetInt**
```php
protected static function phpIniGetInt(
    string $input,
    int $defaultValue = 0
): int
```
[ini_get][ini-get], [ini list][ini-list]

**phpParseIniFile**
```php
protected static function phpParseIniFile(
    string $filename,
    bool $processSections = false,
    int $scannerMode = 0
): array|false
```
[parse_ini_file][parse-ini-file]

### MbCaseTrait
Multibyte case conversion wrapper method.

**phpMbConvertCase**
```php
protected static function phpMbConvertCase(string $input, int $mode): string
```
Converts the case of a string using [mb_convert_case][mb-convert-case] with the `UTF-8` encoding (`mbstring` is a required extension).

### MsgpackTrait
`msgpack` based wrapper methods.

**phpMsgpackPack**
```php
protected static function phpMsgpackPack(mixed $value): string
```
[msgpack_pack][msgpack-pack]

**phpMsgpackUnpack**
```php
protected static function phpMsgpackUnpack(string $value): mixed
```
[msgpack_unpack][msgpack-unpack]

### OpensslTrait
`openssl` based wrapper methods.

**phpOpensslCipherIvLength**
```php
protected static function phpOpensslCipherIvLength(string $cipher): int|false
```
[openssl_cipher_iv_length][openssl-cipher-iv-length]

**phpOpensslRandomPseudoBytes**
```php
protected static function phpOpensslRandomPseudoBytes(int $length): string
```
[openssl_random_pseudo_bytes][openssl-random-pseudo-bytes]

### SerializeTrait
`serialize`/`unserialize` based wrapper methods.

**phpSerialize**
```php
protected static function phpSerialize(mixed $value): string
```
[serialize][serialize]

**phpUnserialize**
```php
protected static function phpUnserialize(
    string $data,
    array $options = []
): mixed
```
[unserialize][unserialize]

### UrlTrait
Url wrapper methods.

**phpParseUrl**
```php
protected static function phpParseUrl(
    string $url,
    int $component = -1
): array|false|int|string|null
```
[parse_url][parse-url]

**phpRawUrlDecode**
```php
protected static function phpRawUrlDecode(string $string): string
```
[rawurldecode][rawurldecode]

**phpRawUrlEncode**
```php
protected static function phpRawUrlEncode(string $string): string
```
[rawurlencode][rawurlencode]

### YamlTrait
`yaml` based wrapper method.

**phpYamlParseFile**
```php
protected static function phpYamlParseFile(
    string $filename,
    int $pos = 0,
    mixed &$ndocs = null,
    array $callbacks = []
): mixed
```
[yaml_parse_file][yaml-parse-file]

[apcu-dec]: https://php.net/manual/en/function.apcu-dec.php
[apcu-delete]: https://php.net/manual/en/function.apcu-delete.php
[apcu-exists]: https://php.net/manual/en/function.apcu-exists.php
[apcu-fetch]: https://php.net/manual/en/function.apcu-fetch.php
[apcu-inc]: https://php.net/manual/en/function.apcu-inc.php
[apcu-iterator]: https://php.net/manual/en/class.apcuiterator.php
[apcu-store]: https://php.net/manual/en/function.apcu-store.php
[base64-decode]: https://www.php.net/manual/en/function.base64-decode.php
[base64-encode]: https://www.php.net/manual/en/function.base64-encode.php
[extension-loaded]: https://php.net/manual/en/function.extension-loaded.php
[fclose]: https://php.net/manual/en/function.fclose.php
[fgetcsv]: https://php.net/manual/en/function.fgetcsv.php
[file-exists]: https://php.net/manual/en/function.file-exists.php
[file-get-contents]: https://php.net/manual/en/function.file-get-contents.php
[file-put-contents]: https://php.net/manual/en/function.file-put-contents.php
[fopen]: https://php.net/manual/en/function.fopen.php
[function-exists]: https://php.net/manual/en/function.function-exists.php
[fwrite]: https://php.net/manual/en/function.fwrite.php
[hash]: https://php.net/manual/en/function.hash.php
[hash-equals]: https://php.net/manual/en/function.hash-equals.php
[hash-hmac]: https://php.net/manual/en/function.hash-hmac.php
[headers-sent]: https://php.net/manual/en/function.headers-sent.php
[igbinary-serialize]: https://php.net/manual/en/function.igbinary-serialize.php
[igbinary-unserialize]: https://php.net/manual/en/function.igbinary-unserialize.php
[ini-get]: https://php.net/manual/en/function.ini-get.php
[ini-list]: https://php.net/manual/en/ini.list.php
[is-writable]: https://php.net/manual/en/function.is-writable.php
[json-decode]: https://php.net/manual/en/function.json-decode.php
[json-encode]: https://php.net/manual/en/function.json-encode.php
[mb-convert-case]: https://php.net/manual/en/function.mb-convert-case.php
[msgpack-pack]: https://php.net/manual/en/function.msgpack-pack.php
[msgpack-unpack]: https://php.net/manual/en/function.msgpack-unpack.php
[openssl-cipher-iv-length]: https://php.net/manual/en/function.openssl-cipher-iv-length.php
[openssl-random-pseudo-bytes]: https://php.net/manual/en/function.openssl-random-pseudo-bytes.php
[parse-ini-file]: https://php.net/manual/en/function.parse-ini-file.php
[parse-url]: https://www.php.net/manual/en/function.parse-url.php
[psr-3]: https://www.php-fig.org/psr/psr-3/
[rawurldecode]: https://www.php.net/manual/en/function.rawurldecode.php
[rawurlencode]: https://www.php.net/manual/en/function.rawurlencode.php
[serialize]: https://php.net/manual/en/function.serialize.php
[unlink]: https://php.net/manual/en/function.unlink.php
[unserialize]: https://php.net/manual/en/function.unserialize.php
[yaml-parse-file]: https://php.net/manual/en/function.yaml-parse-file.php
