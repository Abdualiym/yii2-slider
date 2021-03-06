# yii2-slider extension

The extension allows manage html content block.

### Installation

- Install with composer:

```bash
composer require abdualiym/yii2-slider "^1.0"
```

- **After composer install** run console command for create tables:

```bash
php yii migrate/up --migrationPath=@vendor/abdualiym/yii2-slider/migrations
```

- Setup in common config storage and language configurations.
> language indexes related with database columns.

> Admin panel tabs render by array values order. 

> Begin id param value from 0.
```php
'modules' => [
    'slider' => [ // don`t change module key
        'class' => '@abdualiym\slider\Module',
        'storageRoot' => $params['staticPath'],
        'storageHost' => $params['staticHostInfo'],
        'thumbs' => [ // 'sm' and 'md' keys are reserved
            'admin' => ['width' => 128, 'height' => 128],
            'thumb' => ['width' => 320, 'height' => 320],
        ],
        'languages' => [
            'ru' => [
                'id' => 0,
                'name' => 'Русский',
            ],
            'uz' => [
                'id' => 1,
                'name' => 'O`zbek tili',
            ],
        ],
    ],
]
```

- In admin panel add belove links for manage pages, article categories, articles and menu:
```php
/slider/categories/index
/slider/slides/index?slug=your_category_slug_name
/slider/tags/index
```

> For using SlidesController actions you must manual specify their category slug in route.

###Examples

Extension registers next language arrays to Yii::$app->params[] for use in views:
```php
\Yii::$app->params['cms']['languageIds'][$prefix] = $language['id'];
[
    'en' => 2,
    'ru' => 1,
    ...
]

\Yii::$app->params['cms']['languages'][$prefix] = $language['name'];
[
    'en' => 'English',
    ...
]


\Yii::$app->params['cms']['languages2'][$language['id']] = $language['name'];
[
    2 => 'English',
    ...
]
```

###Frontend widgets integration

> get all slides by category slug
```
abdualiym\slider\entities\Slides::getBySlug($slug)

```

> get all slides count by category slug
```
abdualiym\slider\entities\Slides::getBySlug($slug, true)

```

> get all tags
```
abdualiym\slider\entities\Tags::getAll()

```

> get all tags count
```
abdualiym\slider\entities\Tags::getAll(true)

```

###Examples for use in frontend see [yii2-language](https://github.com/Abdualiym/yii2-language) extension


---

> TODO 
 - Copy from extension root directory example widgets for frontend integration  
