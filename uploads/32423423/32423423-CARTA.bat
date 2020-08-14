@echo off
title Prueba de color www.todohacker.com
color 4f
echo.
set/p numero1= Numero 1 :
cls
echo.
set/p numero2= Numero 2 :
cls
set/a suma= %numero1% + %numero2%
echo.
echo %numero1% + %numero2% = %suma%
echo.
if %suma%==12 echo bien
echo.
echo Pulsa una tecla para cambiaer al siguente color
pause>nul
color 70
pause
echo Pulsa una tecla para salir.
pause>nul
exit