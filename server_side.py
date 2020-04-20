

import socket


class bcolors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'

def get_MotorData_json():
	with open("MotorData.json") as file:
		data = file.read()
	return data

def write_SensorData_json(data):
	with open("SensorData.json","w") as file:
		file.write(data)

def main():
	try:
		Host = "160.153.249.247"
		Port = 1234
		s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		try:
			s.bind((Host, Port))
		except:
			print("binding failed")

		print("socket bound")
		s.listen(5)
		while True:
			conn, addr = s.accept()
			print(bcolors.OKGREEN + "{} connected".format(addr) + bcolors.ENDC)
			from_client = ''
			while True:
				data = conn.recv(4096)
				if not data: break
				from_client = data
				print from_client
				write_SensorData_json(from_client)
				data = get_MotorData_json()
				conn.send(data)
			conn.close()
			print( bcolors.WARNING + 'client disconnected' + bcolors.ENDC) 

	except Exception as e:
		print("somwething went wrong!!!!")
		raise e
	except KeyboardInterrupt:
		print(bcolors.FAIL + "Server is shut down" + bcolors.ENDC)
	finally:
		print("closing socket bound on {} prot {}".format(Host,Port))
		s.close()


if __name__=="__main__":
	main()
	