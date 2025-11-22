# L'élément `<groups>`
Parent: `<phpunit>`

L'élément `<groups>` et ses enfants `<include>`, `<exclude>` et `<group>` peuvent être utilisés pour sélectionner des groupes de tests, marqués avec l'attribut `Group` (documenté dans Group), qui devraient (ou ne devraient pas) être exécutés :

```xml
<groups>
  <include>
    <group>name</group>
  </include>
  <exclude>
    <group>name</group>
  </exclude>
</groups>
```

L'exemple ci-dessus est équivalent à invoquer l'exécuteur de tests PHPUnit avec les options de ligne de commande : ```--group name --exclude-group name```.