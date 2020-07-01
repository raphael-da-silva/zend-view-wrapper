## Zend view wrapper

Um wrapper para o componente de view da Zend. O propósito é simplificar o uso do componente.

### Criação do objeto

Para criar o objeto é possível usar a factory. Para adicionar helpers é necessário passar o terceiro parâmetro que é um callable. No exemplo a seguir é passada uma função anônima para registrar os helpers.

```php
$view = \SimpleZendViewWrapper\ZendViewRendererFactory::create(
    'path/to/views',
    'layout.php',
    function($renderer, $pluginManager){

        $pluginManager->setService('MyHelperExample', new \MyHelperExample);

    }
);
```

### Usar o wrapper para gerar uma view

O método render espera o arquivo e um arrau com as variáveis.

```php
$view->render('index.php', [
    'message' => 'Hello world'
]);
```

