import sys
import json

def getData():
	json_data = sys.argv[1]
	data = json.loads(json_data)
	return data

def getRawData():
	return sys.argv[1]

def error(error_msg):
	#causes response to be blank currently...
	log = open('log.txt', 'w+')
	log.write(error)
	log.close()

def respond(data_dict, error):
	reply_data = { 'data': data_dict,'error': error }
	print reply_data

def start(func):
	try:
		func()
	except Exception:
		# when a module throws an error and does not handle it
		respond("", "ERROR: Module failed; exception not handled by module")



