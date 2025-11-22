# L'élément `<php>`
Parent: `<phpunit>`

L'élément `<php>` et ses enfants peuvent être utilisés pour configurer les paramètres PHP, les constantes et les variables globales. Il peut également être utilisé pour ajouter un chemin au début de l'`include_path`.

## L'élément `<includePath>`
Parent: `<php>`

Cet élément peut être utilisé pour ajouter un chemin au début de l'`include_path`.

## L'élément `<ini>`
Parent: `<php>`

Cet élément peut être utilisé pour définir un paramètre de configuration PHP.

```xml
<php><ini name="foo" value="bar"/></php>
```

La configuration XML ci-dessus correspond au code PHP suivant :

```php
ini_set('foo', 'bar');
Élément `<const>`
Parent: `<php>`
```
Cet élément peut être utilisé pour définir une constante globale.

```xml
<php><const name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
define('foo', 'bar');
```
Élément `<var>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une variable globale.

```xml
<php><var name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$GLOBALS['foo'] = 'bar';
```
Élément `<env>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_ENV.

```xml
<php><env name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_ENV['foo'] = 'bar';
```
Par défaut, les variables d'environnement ne sont pas écrasées si elles existent déjà. Pour forcer l'écrasement des variables existantes, utilisez l'attribut force :

```xml
<php><env name="foo" value="bar" force="true"/></php>
```
Élément `<get>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_GET.

```xml
<php><get name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_GET['foo'] = 'bar';
```
Élément `<post>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_POST.

```xml
<php><post name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :


```php
$_POST['foo'] = 'bar';
```
Élément `<cookie>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_COOKIE.

```xml
<php><cookie name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_COOKIE['foo'] = 'bar';
```
Élément `<server>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_SERVER.

```xml
<php><server name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_SERVER['foo'] = 'bar';
```
Élément `<files>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_FILES.

```xml
<php><files name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_FILES['foo'] = 'bar';
```
Élément `<request>`
Parent: `<php>`

Cet élément peut être utilisé pour définir une valeur dans le tableau super-global $_REQUEST.

```xml
<php><request name="foo" value="bar"/></php>
```
La configuration XML ci-dessus correspond au code PHP suivant :

```php
$_REQUEST['foo'] = 'bar';
```