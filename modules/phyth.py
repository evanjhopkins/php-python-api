import sys
import json

def getData():
	json_data = sys.argv[1]
	data = json.loads(json_data)
	return data['data']



