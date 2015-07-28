# laravel-meta

## Installation

```
"repositories": [
    {
        "url": "https://github.com/Metrique/laravel-meta",
        "type": "git"
    }
]
```

1. Add the above to the repositories section of your composer.json
2. Add `"Metrique/laravel-meta": "dev-master"` to the require section of your composer.json.
3. Add `Metrique\Meta\MetaServiceProvider::class,` to your list of service providers. in `config/app.php`.
4. `composer update`

## Usage

### Config

Config defaults can be configured by editing `config/meta.php` in your main application directory.

You can publish the `config/meta.php` config file to your application config directory by running `php artisan vendor:publish`

### Blade include

**laravel-meta** includes a basic view to get your started, just drop `@include('laravel-meta::meta')` into any blade template.

### Title

Title manages the title tag of any page.

`$meta->title()->toString()` Returns the title as a string.

`$meta->title()->set($title)` Sets the title.

`$meta->title()->decorate($bool)` Enables/Disables prefix/suffix/seperator decoration of the title.

`$meta->title()->prefix($prefix)` Sets the title prefix.

`$meta->title()->suffix($suffix)` Sets the title suffix.

`$meta->title()->seperator($seperator)` Sets the title seperator.

### Tags

`$meta->tags()->toArray()` Return the tags in an array, in html format.

`$meta->tags()->add($attributes)` Add a new meta tag or set of meta tags.

```
$meta->tags()->add([
    ['charset'=>'utf-8'],
    ['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1']
]);
```

`$meta->tags()->remove($attributes)` Remove a meta tag or set of meta tags by key/value pairs. The value is treated as a wild card when it is set to null.

```
$meta->tags()->remove([
    ['charset'=>null],
    ['name'=>'viewport', 'content'=>null]
]);
```
`$meta->tags()->clear()` Clears all tags.

`$meta->tags()->template($template)` Sets the template used to generate the meta tags. The default template is `<meta%s>`.
