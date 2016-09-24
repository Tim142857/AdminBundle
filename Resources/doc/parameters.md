Configuration
=============

Configuration options
---------------------

You must create in config.yml this options:

```yml
tlr_admin:
    security_seed:
    customer_email:
    redirect_route:
```

### security_seed

Seed used to verify token for auth.

### customer_email

Use email used to verify token for auth. Same as siteenligne customer area.

### redirect_route

Route name used after successful auth and logo link.
