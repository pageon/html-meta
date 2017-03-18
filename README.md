[![Build Status](https://scrutinizer-ci.com/g/brendt/html-meta/badges/build.png?b=master)](https://scrutinizer-ci.com/g/brendt/html-meta/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/brendt/html-meta/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/brendt/html-meta/?branch=master)

### Basic usages

```php
$meta = new Meta();

$meta->charset('UTF-8');
$meta->name('title', 'Hello World');
$meta->httpEquiv('Expires', '5000');
$meta->link('next', 'http://lorem.ipsum/?page=3');
$meta->property('og:type', 'type');

$meta->title('Title');
$meta->description('My Description');
$meta->image('/path/to//image.jpeg');
```

### Using it as an injectable service

```php
class MyService 
{
    public function __construct(Meta $meta) {
        $meta->image($this->image->getThumbnail());
    }
}
```

### Rendering

```php
$html = $meta->render();
```

```twig
{{ $meta->render() }}
```
