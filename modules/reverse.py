import phyth

def main():
	data = phyth.getData()
	print data['string'][::-1]

if __name__ == "__main__":
    main()
