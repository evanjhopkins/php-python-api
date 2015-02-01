import sys
import json

def main():
	json_data = sys.argv[1];
	data = json.loads(json_data)
	print data['data']['string'][::-1]

if __name__ == "__main__":
    main()
