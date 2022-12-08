# php-router

---
A directory based php routing system inspired by Sveltekits routing system.
---

I dont even know why I did this. I dont use php for such things. But I felt like php routing systems are kind of weird. php initially had file based routing, but overtime they switched to routing systems that I cant wrap my head around. So here is my alternative.

## How it works
---
### Usage of the api

To use the router system, you need a `routes` folder in your root directory. Then you can put in your `index.php` a new `Router` object.
Call `handle_request()` to validate, parse and render the incoming request. This will create the full site that you can receive with `get_page()` and `echo` it out.

Routes are defined by Folders instead of files. That gives us a more reliable structure.
Each directory in the `routes` folder is a url.
Each folder can have following files:

- page.php
- controller.php
- layout.php
- error.php

Where `page.php` is currently the only required (if it doesnt exist, the next error.php will be displayed), though it might be worth a thought if endpoint-only routes should be able to exist.

for this experiment, I decided to stay with php for the templating. So template files like `layout`, `page` and `error` are all `php` files.

### page.php

The `page.php` contains basically the html of your current site. It has access to 2 variables: `$file` and `$data`, where `$file` is just a string containing the url together with the filename of your page.php. The `$data` contains data that you can pass to the website via your `controller.php`

### controller.php

The `controller.php` contains a class with a namespace that **must** follow the directory route from the `routes` folder on. The classes name **must** be `Controller`. The Controller can have an arbitrary amount of properties and methods, but some are preserved:

- GET()
- POST()
- PUT()
- PATCH
- DELETE()
- layout()

Methods that are named after the http methods get called when the user hits the route with the given method. Each method returns the `data` array aswell, that gets sent to the `page.php`  The `layout` method returns `$data` that can be used in the `layout.php`

### layout.php

A layout file is a file which gets implemented at a specific subdirectory and from there on it remains part of the site of every children route. Next to the `$file` and `$data`, the `layout.php` takes a third variable `$slot` which contains every layout and page coming in its children directories. You can `echo` it right where you want the rest of your page to be. Given the root layout, you would want your `$slot` between the `<header>` and `<footer>` elements.

### error.php

If an error occurs - for example `404` or `500`, the system will give the user the next `error.php` it can find - begininng to search in the current directory and going up.

---

## Missing features

This router is currently missing route params.

---

## Demo

You can find a cool demo of how that stuff works in the `routes` directory.
