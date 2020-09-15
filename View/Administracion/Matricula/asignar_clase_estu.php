
         
                            <div class="block-content collapse in">
                                
       
        <div class="titulo"><strong>Asignar Estudiante a una Clase</strong></div>
       
  
                     <input type="search" ID="buscar_profe" placeholder="DNI, Apellido, Nombre o Usuario"/>  
                      <div class="btnBuscar">
                     <button id="btnGuardar" type="button"  onclick="buscarEstu('../../Controlador','EstuControlador.php',29,'EstuEncontradoAjax')"  class="btn btn-primary">Buscar</button>       
                      </div>
     

            
            <div id="EstuEncontradoAjax" class="block-content collapse in AjaxProfe">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					<th>Foto</th>
					<th>Estudiante</th>
                                        <th>DNI</th>
                                        <th>Edad</th>
		</tr>
		</thead>
		<tbody>

		<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
		</tr>
	
		</tbody>
	</table>
        
   </div>
</div>
             
                            </div>