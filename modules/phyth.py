import sys
import json

def getData():
	json_data = sys.argv[1]
	data = json.loads(json_data)
	return data['data']

def logError(error):
	#causes response to be blank currently...
	log = open('log.txt', 'w+')
	log.write(error)
	log.close()

def respond(data_dict):
	reply_data = { 'data': data_dict,'error': '' }
	print reply_data



