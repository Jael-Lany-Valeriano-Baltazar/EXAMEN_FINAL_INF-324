from tkinter import *
from tkinter import filedialog
from PIL import Image
from PIL import ImageTk
import cv2
import imutils
import numpy as np
import colorsys

#metodo para cargar la imagen
def elegir_imagen():
    # Especificar los tipos de archivos, para elegir solo a las imágenes
    path_image = filedialog.askopenfilename(filetypes = [
        ("image", ".jpeg"),
        ("image", ".png"),
        ("image", ".jpg")])

    if len(path_image) > 0:
        global image
        global image1

        # Leer la imagen de entrada y la redimensionamos
        image = cv2.imread(path_image)
        image1 = cv2.imread(path_image)
        image = imutils.resize(image, height=480)

        # Para visualizar la imagen de entrada en la GUI
        imageToShow = imutils.resize(image, width=280)
        imageToShow = cv2.cvtColor(imageToShow, cv2.COLOR_BGR2RGB)
        image1 = cv2.cvtColor(image1, cv2.COLOR_BGR2RGB)
        im = Image.fromarray(imageToShow)
        img = ImageTk.PhotoImage(image = im)

        lblInputImage.configure(image = img)
        lblInputImage.image = img

        # Label IMAGEN DE ENTRADA
        lblInfo1 = Label(root, text="IMAGEN DE ENTRADA:")
        lblInfo1.grid(column=0, row=1, padx=5, pady=5)


        lblOutputImage.image = ""

        lblInfo2 = Label(root, text="Opciones a procesar:", width=25)
        lblInfo2.grid(column=0, row=3, padx=5, pady=5)

        btn1 = Button(root, text="Reconocimiento de texturas", width=25, command = reconocimiento)
        btn1.grid(column=0, row=4, padx=5, pady=5)
        btn2 = Button(root, text="Corte de textura", width=25, command = corte)
        btn2.grid(column=0, row=5, padx=5, pady=5)
        btn3 = Button(root, text="Definición de región geográfica", width=25, command = geografia)
        btn3.grid(column=0, row=6, padx=5, pady=5)

def reconocimiento():
    global image
    imageToShowOutput = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    im = Image.fromarray(imageToShowOutput)
    img = ImageTk.PhotoImage(image = im)

    lblOutputImage.configure(image=img)
    lblOutputImage.image = img
    lblInfo2 = Label(root, text="IMAGEN DE SALIDA:")
    lblInfo2.grid(column=1, row=0, padx=5, pady=5)
    
    lblOutputImage.bind('<Button-1>', mouser)

def corte():
    global image
    imageToShowOutput = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    im = Image.fromarray(imageToShowOutput)
    img = ImageTk.PhotoImage(image = im)

    lblOutputImage.configure(image=img)
    lblOutputImage.image = img
    lblInfo2 = Label(root, text="IMAGEN DE SALIDA:")
    lblInfo2.grid(column=1, row=0, padx=5, pady=5)
    
    lblOutputImage.bind('<Button-1>', mousec)

def geografia():
    global image

    imageToShowOutput = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    im = Image.fromarray(imageToShowOutput)
    img = ImageTk.PhotoImage(image = im)

    lblOutputImage.configure(image=img)
    lblOutputImage.image = img
    lblInfo2 = Label(root, text="IMAGEN DE SALIDA:")
    lblInfo2.grid(column=1, row=0, padx=5, pady=5)
    
    lblOutputImage.bind('<Button-1>', mouseg)

def mouser(event):
    global image
    print(" metodo mouser Boton izquierdo")
    print(f'cordenadas x:{event.x} y:{event.y}')
    (b, g, r) = (image[event.y,event.x, 0], image[event.y,event.x, 1], image[event.y,event.x, 2]) 
    print(f'R:{r}, G:{g}, B:{b}')
    ###
    rgb_label = Label(root, text=f"R:{r}, G:{g}, B:{b}")
    rgb_label.grid(column=1, row=7, padx=5, pady=5)
    ##
    (r, g, b) = (r / 255, g / 255, b / 255)
    (h, s, v) = colorsys.rgb_to_hsv(r, g, b)
    (h, s, v) = (int(h * 180), int(s * 255), int(v * 255))
    print(f'H:{h}, S:{s}, V:{v}')

    rangoBajo = np.array([(h / 2), s, v], np.uint8)
    rangoAlto = np.array([(h + 40), 255, 255], np.uint8)

    imageGray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    imageGray = cv2.cvtColor(imageGray, cv2.COLOR_GRAY2BGR)
    imageHSV = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)

    mask = cv2.inRange(imageHSV, rangoBajo, rangoAlto)

    mask = cv2.medianBlur(mask, 7)
    colorDetected = cv2.bitwise_and(image, image, mask = mask)

    invMask = cv2.bitwise_not(mask)
    bgGray = cv2.bitwise_and(imageGray, imageGray, mask = invMask)

    finalImage = cv2.add(bgGray, colorDetected)
    imageToShowOutput = cv2.cvtColor(finalImage, cv2.COLOR_BGR2RGB)

    im = Image.fromarray(imageToShowOutput)
    img = ImageTk.PhotoImage(image = im)
    lblOutputImage.configure(image = img)
    lblOutputImage.image = img

    

