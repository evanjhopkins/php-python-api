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
Calling the api is as simple as sending the request to www.[YOUR-DOMAIN].com/[WHERE-YOU-PUT_PHYTH]/phyth.php. The only post data Phyth requires is "function". This should contain the filename of the api function you want to call without the extension (reverse.py => reverse). All other post data will be passed to the specified module. 
```
"reverse"          | Posted as 'function'
"reverse this"     | Posted as 'string'
```
