<?php

/**
 * Autor: Lizbeth Johana Caro Suarez
 * 
 * Nota: este sera el codigo donde se creara a la instalacion.
 */

//variables

/*$hostName = $_GET['servidor'];
$userName = $_GET['ususario'];
$pasword  = $_GET['contraseña'];
$dateBase = $_GET['base_de_datos'];*/


//desde aqui se trae la base de datos
$sql = file_get_contents( "../document/base_de_datos.sql" );

//Borrado de variables inecesarios de la base de datos en las funciones 
$sql = str_replace("DELIMITER",'', $sql );
$sql = str_replace("$$",'', $sql );
$sql = str_replace("//",'', $sql );

$conexion = @mysqli_connect( 'localhost', 'usuario', ' ', 'bd' );
$conexion->multi_query($sql);
    
 
    
//echo $sql;





























 
//     include( "verificador.php" ); //Se incluye la clase verificador, la idea es no hacer este código más grande.
//     $objeto_verificador = new Verificador(); //Se crea la instancia de la clase verificador.

//     define( "numero_de_tablas", 3 ); //numer de tablas que se crearan.

//     $contador_variables_llegada = 0;
//     $cadena_informe_instalacion = ""; 
// 	$interrupcion_proceso = 0;
// 	$imprimir_mensajes_prueba = 0;  //Usar valores 0 o 1, solo para el programador.
// 	$tmp_nombre_objeto_o_tabla = "";

//     $mensaje1 = "Es posible que la tabla o el objeto ya esté creada(o), por favor reinicie la instalación con una base de datos vacía.";

// 	if( isset( $_GET[ 'servidor' ] ) ) 		$contador_variables_llegada ++;
// 	if( isset( $_GET[ 'usuario' ] ) ) 		$contador_variables_llegada ++;
// 	if( isset( $_GET[ 'contrasena' ] ) ) 	$contador_variables_llegada ++;
// 	if( isset( $_GET[ 'bd' ] ) ) 			$contador_variables_llegada ++;
 
//         if( $imprimir_mensajes_prueba == 1) echo "<br>Llegaron ".$contador_variables_llegada." variables.";

        
//         //en esta se cuenta las variables de llegada, por jemplo si escribes solo, el servidor, el usuario y la bases de datos, al final retorna a 4 ya que cuenta la contraseña, aunque no la hayas colocado.
        
// 	//Tienen que llegar cuatro variables para poder dar continuación al proceso de instalación.
// 	if( $contador_variables_llegada >= 3 && $contador_variables_llegada <= 4 ) // Super if - inicio
// 	{
//         if( $imprimir_mensajes_prueba = 1) echo "<br>Estrando al bloque de instalaci&oacute;n. ";
           
//            //$conexion = mysqli_connect( $_GET[ 'servidor '], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ] );
//            $conexion = @mysqli_connect( $_GET[ 'servidor '], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ] );

//            if( !$conexion )
//            {
//                $interrupcion_proceso = 1;
//                $cadena_informe_instalacion .= "<br>Error: no se ha podido establecer una conexión con la base de datos. ";

//            }else{

//                     if($objeto_verificador->mostrar_tablas( $conexion, 2 ) != 0 )
//                     {
//                         echo "ya hay tablas creadas, por favor cree una nueva base de datos.<br>";
//                         $interrupcion_proceso = 1;
//                     }
//                 }
//          /***************************************************** PRIMERA TABLA************************************************* */
//                 if( $interrupcion_proceso == 0 )
//                 {
//                     $tmp_nombre_objeto_o_tabla = "tb_idiomas";

//                     //El sistema procedera crear la tabla si no existe.
//                     $sql  = " DROP TABLE IF EXISTS $tmp_nombre_objeto_o_tabla ";
//                     $sql .= " CREATE  TABLE IF NO EXISTS $tmp_nombre_objeto_o_tabla (";
//                     $sql .= " id TINYINT PRIMARY KEY,";
//                     $sql .= " idioma NVARCHAR(15) NOT NULL ";
//                     $sql .= ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
            
//                     $resultado = $conexion->query( $sql );
                    
//                     //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
// 			if( verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
// 			{
// 				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

