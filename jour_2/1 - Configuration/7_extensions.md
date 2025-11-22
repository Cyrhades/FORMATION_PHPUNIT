# L'élément `<extensions>`
Parent: `<phpunit>`

L'élément `<extensions>` et ses enfants `<bootstrap>` peuvent être utilisés pour enregistrer des extensions de l'exécuteur de tests (test runner extensions).

## L'élément `<bootstrap>`
Parent: `<extensions>`

```xml
<extensions>
    <bootstrap class="Vendor\ExampleExtensionForPhpunit\Extension"/>
</extensions>
```
Cet élément enregistre une extension à charger avant l'exécution des tests.

Voici la traduction en français du contenu, présentée au format Markdown strict :



# L'élément `<extensions>`
Parent: `<phpunit>`

L'élément `<extensions>` et ses enfants `<bootstrap>` peuvent être utilisés pour enregistrer des extensions de l'exécuteur de tests (test runner extensions).


## L'élément `<bootstrap>`
Parent: `<extensions>`

```xml
<extensions>
    <bootstrap class="Vendor\ExampleExtensionForPhpunit\Extension"/>
</extensions>
```
Cet élément enregistre une extension à charger avant l'exécution des tests.

Élément `<parameter>`
Parent: `<bootstrap>`

L'élément `<parameter>` peut être utilisé pour configurer des paramètres qui sont passés à l'extension lors de son initialisation (bootstrapping).

```xml
<extensions>
    <bootstrap class="Vendor\ExampleExtensionForPhpunit\Extension">
        <parameter name="message" value="the-message"/>
    </bootstrap>
</extensions>
```