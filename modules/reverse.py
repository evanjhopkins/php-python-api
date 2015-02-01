
import phyth

def main():
	# dictionary of data sent in through api request
	data = phyth.getData()

	# getting string to be reversed from data dictionary
	string = data['string']

	# reversing string
	string = string[::-1]

	# building reply. MUST be a dictionary
	reply_data = { 'new_string': str(string) }

	# send response
	phyth.respond(reply_data)

if __name__ == "__main__":
    main()
