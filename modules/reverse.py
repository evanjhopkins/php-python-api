import phyth

def main():
	phyth.start(function)

def function():
	try:
		# dictionary of data sent in through api request
		data = phyth.getData()

		# getting string to be reversed from data dictionary
		string = str(data['string'])
		
		# reversing string
		string = string[::-1]

		# building reply. MUST be a dictionary
		reply_data = { 'new_string': str(string) }

		# send response
		phyth.respond(reply_data, "")
	except Exception:
	 	phyth.respond("", "ERROR: reverse.py module failed")

if __name__ == "__main__":
    main()
