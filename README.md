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
>Get all information about URL stored in database<br>$URLData['type'] - link type<br>$URLData['relay'] - address/reference for type<br>$URLData['rights'] - link rights (group or rights themselves)

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

Function: **SetURLObjectRights**
```
URLDatabaseEngine::SetURLObjectRights($id, $rights);
```
>Changes the corresponding data for the link. Returns True on successful change.

Function: **SetURLObjectParams**
```
URLDatabaseEngine::SetURLObjectParams($id, $type, $relay, $rights);
```
>Changes all data of the link. Returns True on successful change.

# DataBase (MySQL)
The database is minimized and it contains only the necessary fields, and an additional field for rights (I think that everyone will need it, but you can exclude it from the code)
| id  | url | type[^1] | relay | rights[^2] |
| --- | --- | ---- | ----- | ------ |
| 1 | exemple1 | 0 |  | 101 |
| 2 | exemple2 | 2 | google.com | 101 |

[^1]: Note for type: The field exists for various interpretations of the link. For example: 0 - opens a file in a directory. 1 - opens a file in the directory via the link 'relay'. 2. Redirects the user to the address 'relay'.
[^2]: Note for right: if you have your own rights system, or use a ready-made one, then it is worth considering the possibility of combining a table with rights for pages with a "links" table
