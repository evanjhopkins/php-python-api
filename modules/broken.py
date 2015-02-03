import phyth

def main():
	phyth.start(function)

def function():
	#this function is purposly broken to test error handling
	phyth.doesntExist()

if __name__ == "__main__":
    main()
