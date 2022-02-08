Register

```
curl -X POST -H "Content-Type: application/json" -d @./curl/register.json http://localhost:8000/api/register -o ./curl/response.json
```

Login

```
curl -X POST -H "Content-Type: application/json" -d @./curl/login.json http://localhost:8000/api/login -o ./curl/loggedin.json
```

Admin Routes

```
curl -H "Content-Type: application/json" -H "Authorization: Bearer 5|zyE2j2OnlNQGDwebltKPZk7xLaY8HeJ7OFoTdOpP" http://localhost:8000/api/admin/managers -o ./curl/response.json
curl -H "Content-Type: application/json" -H "Authorization: Bearer 5|zyE2j2OnlNQGDwebltKPZk7xLaY8HeJ7OFoTdOpP" http://localhost:8000/api/manager/employees -o ./curl/response.json
```
