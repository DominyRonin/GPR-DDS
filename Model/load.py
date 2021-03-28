import numpy as np
import keras.models
from keras.models import model_from_json
import tensorflow as tf
import io
import json


def init_Defects(): 
      
      model_path=("C:/xampp/htdocs/graduation-main/Model/Defects_Best_vgg16.h5")
      Model_VGG16 =keras.models.load_model(model_path)
    
      return Model_VGG16

