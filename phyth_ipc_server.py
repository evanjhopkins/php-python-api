import socket

HOST = ''
PORT = 1337
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(1)
conn, addr = s.accept()

while 1:
    data = conn.recv(1024)
    if not data: break
    conn.sendall("I AM ALIVE")
    break;