// 			}else{
// 					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
// 					$interrupcion_proceso = 1;
// 				}
// 		}
//         /***************************************************** SEGUNDA TABLA************************************************* */
//                 if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
//                 {
//                     $tmp_nombre_objeto_o_tabla = "tb_diccionario";

//                     //El sistema procederá a crear la primera tabla si no existe.	
//                     $sql  =	" DROP TABLE IF EXISTS $tmp_nombre_objeto_o_tabla ";	
//                     $sql .= " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
//                     $sql .= " id INT PRIMARY KEY AUTO_INCREMENT,  ";
//                     $sql .= " palabra VARCHAR(60) NOT NULL, ";
//                     $sql .= " palabra_idioma TINYINT NOT NULL, ";
//                     $sql .= " traduccion VARCHAR(60) NOT NULL, ";
//                     $sql .= " traduccion_idioma TINYINT NOT NULL, ";
//                     $sql .= " significado VARCHAR(300) NOT NULL ";
//                     $sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1  ";

//                     $resultado = $conexion->query( $sql );

// 			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
// 			if( verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
// 			{
// 				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

// 			}else{
// 					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
// 					$interrupcion_proceso = 1;
// 				}
// 		}

//         /***************************************************** TERCERA TABLA************************************************* */
//                 if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
//                 {
//                     $tmp_nombre_objeto_o_tabla = "tb_vocabularios";

//                     //El sistema procederá a crear la primera tabla si no existe.	
//                     $sql  =	" DROP TABLE IF EXISTS $tmp_nombre_objeto_o_tabla ";	
//                     $sql .= " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
//                     $sql .= " id INT PRIMARY KEY AUTO_INCREMENT,  ";
//                     $sql .= " frase NVARCHAR(200) NOT NULL, ";
//                     $sql .= " frase_idioma TINYINT NOT NULL, ";
//                     $sql .= " traduccion  NVARCHAR(200) NOT NULL, ";
//                     $sql .= " traduccion_idioma TINYINT NOT NULL, ";
//                     $sql .= " significado VARCHAR(300) NOT NULL ";
//                     $sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1  ";

//                     $resultado = $conexion->query( $sql );

// 			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
// 			if( verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
// 			{
// 				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

// 			}else{
// 					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
// 					$interrupcion_proceso = 1;
// 				}
// 		}
// /*********************************************** FIN CREATE TABLE********************************************************* */
//                                                     ///
// /*********************************************** INICIO ALTER TABLE********************************************************* */
//         /*********************************************** PRIMER ALTER TABLE********************************** */

// 		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
// 		{
// 			$tmp_nombre_objeto_o_tabla  = "fk_diccionario_palabra_idiomas";
//             $tmp_nombre_objeto_o_tabla2 = "fk_diccionario_traduccion_idiomas";

// 			//El sistema procederá a crear una de las restricciones por llave foranea.				
// 			$sql  = " ALTER TABLE tb_diccionario ";
// 			$sql .= " ADD INDEX palabra_idioma_idx(palabra_idioma), ";
//             $sql .= " ADD INDEX traduccion_idioma_idx(traduccion_idioma),";
//             $sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla FOREIGN KEY(palabra_idioma) REFERENCES tb_idiomas(id) ";
//             $sql .= " ON UPDATE CASCADE ON DELETE RESTRICT,";
//             $sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla2 FOREIGN KEY(traduccion_idioma) REFERENCES tb_idiomas(id)";
// 			$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ON DELETE RESTRICT ";

// 			//echo $sql;
// 			$resultado = $conexion->query( $sql );

// 			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
// 			if( verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $tmp_nombre_objeto_o_tabla2, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
// 			{
// 				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla, $tmp_nombre_objeto_o_tabla2 se ha creado con éxito.";	

// 			}else{
// 					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
// 					$interrupcion_proceso = 1;
// 				}
// 		}
        
//         /*********************************************** SEGUNDO ALTER TABLE********************************** */
        
//         if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
// 		{
// 			$tmp_nombre_objeto_o_tabla  = "fk_vocabulario_frase_idiomas";
//             $tmp_nombre_objeto_o_tabla2 = "fk_vocabulario_traduccion_idiomas";

