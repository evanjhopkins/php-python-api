import sys
import json
import os

def getData():
	json_data = sys.argv[1]
	data = json.loads(json_data)
	return data

def getRawData():
	return sys.argv[1]

def error(error_msg):
	# causes response to be blank currently...
	# log = open('log.txt', 'w+')
	# log.write(error)
	# log.close()
	return

def respond(data_dict, error):
	reply_data = { 'data': data_dict,'error': error }
	print reply_data

def start(func):
	try:
		func()
	except Exception:
		# when a module throws an error and does not handle it
		respond("", "ERROR: Module failed; exception not handled by module")

def verifyFile(file_data):
	# verifies that the file has no errors (php) and has a at least one byte (php)
	# verifies that the file exists in the phyth tmp dir (python)
	
	file_path = str(os.getcwd())+"/tmp/"+file_data['name']
	if (file_data['error'] == 0 and file_data['size'] > 0 and os.path.isfile(file_path) ):
		return True
	else:
		return False




