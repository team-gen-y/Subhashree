# AngelHack-Hackathon-2019
# DeepBlue-Tsunami-Relief
###  AngelHack Hackathon 2019: Tsunami Relief Services

This web application focuses on both the victims and people who want to help . 

---

The Home page provides you with live news describing the recent scenarios relating to the disaster events.

One of our main features is that there is a SOS Emergency Request for the victims : when they press that button , their live location is sent to authorities using google maps API . This is a very crutial way of determining where the victim is struck . 
Then there are tabs for our user ie . general people to help the victims in any way possible 

1 . They can directly pay through their PAYTM: we have used PAYTM API to incorporate it in our site

2 . The user can directly decide to tell us to buy like rice, clothes, medicines, etc . What they can do is choose what they want to buy and according to that a bill will be generated and they will be directed to a payment page - paytm 

3 . people who are nearby can decide to donate what they can send for immediate consumption


#### Our portal can be used by the government as :
1. they can log in and predict to see where all SOS services have been used 
2 . they can also contributions were given by people
3. the locations where the government can go and take all resources from. 

---

#### Algorithm: using Python
We have come up with an algorithm which predicts how much money is going to be needed after the tsunami has hit and as the days pass- how much money is going to be needed for all the recovery and feeding people. 
ReadMe_Notification
The Notificiation.py file works by collaborating with the Ministry of Disaster Management. As soon as they are alerted 
with a Tsunami or earthquake(of higher than 6.5 magnitudes on the Richter Scale) we send all the Subscribed users a Notification alerting them to take necessary 
precautions

---

#### IBM Watson Assistant: ChatBot
We used IBM Watson Assistant to create a ChatBot. The purpose of the ChatBot is to assist both the victim and people who are willing to help the victims. when you open the chat box, you see various options like are you hurt or are you safe and if you want to assist people. The ChatBot uses entities and intents. It is trained in such a way that if user inputs "help" - it is trained to identify various intents like bleeding and unconscious and then gives ways to help them. The user can also choose to help the victims by either typing donate or buy. The people who are safe can also tell how many people are there with them, how they are what their name is. 

---

#### Paytm API:
We have used PAYTM as our payment measure for everything. We have incorporated PAYTM APIs on our website. 

---

#### Google Maps API:
we have used this to send live locations of all the people - especially the victims. 
