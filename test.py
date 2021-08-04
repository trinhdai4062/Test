#coding=utf-8

import sys, random, argparse#argparse library for command line parsing
import numpy as np          #numpy library for large matrix calculations
import math

from PIL import Image       #PIL library is Python's de facto standard library for image processing

# The basic principle of picture to ASCII is to divide the grayscale picture into many small grids, calculate the average brightness of the small grids and replace them with different brightness characters
# The characters corresponding to the gray gradient can be referred to: http://paulbourke.net/dataformats/asciiart/
# 70-level gray gradient (increasingly brighter)
gscale1 = "$@B%8&WM#*oahkbdpqwmZO0QLCJUYXzcvunxrjft/\|()1{}[]?-_+~<>i!lI;:,\"^`'. "
# 10-level gray gradient
gscale2 = '@%#*+=-:. '

#Calculate the average brightness of each small block
def getAverageL(image):
    im = np.array(image)#Small block into a two-dimensional array
    w, h = im.shape#Save small block size
    return np.average(im.reshape(w * h))#Turn the two-dimensional array into one dimension and find the mean

#According to the average brightness of each small block matching ASCII characters
def covertImageToAscii(fileName, cols, scale, moreLevels):
    global gscale1, gscale2#Gray gradient
    image = Image.open(fileName).convert('L')#Open the picture and convert it to grayscale
    W, H = image.size[0], image.size[1]#Save image width and height
    print("Image width and height: %dx%d" % (W, H))
    w = W / cols#Calculate the width of the small block
    h = w / scale#Calculate the height of the small block. The vertical scale factor is used here to reduce the image violation. The tested scale is 0.43 and the effect is better.
    rows = int(H / h)#Count the number of rows
    print("Total %d rows and %d columns" % (rows,cols))
    print("Width and height of each small block: %dx%d" % (w, h))

    #Image is too small to exit
    if cols > W or rows > H:
        print("The image is too small for segmentation! (Improve image resolution or reduce fineness)")
        exit(0)

    aimg = []#Text graphics are stored in the list
    # Match ASCII block by block
    for j in range(rows):
        y1 = int(j * h)#Y coordinate of small block start
        y2 = int((j + 1) * h)#The y coordinate of the end of the small block
        if j == rows - 1:
            y2 = H#The last cell is not big enough, the end y coordinate is represented by the image height H
        aimg.append("")#First insert empty string
        for i in range(cols):
            x1 = int(i * w)#X coordinate of small block start
            x2 = int((i + 1) * w)#X coordinate of small end
            if i == cols - 1:
                x2 = W#The last cell is not big enough, the end x coordinate is represented by the image width W
            img = image.crop((x1, y1, x2, y2))#Extract small pieces
            avg = int(getAverageL(img))#Calculate the average brightness
            if moreLevels:
                gsval = gscale1[int((avg * 69) / 255)]#Average brightness value [0,255] corresponds to ten-level grayscale gradient [0,69], obtain the corresponding ASCII symbol
            else:
                gsval = gscale2[int((avg * 9) / 255)]#The average brightness value [0,255] corresponds to the seventy gray gradient [0,9], and the corresponding ASCII symbol is obtained
            aimg[j] += gsval#Update text graphics
    return aimg

#Main function
def main():
    descStr = "Python implements picture to ASCII graphic"
    parser = argparse.ArgumentParser(description=descStr)
    #Set possible command line parameters to run the program
    parser.add_argument('--file', dest='imgFile', required=True)#Must be set
    parser.add_argument('--scale', dest='scale', required=False)# default
    parser.add_argument('--out', dest='outFile', required=False)
    parser.add_argument('--cols', dest='cols', required=False)
    parser.add_argument('--morelevels', dest='moreLevels', action='store_true')#Set morelevels to True

    args = parser.parse_args()#Parameters are stored in args

    imgFile = args.imgFile#Entered picture
    outFile = 'out.txt'#Output ASCII text graphics
    if args.outFile:
        outFile = args.outFile
    scale = 0.43#Vertical scale factor test has a good effect of 0.43, and text must be displayed in equal-length fonts, such as Song Dynasty, Courier
    if args.scale:
        scale = float(args.scale)
    cols = 80#The number of columns divided by default, the greater the number of columns, the greater the fineness, but it is not recommended to be too large
    if args.cols:
        cols = int(args.cols)

    print("Converting...")
    aimg = covertImageToAscii(imgFile, cols, scale, args.moreLevels)#Call matching function

    f = open(outFile, 'w')#Save document image
    for row in aimg:
        f.write(row + '\n')
    f.close()
    print("ASCII text graphics stored in %s" % outFile)

#mainfunction
if __name__ == '__main__':
    main()

#Pycharm Set the command line parameter operation method: Run→Run→Edit Configurations→Defaults→Python→Parameters on the right
#Required: Enter the image path--file test.jpg
#Optional:
# (Recommended) The number of columns in the image segmentation --cols 100
#Output ASCII text graphics path --out out.txt
#Vertical scale factor--scale 1
#Use 70-level grayscale gradient--morelevels


# run :python "test.py" --file shose.jpg --cols 150