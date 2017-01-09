from PIL import Image
import pandas as pd
import numpy as np

def load_image( filename ) :
    img = Image.open( filename )
    img.load()
    data = np.asarray( img, dtype="int32" )
    return data


def PIL2array(img):
    img = loadImage(img)
    return numpy.array(img.getdata(),numpy.uint8).reshape(img.size[1], img.size[0], 3)

if __name__ == '__main__':
    csv=np.genfromtxt('label.csv',delimiter=',')
    print (csv)
