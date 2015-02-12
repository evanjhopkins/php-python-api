import phyth
import sys

def main():
	phyth.start(function)

def function():
	try:
		phyth.respond(phyth.getData(), "")
	except Exception:
	 	phyth.respond("", "ERROR: reverse.py module failed")

if __name__ == "__main__":
    main()
