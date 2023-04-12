import pyttsx3
import datetime
import speech_recognition as sr 
import webbrowser as wb
import os
from datetime import date
from time import strftime
import time
import sys
import ctypes
import re
import smtplib
import requests
import urllib
import urllib.request as urllib2

yuri=pyttsx3.init()
voice=yuri.getProperty('voices')
yuri.setProperty('voice',voice[1].id)

def speak(audio):
	print('Yuri: ' + audio)
	yuri.say(audio)
	yuri.runAndWait()
def time ():
	Time=datetime.datetime.now().strftime("%I: %M: %p")
	speak(Time)
def today():
	Today = datetime.datetime.now().strftime("%d %B, %Y")
	speak(Today)
def welcome():
	hour=datetime.datetime.now().hour
	if hour >=6 and hour<12:
		speak("Good Morning sir")
	elif hour >=12 and hour<18:
		speak("Good Afternoon sir")
	elif hour >=18 and hour<24:
		speak("Good Nigh sir")
	speak('I am Yuri, how can I help you?')
def command():
	c=sr.Recognizer()
	with sr.Microphone() as source:
		audio = c.listen(source, phrase_time_limit=5)
		print("Yuri:Hmm...")
	try:
		query=c.recognize_google(audio,language='vi')
		print("Sir:" + query)
	except sr.UnknownValueError:
		query=""
	return query
def get_query():
    for i in range(3):
        query = command()
        if query:
            return query.lower()
        elif i < 2:
            speak("Yuri didn't understand what he said")
    time.sleep(2)
    stop()
    return 0

if __name__ == '__main__':
	welcome()
	while True:
		query=get_query()
		if "kiếm youtube" in query:
			speak("What should I search Boss?")
			search=get_query()
			url=f"https://www.youtube.com/search?q={search}"
			wb.get().open(url)
			speak(f'Here is your {search} on youtube')
		if "mở youtube" in query:
			speak("Yes Sir")
			url=f"https://www.youtube.com/"
			wb.get().open(url)
		if "kiếm google" in query:
			speak("What should I search Sir?")
			search=get_query()
			url=f"https://www.google.com/search?q={search}"
			wb.get().open(url)
			speak(f'Here is your {search} on google')
		if "mở google" in query:
			speak("As Sir request")
			url=f"https://www.google.com/"
			wb.get().open(url)
		elif "ảnh" in query:
			speak("Yes Sir")
			image=r"D:\Tài Liệu IT\Code Test\Python\AI\Tra.jpg"
			os.startfile(image)
		elif "nhạc" in query:
			speak("Yes Sir")
			blanke=r"D:\Tài Liệu IT\Code Test\Python\AI\Blanke  Breathe.mp4"
			os.startfile(blanke)
		elif "time" in query:
			time()
		elif "today" in query:
			today()
		elif "hello" in query:
			speak("Hello Sir")
		elif "buồn" in query:
			speak("Yuri thinks you should listen to music and play games at the same time, I recommend you a good song")
			url=f"https://www.youtube.com/watch?v=YlQICU2WwD4&list=PLAL-r3tHdQs1C9ZG5ngXqCwZ4DkfTKDzB"
			wb.get().open(url)
			tra=r"D:\Tài Liệu IT\Code Test\Python\AI\Tra.jpg"
			os.startfile(tra)
			garena=r"C:\Riot Games\Riot Client\RiotClientServices.exe"
			os.startfile(garena)
			speak('Dont be sad anymore, because am always with you, i love Sir')
			quit()
		elif "mail" in query:
			speak("Ok Sir")
			url=f"https://mail.google.com/mail/u/0/#inbox"
			wb.get().open(url)
		elif "cancel" in query:
			speak("Ok bye Sir")
			quit()




