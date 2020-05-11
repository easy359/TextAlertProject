# TextAlertProject

Project for High School class using Twilio library.

Complete during school year of 2015.

The following documentation was copied from [this html file](TextAlertDocumentation.html).
## Introduction

The Text Alert System is a computer program coded into a raspberry pi that enables users to send reminder texts. 
A reminder text is a pre-programmed sms messages that automatically sends itself at a user specified date and time. 
I designed this system for myself for the purpose of aiding in reminding Key Club members when they signed up to volunteer.

## Scope

The final project will be accessed through a website where a user can enter a receiving number, message, month, day, hour, and minute 
to create a reminder text that will be sent automatically.

## Deliverables

* Access to twilio api to send text messages
* Raspberry Pi, monitor, power cables, hdmi cable, wifi dongle, mouse, keyboard
* Python, IDE, xampp/docker for webserver and database
* Method for delaying the sending of remind texts
* Database that can handle datetime, strings, and ints
* Raspberry pi can be accessed by other devices
* Website can access database to store information

## Project Organization

I am the only person working on this project. I am in charge keeping the documentation up to date and working on the project itself. 

## Project Management Plan

* Connect Raspberry Pi to monitor to access Raspbian OS and python IDE
* ~~Download/Create python script for sending sms messages~~
  * *Create python script to check when future messages need to be sent and send messages when needed*
  * *Create web page to send messages immediately*
* Test text message sending capabilities (length of message, time taken to send, how quick messages can be sent)
* Implements methods to delay messages sent based on user specification
* Create a database the will be used to store information about remind texts
* Use python and php to access database and read information about when remind texts should be sent
* Design and create a website that can be used to access the database and store information (Planned method for user interaction with program)

## Time Requirements 
The first three deliverables should be completed on the first day of working on the project. 
The fourth, delaying text messages, should only take another day or two of working on to complete. 
Creating a database *and website* will take up most of the time of this project; I have little to no experience in working 
with databases, so it will take around a week (maybe two?) to fully learn how to create a database that can be accessed through the Raspberry Pi. 
~~Finally, a website that can access the database and can gather user input to store there will at least another two weeks, possible three, of working.~~ 
*The website, to integrate with the rest of the program, will take the most time to develop, taking several weeks.*
I understand much of what I need to create a website, but I want it to look nice, and I’m picky about design. 
In total, I plan to have the project done in ~~three months time~~ *by the end of the school year*, ~~where only half of that 
time is actually working on the project~~ *while working on and off.*

## Resources Needed

* Raspberry Pi Canakit
* Monitor with HDMI input
* Mouse and Keyboard
* Wireless or wired internet connection
* XAMPP with MYSQL, APACHE, and PHPMYADMIN to test local server
* Twilio Rest API
* MySQLdb library for python
* IDE and access to google for research

## Dependencies and Constraints

I am depending on the hardware of the Raspberry Pi, IMac, and other devices to work continuously. 
I will need a reliable internet connection ~~and the free use of google voice to send text messages.~~
Also, I am depending on the well being of myself and the motivation to keep the project moving. 
Finally, I am depending on the use of google to search for information on certain software, like python scripts and html code, to use for my project.

## Risks and Contingencies:

A few things that could go wrong in this project: I may become ill, hardware or software may begin to malfunction, 
or I may find that the project isn’t beyond the scope of my abilities and I need to choose a new project.

## Timetable

Expected completion date: December 10, 2015 end of the school year

## Time”table”

Date  | Work Completed
:---: | :---
9/9   | Work on installing software onto Raspberry Pi and booting. Time in class ran out before I could finish installing Raspbian.
9/17  | Raspbian is downloaded onto sd card and can boot. Python script to send sms messages is being worked on: working - send sms messages with smtplib; problem - need to know phone carrier in order to send.
9/18  | I created a Twilio trial account that is able to send sms messages through python without me having to know phone carrier. Cost to upgrade is $1 per month. $.0075 to send sms. Can only send to verified numbers with trial account.
9/22  | Looking into databases. Found sqlite and trying to find tutorials on how to use with python. Still plan to use Twilio.
9/23  | Looking into using Microsoft Access for database.
9/24  | Looking into using pyodbc python library to retrieve data from database. Using brackets for python text editor. Writing python script to compare database entered times to current time. Learning git.
10/2  | In order to run python script on the PI, I will switch databases to mysql or sqlite when moving code onto raspberry PI.
10/12 | I decided to used XAMPP to host a local web server
10/14 | Using phpMyAdmin and MySQL to store user information in a database
10/25 | Simple UI design for website is complete, LAN access, can send messages from site to verified numbers
11/5  | Starting to add date and time options for sending messages, looking for method to run continuous script on startup of XAMPP
11/9  | Changing much of the functional code to be simpler and easier to use. (Want to put reusable code into classes  *connecting to the database and sending texts*)
11/10 | Added connection class for connection to the database and began using PDO’s for prepared statements.
11/11 | Added messenger class for sending text messages and added ‘previousinfo’ table and ‘futureinfo’ table to database
11/21 | Previous Message table set up an access available through website
11/22 | Future Message table set up and access available through website (tables in database are name ‘messageinfo’ and ‘previousinfo’)
11/29 | Simple design choices made and tested
12/8  | Using MySQLdb python library to connect to db for messages that need to be sent in the future
1/5   | Fixed issue with timezones and began Python script to send future messages
1/7   | Started setting up web server on Raspberry pi. Using PuttySSH for SSH access and xrdp for remote desktop access.
1/8   | Setup Apache web server that works on local network
1/11  | Setup MySQL database and PHPMyAdmin, need to do more testing to get everything to work together
2/3   | Finished python script to send future messages
2/4   | Began commenting php and python code
2/9   | Working on customs error messages. Using session to pass error messages. Started working on a description page.
2/10  | Work on layout and styling of index page
2/11  | Working on dynamically changing index page. login create default
2/12  | Finish index page object layout, need to style.
2/17  | Working on more styling on index page
2/18  | Working on more styling on index page
2/22  | Setting up Raspberry Pi with web server
2/23  | Setting up and running Raspberry Pi with web server
2/24  | Setting up Raspberry Pi with web server
3/25  | Fixed main page. Option to send message now or later
3/28  | Better layout for main page
4/1   | Created Account Page to display future and previous messages
4/4   | Final styling changes and additions
5/16  | Bug fixes (fixed database instances not being removed after use)
