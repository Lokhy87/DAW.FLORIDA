#!/bin/bash

#variable=8
#echo $variable













#Parámetro junto a la llamada script
#echo "El primer parámetro es $1 y el segundo $2"












#Solicitud de parámetro
#read -p "Introduce tu nombre: " nombre
#echo "Encantado de conocerte, $nombre"










<< 'Operaciones-aritméticas'

#Operaciones aritméticas

x=10
y=6
z=2

suma=$((x+y))
suma=`expr $x + $y`
echo "La suma de $x y $y es $suma"

resta=$((x-y))
resta=`expr $x - $y`
echo "La resta de $x y $y es $resta"

multiplicacion=$((y*z))
multiplicacion=`expr $y \* $z`
echo "La multiplicación de $y y $z es $multiplicacion"

division=$((y/z))
division=`expr $y / $z`
echo "La división de $y y $z es $division"


Operaciones-aritméticas







<< 'Condicional'

read -p "Introduce un número natural entre 1 y 9: " numero

if [ $numero -gt 5 ]; then
    echo "El número es mayor que 5"
else if [ $numero -eq 5 ]; then
	    echo "El número es igual a 5"
     else
	    echo "El número es menor que 5"
     fi
fi

Condicional












#Iterativa For

#for i in `seq 0 2 10`; do
#	echo "El valor de la secuencia es $i"
#done












<< 'Iterativa-while'

valor=0
limite=5

while [ $valor -le $limite ]; do
	echo "El valor es $valor y el límite es $limite"
	valor=$((valor+1))
done

echo "Hemos llegado al límite"

Iterativa-while











<< 'Mosaico'

for i in `seq 1 10`; do
	
	contador=$i
	while [ $contador -le 10 ]; do
	
		contador=$(($contador+1))
		
		if [ $contador -gt 5 ]; then
			echo -n " 0 "
		else
			echo -n " 1 "
		fi
	
	done
	echo ""
done

Mosaico







<< 'Comandos-CLI'

#Comandos
cd ..
echo "Mostramos los 5 primeros..."
ls -l | head -5
echo "Mostramos los 5 últimos..."
ls -l | tail -5
echo "Mostramos los 5 primeros con extensión txt..."
ls -l *.txt | head -5
echo "Mostramos los 5 últimos que empiezan por u..."
ls -l U* | tail -5

Comandos-CLI












#Fichero tipo lista, una forma de recorrerlo

#contador=0

#for linea in `cat dias_semana.txt`; do
#	echo $linea
#	contador=$((contador +1))	
#done

#echo "El número de líneas es: $contador"










<< 'Fichero-lista'

total_lineas=`cat dias_semana.txt | wc -l`

echo "Número de lineas del fichero: $total_lineas"

linea=1

while [ $linea -le $total_lineas ]; do

	contenido=`cat dias_semana.txt | head -$linea | tail -1` 	
	echo $contenido
	linea=$(($linea+1))

done

Fichero-lista









<< 'Fichero-tabla'

total_lineas=`cat tabla.txt | wc -l`

linea=1

while [ $linea -le $total_lineas ]; do

	contenido=`cat tabla.txt | head -$linea | tail -1` 	
	echo $contenido
	
	columna1=`echo $contenido | awk '{print $1}'`
	columna2=`echo $contenido | awk '{print $2}'`	
	
	echo "columna1=$columna1 columna2=$columna2"

	linea=$(($linea+1))

done


Fichero-tabla





































