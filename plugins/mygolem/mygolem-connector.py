import serial
import sys
import json
import time
config=json.loads(open("./plugins/mygolem/config.json","r").read())
serialData=serial.Serial()
serialData.baudrate=config['baudrate']
serialData.port=config['port']
serialData.timeout=1
print str(config['baudrate'])+" : "+config['port']
serialData.open()
time.sleep(0.8)
print serialData.read()
serialData.write('pin-'+sys.argv[1]+'-'+sys.argv[2]+":")
serialData.close()
