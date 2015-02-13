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
		cleanTmpDir()
	except Exception:
		# when a module throws an error and does not handle it
		respond("", "ERROR: Module failed; exception not handled by module")

def verifyFile(file_data):
	file_path = str(os.getcwd())+"/tmp/"+file_data['name']
	if (
		file_data['error'] == 0 and # did php mark any errors?
		file_data['size'] > 0 and # did php actually get a file i.e. does it have any bytes
		os.path.isfile(file_path) # was the file moved to the phyth tmp dir?
		):
		return True
	else:
		return False

def cleanTmpDir():
	# Deletes all files in tmp dir after script completion
	tmp_dir_path = os.getcwd()+"/tmp/"
	file_names = os.listdir(tmp_dir_path)
	# for file in file_names: 
		# os.remove(file) # this line is failing, likely due to permission conflict





