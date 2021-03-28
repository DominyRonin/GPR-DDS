#!E:/Programs/Python/python.exe
import numpy as np
import cv2
import keras.models
import re
import os
import base64
import sys
sys.path.append(os.path.abspath("C:/xampp/htdocs/graduation-main/Model"))
from load import *
from keras.applications.vgg16 import VGG16
from keras.preprocessing import image
from keras.applications.vgg16 import preprocess_input, decode_predictions
import pymysql


connection = pymysql.connect(
host="localhost",
user="root",
passwd="",
database="gpr" 
)
connection.autocommit(True)
cursor = connection.cursor()


pred_images = []
pred_path = 'C:/xampp/htdocs/graduation-main/Quick_Test'

global model

model = init_Defects()
img_name = sys.argv[1]
img_name =  img_name[1:]
def predict():
    
    for filename in os.listdir(pred_path):
        img = cv2.imread(os.path.join(pred_path,filename))                
        if img is not None:
            img_new = cv2.resize(img,(224,224),interpolation = cv2.INTER_CUBIC).astype(np.float32)
            img_new = image.img_to_array(img_new)
            img_new= np.expand_dims(img_new, axis=0)
            img_new =  preprocess_input(img_new)
            pred_images.append(img_new)


        for i in pred_images:
      
          
            out1 = model.predict(i,verbose=0)
            arg = np.argmax(out1, axis = 1)
  

          
            if out1[0][0] > out1[0][1] and out1[0][0] > out1[0][2]:
                cursor.execute(" UPDATE quicktest SET ResultDefect= 'CR'  WHERE BScanImage = '%s' " % (img_name))
                connection.commit()
            if out1[0][1] > out1[0][0] and out1[0][1] > out1[0][2]:
                cursor.execute(" UPDATE quicktest SET ResultDefect= 'V'  WHERE BScanImage = '%s' " % (img_name))
                connection.commit()
            if out1[0][2] > out1[0][0] and out1[0][2] > out1[0][1]:
                cursor.execute(" UPDATE quicktest SET ResultDefect= 'VJ'  WHERE BScanImage = '%s' " % (img_name))
                connection.commit()
          
    return print("Prediction Finished")	
        


predict()
pred_images.clear()
connection.close()


