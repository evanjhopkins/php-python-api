import phyth

def main():
	phyth.start(function)

def function():
	try:
		data = phyth.getData()
		file_data = data['file']
		# size
		# tmp_name
		# type
		# name 
		# error
		
		if (phyth.verifyFile(file_data)):
			phyth.respond("valid!", "")
		else:
			phyth.respond("Invalid!", "ERROR: file did not transfer, likely too large")

	except Exception:
	 	phyth.respond("", "ERROR: filetest.py module failed")

if __name__ == "__main__":
    main()
