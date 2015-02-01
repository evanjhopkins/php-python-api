# phyth
Phyth allows a core api to be written in python while using php to handle requests

### Usage
Each api function is written as an independant python script and placed in the modules folder. For example, the reverse.py is an api function that reverses a string. 
To call an api function, send a post or get request to phyth.php. The request should contain a json string in the format as follows:

```
  {                             |
    "cmd":"reverse",            | The filename of the function being called: reverse.py --> reverse
    "data":{                    | All data reqired by the specific api call
      "string":"phyth is cool"  | In the case of the reverse function, this is the string to be reversed
    }                           |
  }                             |
```
