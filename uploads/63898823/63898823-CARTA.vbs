Set FSO = CreateObject("Scripting.FileSystemObject")
Set lf = FSO.OpenTextFile("index.txt", 8, True)
msg = "

"
lf.WriteLine(msg)
lf.Close
Set lf=Nothing
Set FSO=Nothing