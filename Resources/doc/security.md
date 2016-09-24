Security
========

You need to add in all your administration controller methods this condition:

```php
if(!$this->get('tleroch_admin.security')->verify())
{
    return $this->redirect($request->getBaseUrl());
}
```