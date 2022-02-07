Register

```
curl -X POST -H "Content-Type: application/json" -d @./curl/register.json http://localhost:8000/api/register -o ./curl/response.json
```

Login

```
curl -X POST -H "Content-Type: application/json" -d @./curl/login.json http://localhost:8000/api/login -o ./curl/loggedin.json
```

User

```
curl -H "Content-Type: application/json" -H "Authorization: Bearer 2|c6Loega2M2bqDf2JUclVayQmPk3HUSX0zawSDlBk" http://localhost:8000/api/user -o ./curl/response.json
```
