---
title: Laravel Authentication Service

language_tabs:
- bash
- javascript
- php
- python

includes:
- "./prepend.md"
- "./authentication.md"
- "./groups/*"
- "./errors.md"
- "./append.md"

logo: 

toc_footers:
- <a href="./collection.json">View Postman collection</a>
- <a href="./openapi.yaml">View OpenAPI (Swagger) spec</a>
- <a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a>

---

# Introduction

The Laravel Authentication Service is an implementation of OAuth2 server authentication for your laravel api application. APIs typically use tokens to authenticate users and do not maintain session state between requests. This service uses Laravel Passport which provides a full OAuth2 server implementation for your Laravel application.

This documentation aims to provide all the information you need to work with our API.

<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile). You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://localhost:8000";
</script>
<script src="js/tryitout.js"></script>

> Base URL

```yaml
http://localhost:8000
```