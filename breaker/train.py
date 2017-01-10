from keras.preprocessing.image import ImageDataGenerator
from keras.models import Sequential
from keras.layers import Dense, Dropout, Activation, Flatten
from keras.layers import Convolution2D, MaxPooling2D
from keras.optimizers import SGD
from keras.callbacks import EarlyStopping
import numpy as np


X_train = np.load("/var/www/html/CNN_Captcha/demo/train/x_train.npy")
Y_train = np.load("/var/www/html/CNN_Captcha/demo/train/y_train.npy")
X_test = np.load("/var/www/html/CNN_Captcha/demo/vaild/x_test.npy")
Y_test = np.load("/var/www/html/CNN_Captcha/demo/vild/y_test.npy")

batch_size = 32
nb_classes = 144  # (10+26)*4=144
data_augmentation = True

# input image dimensions
img_rows, img_cols = 22, 60 #圖片大小 寬*長
img_channels = 3 #RGB


print('X_train shape:', X_train.shape)
print(X_train.shape[0], 'train samples')

model = Sequential()# 建立模型
model.add(Convolution2D(48, 5, 5, border_mode='same',input_shape=X_train.shape[1:]))
model.add(Activation('relu')) # 激活函數 使用relu

model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Dropout(0.25))

model.add(Convolution2D(32, 3, 3))
model.add(Activation('relu'))

model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Dropout(0.25))

model.add(Convolution2D(64, 3, 3, border_mode='same'))
model.add(Activation('relu'))
model.add(Convolution2D(64, 3, 3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2, 2)))
model.add(Dropout(0.25))

model.add(Flatten())
model.add(Dense(512))
model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(nb_classes))
model.add(Activation('softmax'))

sgd = SGD(lr=1e-5, decay=0, momentum=0.9, nesterov=True)
model.compile(loss='categorical_crossentropy',optimizer=sgd) #隨機梯度下降

model.fit(X_train, Y_train, batch_size=32, nb_epoch=100, verbose=1)

score = model.evaluate(X_test, Y_test, verbose=0)
print('Test score:', score[0])
print('Test accuracy:', score[1])

model.save_weights('captcha_CNN_weights.h5')
json_string = model.to_json()
f=open('captcha_CNN_structure.json','w')
f.write(json_string)
f.close()
