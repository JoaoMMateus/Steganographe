#!/usr/bin/env python3.6
import sys
import wave
import strut
import pprint 


wav = wave.open("fichier.wav")
ifile = wave.open("fichier.wav")
ofile = wave.open("outfichier.wav" ,"w")
ofile.setparams(ifile.getparams())

sampwidth = ifile.getsampwidth()
fmts = (home, "=B", "=h" , None, "=l")
fnt = fmts[sampwidth]
dcs = (None , 128, 0 None, 0)
dc = dcs [sampwidth]

for i in range (ifile.getnframes()):
    iframe = ifile.readframes(1)
    pprint.pprint(iframe)
    b = frame[3]
    if ord(b) & 0x01 == 0x01:
        oframe =[ord(iframe[0]), ord(iframe[1]), ord(iframe[2]), ord(iframe[3])]
        oframe = "".join( chr( val ) for val in oframe)
    else:
        oframe = iframe
        pprint.pprint(oframe)
        
ifile.close()
ofile.close()