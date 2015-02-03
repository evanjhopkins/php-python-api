# Phyth (PHP & Python api framework)
Phyth allows a core api to be written in python while using php to handle requests and can be set up in minutes

### Why would I use this over Django or a straight PHP api?
For most people PHP is a far from ideal language to work in. Django is great, but the set up & configuration time are quite substantial. In certain senarios, such as proof-of-concepts or programming competitions, simplicity and speed are more important than robustness. 

### Set Up
Phyth is ready to go out of the box. Simply clone the repo to wherever you want the api to live. Point your browser to www.[YOUR-DOMAIN].com/[WHERE-YOU-PUT_PHYTH]. This will, by default load the test page. If you dont see any red on the page, you're good to go. To add an api function, you must create a module. 

### Module Creation
Each api function is written as an independant python script and placed in the modules folder. You can use the reverse.py module as an example of a basic fully functional module. reverse.py is an api function that simply reverses a string. Modules are referenced based on their file name, so there is no configuration required other than simply creating the module itself. You can also view template module below to help make your first module. 
```python
import phyth

def main():
	# this is nessesary for global error handling. The guts of your module go in function()
	phyth.start(function)

def function():
	# this will give you the "data" from the JSON request converted to a python dictionary
	# read 'calling the api' in the readme to understand what data this is getting
	data = phyth.getData()
	
	# this is where you put the functionality of the module
	
	# this is how you send your reply. respond() accepts a dictionary as the parameter
	phyth.respond(some_dictionary)

if __name__ == "__main__":
    main()
```

### Calling the API
Calling the api is as simple as sending the request to www.[YOUR-DOMAIN].com/[WHERE-YOU-PUT_PHYTH]/phyth.php. As far as Phyth is concerned, there are only two required fields in the request. "cmd" is just the filename of your module minus the extension. "data" is whatever you want to pass on to the module. If your module doesn't need any data sent in, you don't even need this field. Phyth expects JSON in the following format:
```
{                               |
    "cmd":"reverse",            | The filename of the module being called determines the command name: reverse.py --> reverse
    "data":{                    | "data" is whats forwarded to the module, the format and contents are up to you
      "string":"phyth is cool"  |     In the case of the reverse module, this is the string to be reversed
    }                           |
}    
```
