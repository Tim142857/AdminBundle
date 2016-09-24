Using layout
============

Extend default layout
---------------------

You can extends template like this:

```html
{% extends 'TlerochAdminBundle:Default:layout.html.twig' %}
```

Blocks
------

You can use this following blocks:

```
{% block content %}
    Page content
{% endblock %}
```

```
{% block javascripts %}
    Javascripts in footer
{% endblock %}
```

```
{% block stylesheets %}
    Stylesheets in header
{% endblock %}
```