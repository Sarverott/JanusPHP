

# # #   DEFAULT USERS   # # #
1)
  LOGIN: admin
  PASS: 1234
2)
  LOGIN: guest
  PASS: 4321
# # #   accesskey format example   # # #
BASE64_encode --> admin:1234
YWRtaW46MTIzNA==
# # #   REQUEST EXAMPLE   # # #
POST: accesskey=YWRtaW46MTIzNA%3D%3D
GET: command=hello
