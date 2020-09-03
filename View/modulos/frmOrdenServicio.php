



            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ingresos
                        <button type="button"  class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <!-- Listado-->
                  
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" >
                                      <option value="tipo_comprobante">Tipo Comprobante</option>
                                      <option value="num_comprobante">Número Comprobante</option>
                                      <option value="fecha_hora">Fecha-Hora</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Usuario</th>
                                        <th>Proveedor</th>
                                        <th>Tipo Comprobante</th>
                                        <th>Serie Comprobante</th>
                                        <th>Número Comprobante</th>
                                        <th>Fecha Hora</th>
                                        <th>Total</th>
                                        <th>Impuesto</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm">
                                            <i class="icon-eye"></i>
                                            </button> &nbsp;
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            
                                        </td>
                                        <td>  dsfsdfs</td>
                                        <td>  dsfsdfs</td> 
                                        <td>  dsfsdfs</td> 
                                        <td>  dsfsdfs</td>
                                         <td>  dsfsdfs</td>
                                         <td>  dsfsdfs</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" >
                                    <a class="page-link" href="#" >Ant</a>
                                </li>
                                <li class="page-item" >
                                    <a class="page-link" href="#" >Ant</a>
                                </li>
                                <li class="page-item" >
                                    <a class="page-link" href="#" >Ant</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                   
                    <!--Fin Listado-->
                    <!-- Detalle-->
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Proveedor(*)</label>
                                   <select>
                                      <opcion>calle7</opcion>
                                      <opcion>calle7</opcion>

                                      <opcion>calle7</opcion>


                                   </select>

                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Impuesto(*)</label>
                                <input type="text" class="form-control" >
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo Comprobante(*)</label>
                                    <select class="form-control">
                                        <option value="0">Seleccione</option>
                                        <option value="BOLETA">Boleta</option>
                                        <option value="FACTURA">Factura</option>
                                        <option value="TICKET">Ticket</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Serie Comprobante</label>
                                    <input type="text" class="form-control" placeholder="000x">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número Comprobante(*)</label>
                                    <input type="text" class="form-control"  placeholder="000xx">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div  class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div >

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Artículo <span style="color:red;">(*Seleccione)</span></label>
                                    <div class="form-inline">
                                        <input type="text" class="form-control"  placeholder="Ingrese artículo">
                                        <button  class="btn btn-primary">...</button>
                                        <input type="text" readonly class="form-control" >
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Precio <span style="color:red;" >(*Ingrese)</span></label>
                                    <input type="number" value="0" step="any" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Cantidad <span style="color:red;" >(*Ingrese)</span></label>
                                    <input type="number" value="0" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button  class="btn btn-success form-control btnagregar"><i class="icon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Artículo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr >
                                            <td>
                                                <button  type="button" class="btn btn-danger btn-sm">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </td>
                                            <td >
                                                fghngchgfgh
                                            </td>
                                            <td>
                                                <input  type="number" value="3" class="form-control">
                                            </td>
                                            <td>
                                                <input  type="number" value="2" class="form-control">
                                            </td>
                                            <td>
                                                25425252
                                            </td>
                                        </tr>
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4" align="right"><strong>Total Parcial:</strong></td>
                                            <td>2525</td>
                                        </tr>
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4" align="right"><strong>Total Impuesto:</strong></td>
                                            <td>222impuesto</td>
                                        </tr>
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4" align="right"><strong>Total Neto:</strong></td>
                                            <td>total</td>
                                        </tr>
                                    </tbody>
                                    <tbody >
                                        <tr>
                                            <td colspan="5">
                                                NO hay artículos agregados
                                            </td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button"  class="btn btn-secondary">Cerrar</button>
                                <button type="button" class="btn btn-primary">Registrar Compra</button>
                            </div>
                        </div>
                    </div>
                    </template>
                    <!-- Fin Detalle-->
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" ></h4>
                            <button type="button" class="close"  aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select class="form-control col-md-3" >
                                        <option value="nombre">Nombre</option>
                                        <option value="descripcion">Descripción</option>
                                        <option value="codigo">Código</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Texto a buscar">
                                        <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Precio Venta</th>
                                            <th>Stock</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm">
                                                <i class="icon-check"></i>
                                                </button>
                                            </td>
                                            <td >nomber blaa</td>
                                            <td >nomber blaa</td>
                                            <td >nomber blaa</td>
                                            <td >nomber blaa</td>
                                            <td >nomber blaa</td>

                                            <td>
                                                <div >
                                                    <span class="badge badge-success">Activo</span>
                                                </div>
                                                <div >
                                                    <span class="badge badge-danger">Desactivado</span>
                                                </div>
                                                
                                            </td>
                                        </tr>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Cerrar</button>
                            <button type="button" class="btn btn-primary" >Guardar</button>
                            <button type="button"  class="btn btn-primary" >Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>

