<?php 
	//lectura fichero formato csv para convertir a array asociativo
	$estudiantes = array();

	//abrir fichero
	$fichero= fopen('estudiantes.csv','r');

	//primera lectura del fichero para leer la cabecera para el nombre de las columnas

	$fila=fgets($fichero);
	echo $fila;
	echo "<br>";
	//$claveColumnas tenemos un array con las cabeceras 
	$claveColumnas= explode(',',$fila);
	print_r($claveColumnas);
	echo "<br>";
	//leer el fichero hasta feol
	//leemos desde el registro 2 (siguiente a la cabecera)
	while (!feof($fichero)) {
		//lectura del fichero
		$fila=fgets($fichero);
		//convertir la fila a array
		//$datosEstudiante tenemos los datos del estudiante en formato array
		$datosEstudiante = explode(',',$fila);
		print_r($datosEstudiante);
		echo "<br>";
		//guardar el dato que corresponde a la clave 0 del array
		//$claveFila extraemos de la columna 0 lo que será la clave  del array asociativo
		$claveFila=$datosEstudiante[0];
		//añadir los valores de las columnas al array datos
		//recorre el array de las columnas a partir de la pos 1 y crea el array multidimension asociativo 
		//$claveFila nombre del indice de la tabla $estudiante 
		for ($i=1;$i<sizeof($claveColumnas);$i++) {
			$estudiantes[$claveFila][$claveColumnas[$i]]= $datosEstudiante[$i];
		}
	}
	print_r($estudiantes);
	//cerrar el fichero
	fclose($fichero);


 ?>