// 			//El sistema procederá a crear una de las restricciones por llave foranea.				
// 			$sql  = " ALTER TABLE tb_vocabularios ";
// 			$sql .= " ADD INDEX frase_idioma_idx(frase_idioma) ";
//             $sql .= " ADD INDEX truduccion_idioma_idx(traduccion_idioma),";
//             $sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla FOREIGN KEY(frase_idioma) REFERENCES tb_idiomas(id) ";
//             $sql .= " ON UPDATE CASCADE ON DELETE RESTRICT,";
//             $sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla2 FOREIGN KEY(traduccion_idioma) REFERENCES tb_idiomas(id)";
// 			$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ON DELETE RESTRICT ";

// 			//echo $sql;
// 			$resultado = $conexion->query( $sql );

// 			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
// 			if( verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
// 			{
// 				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

// 			}else{
// 					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
// 					$interrupcion_proceso = 1;
// 				}
// 		}
// /*********************************************** FIN ALTER TABLE********************************************************* */
		
// 		if( $interrupcion_proceso == 0 )
// 		{
// 			//ojo aquí se usa la clase verificadora para imprimir lo que se ha creado.
// 			echo $objeto_verificador->mostrar_tablas( $conexion ); //Hay que recordar que la conexión ya se creó arriba.

// 			echo "Se han creado ".$objeto_verificador->mostrar_tablas( $conexion, 2 )." tablas de ".numero_de_tablas." que se deb&iacute;an crear.  ";
			
// 			echo "<br><br>";
// 			echo "<a href='borrando_archivos.php' target='_self'>Proceder a borrar archivos de intalaci&oacute;n</a>";
// 			echo "<br><br>";
// 		}
		
// 		echo $cadena_informe_instalacion; //Se imprime un sencillo informe de la instalación.

// 	}else{ 									// Super if - else 
// 			echo "<br>Por favor ingresa el valor de los campos solicitados: Servidor, usuario, base de datos.<br>";
// 		} 									// Super if - final

// 	/*******************************************f u n c i o n e s*********************************************************************/

// 	/**
// 	*	Esta función se encarga de verificar si existe una tabla en el catálogo del sistema.
// 	*	@param 		texto 		el nombre de la tabla a buscar	
// 	*	@param 		texto 		el servidor para la conexión 
// 	*	@param 		texto 		el usuario para la conexión
// 	*	@param 		texto 		la contraseña para la conexión
// 	*	@param 		texto 		el nombre de la base de datos
// 	*	@return 	número 		un número con valores 0 o 1 para indicar o no la existencia de una tabla.
// 	*/
// 	function verificar_existencia_tabla( $tabla, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
// 	{
// 		$conteo = 0;

// 		$sql = " SELECT COUNT( * ) AS conteo FROM information_schema.tables WHERE table_schema = '$bd' AND table_name = '$tabla' ";
// 		if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
// 		$conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
// 		$resultado = $conexion->query( $sql );

// 		while( $fila = mysqli_fetch_assoc( $resultado ) )
// 		{
// 			$conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
// 		}

// 		return $conteo;
// 	}

// 	/**
// 	*	Esta función se encarga de verificar si existe una restricción en el catálogo del sistema. Por supuesto esta función y la
// 	*	de búsqueda de tablas podría ser una sola, generalizando mejor y refactorizando el código.
// 	*	@param 		texto 		el nombre del objeto a buscar	
// 	*	@param 		texto 		el servidor para la conexión 
// 	*	@param 		texto 		el usuario para la conexión
// 	*	@param 		texto 		la contraseña para la conexión
// 	*	@param 		texto 		el nombre de la base de datos
// 	*	@return 	número 		un número con valores 0 o 1 para indicar o no la existencia de una tabla.
// 	*/
// 	function verificar_existencia_objeto( $objeto, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
// 	{
// 		$conteo = 0;

// 		//$sql = " SELECT COUNT( * ) AS conteo FROM information_schema.tables WHERE table_schema = '$bd' AND table_name = '$tabla' ";
// 		$sql = " SELECT COUNT( * ) AS conteo FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = '$bd' AND CONSTRAINT_NAME = '$objeto'; ";
// 		if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
// 		$conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
// 		$resultado = $conexion->query( $sql );

// 		while( $fila = mysqli_fetch_assoc( $resultado ) )
// 		{
// 			$conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
// 		}

// 		return $conteo;
// 	}
?>