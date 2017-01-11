from keras.preprocessing.image import ImageDataGenerator
from keras.models import Sequential
from keras.layers import Dense, Dropout, Activation, Flatten
from keras.layers import Convolution2D, MaxPooling2D
from keras.optimizers import SGD, Adadelta, Adagrad
from keras.callbacks import EarlyStopping
from keras.utils import np_utils, generic_utils
import numpy as np


X_train = np.load("/var/www/html/CNN_Captcha/demo/train/x_train.npy")
Y_train = np.load("/var/www/html/CNN_Captcha/demo/train/y_train.npy")
X_test = np.load("/var/www/html/CNN_Captcha/demo/vaild/x_test.npy")
Y_test = np.load("/var/www/html/CNN_Captcha/demo/vaild/y_test.npy")

batch_size = 32
nb_classes = 144  # 有序分類 (10+26)*4=144


# input image dimensions
img_rows, img_cols = 20, 80 #圖片大小 寬*長
img_channels = 3 #RGB

X_train = X_train.astype("float32")
X_test = X_test.astype("float32")
print(X_train.shape)
print(Y_train.shape)

model = Sequential()# 建立模型
model.add(Convolution2D(32,3,3,3, border_mode='valid'))
model.add(Activation('relu')) # 激活函數 使用relu
model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Dropout(0.25))

model.add(Convolution2D(64,3, 3,border_mode='valid'))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Dropout(0.25))

model.add(Flatten())
model.add(Dense(720))

model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(512, nb_classes,init='uniform'))
model.add(Activation('binary_crossentropy'))

sgd = SGD(lr=1e-5, decay=0, momentum=0.9, nesterov=True)
model.compile(loss='binary_crossentropy', optimizer=sgd)  #隨機梯度下降

model.fit(X_train, Y_train, batch_size=32, nb_epoch=100, verbose=1)

score = model.evaluate(X_test, Y_test, verbose=1)
print('Test score:', score[0])
print('Test accuracy:', score[1])

'''
model.save_weights('captcha_CNN_weights.h5')
json_string = model.to_json()
f=open('captcha_CNN_structure.json','w')
f.write(json_string)
f.close()
