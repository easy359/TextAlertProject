from twilio.rest import TwilioRestClient
import MySQLdb
import datetime as dt
import time


account_sid = ""
auth_token = ""

#establish connection to twilio services
client = TwilioRestClient(account_sid, auth_token)

#establish connection to local MySQL database
db = MySQLdb.connect(host="localhost", user="root", passwd="", db="textalertusers")
cursor = db.cursor()

#forces database to update its data when an insert/delete statement is executed
db.autocommit(True)

#used to find messages that need to be sent in the next minute
query = "SELECT MID FROM messageinfo WHERE datetime < %s AND datetime > %s"

#used to gather information about messages that need to be sent
query2 = "SELECT username, receiver, message, datetime FROM messageinfo WHERE MID = %s"

#used to delete a message from messageinfo table after a message is sent
query3 = "DELETE FROM messageinfo WHERE MID = %s"

#used to insert a message into previousinfo table after a message is sent
query4 = "INSERT INTO previousinfo (MID, username, receiver, message, datetime) VALUES (%s, %s, %s, %s, %s)"

#used to send a sms message via twilio api
#MID - message id of the message that needs to be sent
def send_message(MID):
    cursor.execute(query2, (MID,))
    result = cursor.fetchall()[0]
    username = result[0]
    receiver= result[1]
    message_body = result[2]
    datetime = result[3]
    message = client.messages.create(
        to=receiver,
        from_="+16146564753",
        body=message_body)
    print "Message sent: " + str(MID)
    move_message(MID, username, receiver, message_body, datetime)

#moves the reference of a message from the messageinfo table to the previousinfo table after the message is sent
#params - needed info to insert message into the previous info table
def move_message(MID, username, receiver, message, datetime):
    cursor.execute(query3, (MID,))
    cursor.execute(query4, (MID, username, receiver, message, datetime,))

#loop used to check for messages that need to be sent
while True:
    now = dt.datetime.now()
    later = now + dt.timedelta(minutes = 1)
    print "Checking for messages... " + str(now) + "-" + str(later)

    cursor.execute(query, (later,now,));
    for row in cursor.fetchall():
        send_message(row[0])
    #delay program 50 seconds
    print "Delaying check for 50 seconds"
    time.sleep(50)
