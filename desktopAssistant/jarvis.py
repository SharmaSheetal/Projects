import smtplib
import pyttsx3
import datetime
import speech_recognition as sr
import wikipedia
import webbrowser
import os
import smtpd
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice',voices[1].id)
email = {'1':'email1@gmail.com','2':'email2@gmail.com'}
def speak(audio):
    engine.say(audio)
    engine.runAndWait()
def greetings():
    ''' function to greet '''
    currentHour = int(datetime.datetime.now().hour)
    if currentHour>=0 and currentHour<12:
        speak("Good Morning!")
    elif currentHour>=12 and currentHour<18:
        speak("Good Afternoon!")
    else:
        speak("Good Evening")
    speak("I am your Desktop Assistant. How may i help you?")
def listenCommands():
    ''' this function will listen command from the user '''
    s=sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        s.pause_threshold = 1
        audio = s.listen(source)
    try:
        print("Recognizing...")
        query = s.recognize_google(audio,language='en-in')
        # print(f"User Said {query}\n")
    except Exception as e:
        speak("Sorry I didn't get it. Please Say it again")
        return "None"
    return query
def sendmail(to,content):
    ''' function to send email '''
    server = smtplib.SMTP('smtp.gmail.com',587)
    server.ehlo()
    server.starttls()
    server.login('yourgmail@gmail.com','********')
    server.sendmail('yourgmail@gmail.com',to,content)
    server.close()
if __name__ == '__main__':
    greetings()
    while True:
        query = listenCommands().lower()
        if 'wikipedia' in query:
            speak("Searching Wikipedia")
            query = query.replace("wikipedia","")
            results = wikipedia.summary(query,sentences=5)
            speak("According to Wikipedia")
            speak(results)
        elif 'open youtube' in query:
            webbrowser.open("youtube.com")
        elif 'open google' in query:
            webbrowser.open("google.com")
        elif 'open hackerrank' in query:
            webbrowser.open("hackerrank.com")
        elif 'play music' in query:
            music_dir='C:\\Users\\sheet\\Music\\playlist'
            songs = os.listdir(music_dir)
            os.startfile(os.path.join(music_dir,songs[0]))
        elif 'the time' in query:
            strtime = datetime.datetime.now().strftime("%H:%M:%S")
            speak(f"The time is {strtime}")
        elif 'open visual studio' in query:
            path="C:\\Users\\sheet\\AppData\\Local\\Programs\\Microsoft VS Code\Code.exe"
            os.startfile(path)
        elif 'send email' in query:
            try:
                speak('whom to send')
                name = listenCommands().lower()
                speak("What should i send?")
                content = listenCommands()
                to = email[name]
                sendmail(to,content)
                speak("Email has been sent")
            except Exception as e:
                print(e)
                speak("Unable to sent the email")
        elif 'quit' in query:
            speak("Turning off ")
            exit()

