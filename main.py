# This is a sample Python script.

# Press Shift+F10 to execute it or replace it with your code.
# Press Double Shift to search everywhere for classes, files, tool windows, actions, and settings.
import os

import cv as cv
import cv2
from matplotlib import pyplot as plt

from skimage.measure import compare_ssim
import argparse
import imutils
import cv2

# reads an input image
#img = cv2.imread('test/img.png', 0)

# find frequency of pixels in range 0-255


#histr = cv2.calcHist([img], [0], None, [256], [0, 256])

# show the plotting graph of an image
#plt.plot(histr)
#plt.show()

img_path_fldr = 'test'
files_lst = os.listdir(img_path_fldr)
img_lst = [x for x in files_lst if x.endswith('.png')]

fig, axes = plt.subplots(nrows=2, ncols=2)

for ax, file in zip(axes.flat, img_lst):
    img = cv2.imread(os.path.join(img_path_fldr, file))
    histr = cv2.calcHist([img], [0], None, [256], [0, 256])
    ax.plot(histr)

plt.show()



# construct the argument parse and parse the arguments

# load the two input images
imageA = cv2.imread('test/img.png')
imageB = cv2.imread('test/img2.png')
# convert the images to grayscale
grayA = cv2.cvtColor(imageA, cv2.COLOR_BGR2GRAY)
grayB = cv2.cvtColor(imageB, cv2.COLOR_BGR2GRAY)
# compute the Structural Similarity Index (SSIM) between the two
# images, ensuring that the difference image is returned
(score, diff) = compare_ssim(grayA, grayB, full=True)
diff = (diff * 255).astype("uint8")
print("SSIM: {}".format(score))
# threshold the difference image, followed by finding contours to
# obtain the regions of the two input images that differ
thresh = cv2.threshold(diff, 0, 255,
	cv2.THRESH_BINARY_INV | cv2.THRESH_OTSU)[1]
cnts = cv2.findContours(thresh.copy(), cv2.RETR_EXTERNAL,
	cv2.CHAIN_APPROX_SIMPLE)
cnts = imutils.grab_contours(cnts)

for c in cnts:
	# compute the bounding box of the contour and then draw the
	# bounding box on both input images to represent where the two
	# images differ
	(x, y, w, h) = cv2.boundingRect(c)
	cv2.rectangle(imageA, (x, y), (x + w, y + h), (0, 0, 255), 2)
	cv2.rectangle(imageB, (x, y), (x + w, y + h), (0, 0, 255), 2)
# show the output images
cv2.imshow("Original", imageA)
#cv2.imshow("Modified", imageB)
cv2.imshow("Diff", diff)
#cv2.imshow("Thresh", thresh)
cv2.waitKey(0)



#The rang dif in the left one isnot that high
#but the right one have a spike


FILE_NAME = 'test/img.png'
try:
	# Read image from disk.
	img = cv2.imread(FILE_NAME)

	# Get number of pixel horizontally and vertically.
	(height, width) = img.shape[:2]

	# Specify the size of image along with interploation methods.
	# cv2.INTER_AREA is used for shrinking, whereas cv2.INTER_CUBIC
	# is used for zooming.
	res = cv2.resize(img, (int(width / 2), int(height / 2)), interpolation=cv2.INTER_CUBIC)

	im_power_law_transformation = cv2.pow(res, 0.1)
	# Write image back to disk.
	cv2.imwrite('result3.jpg', res)

except IOError:
    print ('Error while reading files !!!')


# import PIL
# from PIL import Image
# from matplotlib import pyplot as plt

#im = Image.open('neg.bmp')
#w, h = im.size
#colors = im.getcolors(w*h)

#def hexencode(rgb):
  #  r=rgb[0]
  #  g=rgb[1]
  #  b=rgb[2]
  #  return '#%02x%02x%02x' % (r,g,b)

#for idx, c in enumerate(colors):
  #   plt.bar(idx, c[0], color=hexencode(c[1]),edgecolor=hexencode(c[1]))

#plt.show()


# importing library for plotting
# from matplotlib import pyplot as plt
#
# # reads an input image
# import cv2
# img = cv2.imread('neg.bmp')
# img=cv2.cvtColor(img,3,cv2.COLOR_GRAY2BGR)
# cv2.imwrite('C:/Users/hp/PycharmProjects/GPR/neg.png', img)
# print (img.shape)
# # find frequency of pixels in range 0-255
# #histr = cv2.calcHist([img], [0], None, [256], [0, 256])
#
# # show the plotting graph of an image
# #plt.plot(histr)
# #plt.show()





# import matplotlib.pyplot as plt
# import cv2
# import os
#
# images = []
# path = "test/"
# for image in os.listdir(path):
#     images.append(image)
#
# for image in images:
#      img = cv2.imread("%s%s"%(path, image))    # Load the image
#      channels = cv2.split(img)       # Set the image channels
#      colors = ("b", "g", "r")        # Initialize tuple
#      plt.figure()
#      plt.title("Color Histogram")
#      plt.xlabel("Bins")
#      plt.ylabel("Number of Pixels")
#
#      for (i, col) in zip(channels, colors):       # Loop over the image channels
#           hist = cv2.calcHist([i], [0], None, [256], [0, 256])   # Create a histogram for current channel
#           plt.plot(hist, color = col)      # Plot the histogram
#           plt.xlim([0, 256])










#
# # import the necessary packages
# from scipy.spatial import distance as dist
# import matplotlib.pyplot as plt
# import numpy as np
# import argparse
# import glob
# import cv2
# # construct the argument parser and parse the arguments
# ap = argparse.ArgumentParser()
# ap.add_argument("-d", "--test", required = True, help = "test")
# args = vars(ap.parse_args())
# # initialize the index dictionary to store the image name
# # and corresponding histograms and the images dictionary
# # to store the images themselves
# index = {}
# images = {}
# # loop over the image paths
# for imagePath in glob.glob(args["dataset"] + "/*.png"):
# 	# extract the image filename (assumed to be unique) and
# 	# load the image, updating the images dictionary
# 	filename = imagePath[imagePath.rfind("/") + 1:]
# 	image = cv2.imread(imagePath)
# 	images[filename] = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
# 	# extract a 3D RGB color histogram from the image,
# 	# using 8 bins per channel, normalize, and update
# 	# the index
# 	hist = cv2.calcHist([image], [0, 1, 2], None, [8, 8, 8],
# 		[0, 256, 0, 256, 0, 256])
# 	hist = cv2.normalize(hist, hist).flatten()
# 	index[filename] = hist
# # METHOD #1: UTILIZING OPENCV
# # initialize OpenCV methods for histogram comparison
# OPENCV_METHODS = (
#     ("Correlation", cv2.HISTCMP_CORREL),
#     ("Chi-Squared", cv2.HISTCMP_CHISQR),
#     ("Intersection", cv2.HISTCMP_INTERSECT),
#     ("Hellinger", cv2.HISTCMP_BHATTACHARYYA))
# # loop over the comparison methods
# for (methodName, method) in OPENCV_METHODS:
#     # initialize the results dictionary and the sort
#     # direction
#     results = {}
#     reverse = False
#     # if we are using the correlation or intersection
#     # method, then sort the results in reverse order
#     if methodName in ("Correlation", "Intersection"):
#         reverse = True
#
#         # loop over the index
#         for (k, hist) in index.items():
#             # compute the distance between the two histograms
#             # using the method and update the results dictionary
#             d = cv2.compareHist(index["doge.png"], hist, method)
#             results[k] = d
#         # sort the results
#         results = sorted([(v, k) for (k, v) in results.items()], reverse=reverse)
#
#
#
#
#
