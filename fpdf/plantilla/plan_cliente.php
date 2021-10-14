<?php
function getPlantilla(){
    //Se define el timezone que sea necesario
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');

    $afiliado = $_GET['id'];
    $montoi=0;
    $montoe=0;

	$query = "SELECT * FROM t_cuentas where id = $afiliado";//order by id desc limit 1 o  where id = 50919
    


	$result = mysqli_query($mysqli, $query);
    //Dia-Mes-Año Hora:Minutos:Segundos
    $fecha = date('d-m-Y');
    $row = mysqli_fetch_assoc($result);
    $query1 = "SELECT * FROM t_clientes where DNI = $row[DNI]";
	$result1 = mysqli_query($mysqli, $query1);
    $row1 = mysqli_fetch_assoc($result1);

	$plantilla ='
	<body>
	<div class="">
		
                <div class="contenedor">
                    <div class="">
                        <div class="info">
                            <div class="n-cuenta"><h2>AFILIADO: '.$row['id'].'</h2></div>
                            <div class="socio"><h3>VENDEDOR: '.$row['Vendedor'].'</h3></div>
                            <div class="direccion"><h4>FECHA: '.$fecha.'</h4></div>

                        </div>
                    </div>
                    <br>
                        <div class="nota1" style="border: 1px solid #a0a0a0;background-color: #ffffff;">
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>NOMBRE </span><h5>'.$row1['Nombre_y_Apellido'].'</h5>                            
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>DNI </span><h5>'.$row1['DNI'].'</h5>                           
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>TELEFONO 1 </span><h5>'.$row1['Telefono_1'].'</h5>  
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>TELEFONO 2 </span><h5>'.$row1['Telefono_2'].'</h5>  
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>DOMICILIO </span><h5>'.$row1['Direccion'].'</h5>                         
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>LOCALIDAD </span><h5>'.$row1['Provincia_y_Localidad'].'</h5>                          
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>UNIDAD </span><h5>'.$row['Plan'].'</h5>  
                            </div>
                            <div class="firma" style="width: 22%;float: left;text-align: center;">
                                <span>FINANCIACION </span><h4>'.$row['C_Cuotas'].' CUOTAS</h4>  
                            </div>
                        </div>
                        <div class="cont-tabla " style="width: 45%;float: left;padding-left: 12px;">
                        <table>
                            <thead>
                                <tr>
                                    <th>FECHA DE PAGO</th>
                                    <th>N° CUOTAS</th>
                                    <th>MONTO</th>
                                </tr>
                            </thead>
                            <tr>
                                <td style="text-align: center;" >'.$fecha.'</td>
                                <td style="text-align: center;" >1</td>
                                <td  >$'.$row['P_Cuota'].'</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >2</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >3</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >4</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >5</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >6</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >7</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >8</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >9</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >10</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >11</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >12</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >13</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >14</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >15</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >16</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >17</td>
                                <td  >$</td>
                            </tr>                        
                            <tr>
                                <td style="text-align: center;" >_____/_____/_____</td>
                                <td style="text-align: center;" >18</td>
                                <td  >$</td>
                            </tr> 
                        </table>
                        </div>
                        <div class="cont-tabla " style="width: 45%;float: left;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>FECHA DE PAGO</th>
                                        <th>N° CUOTAS</th>
                                        <th>MONTO</th>
                                    </tr>
                                </thead>                      
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >19</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >20</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >21</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >22</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >23</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >24</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >25</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >26</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >27</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >28</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >29</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >30</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >31</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >32</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >33</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >34</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >35</td>
                                    <td  >$</td>
                                </tr>                        
                                <tr>
                                    <td style="text-align: center;" >_____/_____/_____</td>
                                    <td style="text-align: center;" >36</td>
                                    <td  >$</td>
                                </tr>                        
                            </table>
                        </div>
                       
                    
                </div>			

                    '; 
	
		$plantilla.='
	</div>
	</body>';

return $plantilla;
}