import time
from english_words import english_words_set
from PyDictionary import PyDictionary
from win10toast import ToastNotifier
import json
if __name__ == '__main__':
    dictionary = PyDictionary()
    word_list = list(english_words_set)
    toast = ToastNotifier()
    for word in word_list:
        dictionary=PyDictionary(word)
        for value in dictionary.getMeanings().values():
           if value == None:
                continue
           m = list(value.values())
           k=list(value.keys())
           for i in range(len(m)):
              l=[]
              for j in range(len(m[i])):
                s = f"{k[i]} \n{j+1}:{m[i][j]}"
                l.append(s)
           toast.show_toast(word.title(),"\n"+("\n".join(l)).title(), duration=12,
                         icon_path="C:\web devlopment\project\word_Notifier\icon.ico")
        time.sleep(60*60)
