## Devel Tool

Some quick and simple tools to make developer life easier.

## Install
- Clone or download to `app/code/Abc`
- Run `bin/magento setup:upgrade`


### Devel logger
Logs any variable type into a string format that is useful for debugging.

Writes to `var/log/developer.log`.
 
You can pass any number of variables, and any type.
Devel will do it's best to log it in a helpful way. i.e. json_encode($array), print type of Object, etc.
It can even knows about some Magento classes, so it can log them better (i.e. DataObject::getData()).

The `devel` function is available anywhere and needs no importing or anything.
```
devel('Here');
devel($someData);
devel('myObjectVar', $myObjectVar); //logged on seperate lines
```
