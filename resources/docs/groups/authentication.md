# Authentication

APIs for managing users

## Login


This endpoint is used to authenticate a user.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"john.doe@mailinator.com","password":"********"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john.doe@mailinator.com",
    "password": "********"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'john.doe@mailinator.com',
            'password' => '********',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/login'
payload = {
    "email": "john.doe@mailinator.com",
    "password": "********"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200, OK):

```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john.doe@mailinator.com",
        "email_verified_at": null,
        "created_at": "2020-11-04T01:48:03.000000Z",
        "updated_at": "2020-11-04T01:48:03.000000Z"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTUzOGFjYjRjYjFjN2E4OTI2ZDVhNDc5NTIxYmZiM2IzYTlmYzgwOTQ0MjI1MDY3ODMzY2FhYTRhZmQ5YmM3N2UwMTBhMjg5YmQ4YWNjOTMiLCJpYXQiOjE2MDQ0ODAyNjYsIm5iZiI6MTYwNDQ4MDI2NiwiZXhwIjoxNjA0NTY2NjY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kh8iMbKMpeSrLywBV9t734Zh_K6llrQxeBUt2aJnUfLw-G-rQw6o67MqdVAXtM74OsqDX-InveY8laIKGw50oniZ2YzVzqHOIbbuN3ZVe7kq8HFPziDD73296QRs0LGZxAADyZsJIU05_aLgOGvtBOz4dXXkfOlAyQ7T3p7w_JqWoBMd8PCxWn7wtN6EC8hmUQ9mAVJYLT85ucjVWEgaLeSjpWTN9g9aIUFKwtiw7sFNTSow76855rbao3u59O3rE_nKD7C9F2TC7XbuUcb1swmuo4zI_-uxVmt7qO9EsmbAjr78eps_3XZEpYxpt-RnQWSPs50K4y9pQzvmscauc1vD8ZXpEff_NR4uMTfhLockazZiM7G2O7-_RPqdELfubFSkTwb2CPklPAy6atVtwcBPULgZUa7olPP9Fs4CJvZn4rWV8rUJnou4wD2iEWwHLq5UN8wuRupUKoKPIlyPgHFVIZglXVvhlDo-FGwuprVmiNfF6xpEFKmeqnX5SjTuBKZ04tPGraclRn9PR89k_Dcw1mHFW6vVtX2iPj6ZXFx3tJVSpvmtpb67JiGK41vocd48XFMAdT5qQf2miOxRQjr-Qsp5c9Zk_Zm26ip8HasDjPk5IKgOYzXB1x4bLIqRKslUUPPdhE-NBUzapOEFr5Zb7K2kkyZE4VVXRPT4RjY",
    "token_type": "Bearer",
    "expires_at": "2020-11-05 08:57:45"
}
```
> Example response (422, Unprocessable entity):

```json

{
 "message": "The given data was invalid.",
 "errors": {
   "field": [
       "The field is required."
   ],
   ...
 }
}
```
<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-login" onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-login" onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
Email address of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
Password.</p>

</form>


## Register new user


This endpoint is used to register a new user.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"John Doe","email":"john.doe@mailinator.com","password":"********","password_confirmation":"********"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john.doe@mailinator.com",
    "password": "********",
    "password_confirmation": "********"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'John Doe',
            'email' => 'john.doe@mailinator.com',
            'password' => '********',
            'password_confirmation' => '********',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/register'
payload = {
    "name": "John Doe",
    "email": "john.doe@mailinator.com",
    "password": "********",
    "password_confirmation": "********"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (201, OK):

```json
{
    "message": "User registered successfully"
}
```
> Example response (422, Unprocessable entity):

```json

{
 "message": "The given data was invalid.",
 "errors": {
   "field": [
       "The field is required."
   ],
   ...
 }
}
```
<div id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</div>
<form id="form-POSTapi-auth-register" data-method="POST" data-path="api/auth/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-register" onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-register" onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
Name of the user.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
Email address of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
Password.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password_confirmation" data-endpoint="POSTapi-auth-register" data-component="body" required  hidden>
<br>
Confirm password.</p>

</form>


## Logout

<small class="badge badge-darkred">requires authentication</small>

This endpoint is used to revoke user's access token.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/logout',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/logout'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200, OK):

```json
{
    "message": "Token successfully revoked"
}
```
<div id="execution-results-GETapi-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-logout"></code></pre>
</div>
<div id="execution-error-GETapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-logout"></code></pre>
</div>
<form id="form-GETapi-logout" data-method="GET" data-path="api/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-logout" onclick="tryItOut('GETapi-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-logout" onclick="cancelTryOut('GETapi-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/logout</code></b>
</p>
<p>
<label id="auth-GETapi-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-logout" data-component="header"></label>
</p>
</form>



