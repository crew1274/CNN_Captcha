from keras.models import model_from_json
import numpy as np
from PIL import Image
import os

def solve(im):
  X_list=[]
  result=''
  for i in range(4):
    region = (15*i,0,15*i+15,22)
    cim = im.crop(region)
    X_list.append(np.array(cim))
  p = model.predict(np.array(X_list))
  print(p)
  for each in p:
    index=0
    for i in range(len(each)):
      if(each[i]>each[index]):
        index=i
    result+=(table[index])
  return (result)


table = ['0','1','2','3','4','5','6','7','8','9',
        'a','b','c','d','e','f','g','h','i','j','k',
        'l','m','n','o','p','q','r','s','t','u','v',
        'w','x','y','z']

model = model_from_json(open('/var/www/html/CNN_Captcha/breaker/captcha_CNN_structure.json').read())
model.load_weights('/var/www/html/CNN_Captcha/breaker/captcha_CNN_weights.h5')
dirs = os.listdir('/var/www/html/CNN_Captcha/test/')
for filename in dirs:
    im = Image.open(os.path.join('/var/www/html/CNN_Captcha/test/', filename))
    print ('real:'+ filename )
    print ('predict:'+ solve(im))
