import http.client

conn = http.client.HTTPSConnection("vindecoder.p.rapidapi.com")

headers = {
    'x-rapidapi-key': "e25f4fcc35msh18f89aff8212734p1a7245jsn79e152a13e68",
    'x-rapidapi-host': "vindecoder.p.rapidapi.com"
    }

conn.request("GET", "/salvage_check?vin=JMYLYV78W5J000603", headers=headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))