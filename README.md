# Getting Started
To use this API, you must have some basic knowledge regarding how web requests work. For example, this API accepts 2 types of requests, more specifically GET and POST.
Anything else will be ignored. That means that you can only do GET and POST requests on this API.

---

# Base URL
While you can host this yourself (no additional configuration is needed), you can also use it directly from my website (now come to think about it, I don't really know
a real reason that you would want to host this yourself, unless you develop a product that requires Linkvertise links and you don't want them JPN-branded).

The base URL of the api can be accessed [here](https://isaidpower.dev/link2vertise/api.php) or copy this code:
```
https://isaidpower.dev/link2vertise/api.php
```

# Requests
In this small section of this README, we will talk about how you can easily generate requests for this API. I usually use [Reqbin](https://reqbin.com) to test my APIs,
you can use it too, it is free.

_Tip: It also generates requests in different code languages._

## POST
While essentially more complex, it does its job way better, and looks more cleaner than the GET request. You will want to set up the request with the following parameters:
  - Host: **isaidpower.dev**
  - API: **/link2vertise/api.php**
  - Type: **GET**

Your request should look something like this:
```http
POST /link2vertise/api.php HTTP/1.1
Host: isaidpower.dev
Content-Type: application/json
```

Now, you can use Reqbin to help you assemble your request or use some basic [examples](/example.http) from this repo. **If you are using the examples, don't forget to
change the user ID to your own, since that it is mine :)**.

### JSON Body
Don't be afraid of this, JSON is actually pretty easy and simple, this API includes 2 parameters for the POST request:
- `user`: This is where yous should use your user ID that you can find in the Full Script API page of the Linkvertise dashboard
- `link`: Self-explanatory

It should look like this after you assemble the whole request:
```http
POST /link2vertise/api.php
Host: isaidpower.dev
Content-Type: application/json

{
  "user": 51628,
  "link": "https://example.com"
}
```
_(Yes, I took it from the example.http file)_

---

The response is a simple one, have a look at this JSON:
```json
{
  "success": true,
  "link": "https://example.com"
}
```
Now, of course it will look different but the point is that you will have to check whether `success` is `true` or `false`, and if it is false, you will have to also handle
the `error` parameter.

*I AM TOO LAZY TO TYPE MORE, YOU CAN FIGURE IT OUT I WAS BORED AND DID THIS SCRIPT IN 5 MINUTES.**
