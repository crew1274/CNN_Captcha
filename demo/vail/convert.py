from PIL import Image
import pandas as pd
import numpy as np
import os

def load_image( filename ) :
    img = Image.open( filename )
    img.load()
    data = np.asarray( img, dtype="int32" )
    return data


def PIL2array(img):
    img = loadImage(img)
    return numpy.array(img.getdata(),numpy.uint8).reshape(img.size[1], img.size[0], 3)

if __name__ == '__main__':
    label=np.genfromtxt('label.csv',delimiter=',')
    print (label)
    np.save(r'y_train.npy', label)
    '''
    dirs = os.listdir('temp/')
    image = []
    for i  in range(10):
        img = Image.open('temp/'+str(i)+'.jpg')
        image.append(np.asarray(img))
    print (image)
    np.save(r'x_train.npy', image)