def mousec(event):
    global image
    print("metodo mousec Boton izquierdo")
    print(f'cordenadas x:{event.x} y:{event.y}')
    (b, g, r) = (image[event.y,event.x, 0], image[event.y,event.x, 1], image[event.y,event.x, 2]) 
    print(f'R:{r}, G:{g}, B:{b}')
    ##
    rgb_label = Label(root, text=f"R:{r}, G:{g}, B:{b}")
    rgb_label.grid(column=1, row=7, padx=5, pady=5)
    ##
    (r, g, b) = (r / 255, g / 255, b / 255)
    (h, s, v) = colorsys.rgb_to_hsv(r, g, b)
    (h, s, v) = (int(h * 180), int(s * 255), int(v * 255))
    print(f'H:{h}, S:{s}, V:{v}')

    rangoBajo = np.array([(h - 10), s, v], np.uint8)
    rangoAlto = np.array([(h + 20), 255, 255], np.uint8)

    imageHSV = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)

    mask = cv2.inRange(imageHSV, rangoBajo, rangoAlto)
    mask = cv2.medianBlur(mask, 7)
    colorDetected = cv2.bitwise_and(image, image, mask = mask)

    im = Image.fromarray(colorDetected)
    img = ImageTk.PhotoImage(image = im)
    lblOutputImage.configure(image = img)
    lblOutputImage.image = img

    

def mouseg(event):
    global image
    newImage = image.copy()
    print("metodo mouseg Boton izquierdo")
    print(f'cordenadas x:{event.x} y:{event.y}')
    (b, g, r) = (image[event.y,event.x, 0], image[event.y,event.x, 1], image[event.y,event.x, 2]) 
    print(f'R:{r}, G:{g}, B:{b}')
    ##
    rgb_label = Label(root, text=f"R:{r}, G:{g}, B:{b}")
    rgb_label.grid(column=1, row=7, padx=5, pady=5)
    ##
    (r, g, b) = (r / 255, g / 255, b / 255)
    (h, s, v) = colorsys.rgb_to_hsv(r, g, b)
    (h, s, v) = (int(h * 180), int(s * 255), int(v * 255))
    print(f'H:{h}, S:{s}, V:{v}')

    rangoBajo = np.array([(h - 10), s, v], np.uint8)
    rangoAlto = np.array([(h + 30), 255, 255], np.uint8)

    imageHSV = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)

    mask = cv2.inRange(imageHSV, rangoBajo, rangoAlto)

    mask = cv2.medianBlur(mask, 7)

    contours, hierarchy = cv2.findContours(mask, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    CountersImg = cv2.drawContours(newImage, contours, -1, (0, 255, 0), 3)

    CountersImg = cv2.cvtColor(CountersImg, cv2.COLOR_BGR2RGB)

    im = Image.fromarray(CountersImg)
    img = ImageTk.PhotoImage(image = im)
    lblOutputImage.configure(image = img)
    lblOutputImage.image = img


#Creando la ventana principal
root = Tk()
root.title("Imagen-Textura")
#root.iconbitmap('/home/lany/Desktop/icono.ico')
# Label donde se presentará la imagen de entrada
lblInputImage = Label(root)
lblInputImage.grid(column=0, row=2)

# Label donde se presentará la imagen de salida
lblOutputImage = Label(root)
lblOutputImage.grid(column=1, row=1, rowspan=6)

# Label donde se presentará la imagen de salida
lblOutputImage = Label(root)
lblOutputImage.grid(column=1, row=1, rowspan=6)

# Creamos el botón para elegir la imagen de entrada
btn = Button(root, text="Elegir imagen", width=25, command=elegir_imagen)
btn.grid(column=0, row=0, padx=5, pady=5)

root.mainloop()


