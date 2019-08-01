from twilio.rest import Client
import time

# Your Account Sid and Auth Token from twilio.com/console
# DANGER! This is insecure. See http://twil.io/secure
account_sid = 'ACf796c9d3dd78a2484b4d46f2955ffe32'
auth_token = 'f963bfbd2d2521b4702ba0fe0e1a2516'
client = Client(account_sid, auth_token)



message = client.messages \
.create(
from_='whatsapp:+14155238886',
body = 'An Earthquake has been detected near your Location, Please proceed for Evacuations ',
to ='whatsapp:+918851896367'
 )
                
           
        
        

        #print(message.sid)
