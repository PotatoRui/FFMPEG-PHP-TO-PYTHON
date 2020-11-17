import sys
import subprocess
import os

#sys.argv[1] - where raw file is located || move_uploaded_file location || /var/uploads/user1/rawfile.mp4
#sys.argv[2] - directory to save the transcoded file || /var/uploads/user1/rawfile_480.mp4 

#Transcode video to 480p and 720p
cmd="ffmpeg -i "+sys.argv[1]+" -c:v libx264 -preset ultrafast -threads 1 -ss 00:00:01.000 -vframes 1 "+sys.argv[2]+".png -s hd480 "+sys.argv[2]+"_480.mp4 -hide_banner -s hd720 "+sys.argv[2]+"_720.mp4 -hide_banner"
return_value = subprocess.call(cmd, shell=True)

# delete original file after transcode
os.remove(sys.argv[1])

if return_value:
    print("Failed!")
else:
    print("Sucess!")
