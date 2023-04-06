# links-database-engine
Simple link handling system

# Funtions
After turning on the include and after InsertDataBase, you can immediately call any of the listed functions.

Function: **InsertDataBase**
```
URLDatabaseEngine::InsertDataBase($mysqli);
```
>Previously initialized database:<br>$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');

Function: **GetURLObject**
```
$URLData = URLDatabaseEngine::GetURLObject($subdomain, $action[1]);
```
>Get all information about URL stored in database<br>$URLData['type'] - link type<br>$URLData['relay'] - address/reference for type<br>$URLData['ownURLs'] - having children<br>$URLData['rights'] - link rights (group or rights themselves)

Function: **CreateURLObject**
```
URLDatabaseEngine::CreateURLObject($subdomain, $path, $type = 0, $relay = "", $haveChildern = 0, $rights = 0);
```
>$subdomain and $path are required when calling the function. The rest is optional. Returns True on successful.

Function: **SetURLObjectType**
```
URLDatabaseEngine::SetURLObjectType($id, $type, $relay="");
```
>Changes the corresponding data for the link. Returns True on successful change.

Function: **SetURLObjectOwnURLs**
```
URLDatabaseEngine::SetURLObjectOwnURLs($id, $ownURLs);
```
>Changes the corresponding data for the link. Returns True on successful change.

Function: **SetURLObjectRights**
```
URLDatabaseEngine::SetURLObjectRights($id, $rights);
```
>Changes the corresponding data for the link. Returns True on successful change.

Function: **SetURLObjectParams**
```
URLDatabaseEngine::SetURLObjectParams($id, $type, $relay, $ownURLs, $rights);
```
>Changes all data of the link. Returns True on successful change.

# DataBase (MySQL)
The database is minimized and it contains only the necessary fields, and an additional field for rights (I think that everyone will need it, but you can exclude it from the code)
| id  | url | type | relay | ownURLs | rights |
| --- | --- | ---- | ----- | ------- | ------ |
| 1 | exemple1 | 0 |  | 0 | 101 |
| 2 | exemple2 | 2 | google.com | 0 | 101 |