

 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
 <li>
       <a href="/gestion/usuario"><i class="gi gi-parents"></i> Usuarios</a>
      </li>

      <li>
       <a href="/gestion/crear-usuario"><i class="fa fa-user-plus"></i> Crear Usuario</a>
      </li>
     </ul>
    </div>


<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Editar</strong> Usuario</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                      {{ Form::open(array('method' => 'PUT','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/usuario/actualizar',$usuario->id))) }}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre</label>
                                            <div class="col-md-9">
                                                {{Form::text('name', $usuario->name, array('class' => 'form-control','placeholder'=>'Ingrese nombre'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Apellido</label>
                                            <div class="col-md-9">
                                                {{Form::text('last_name', $usuario->last_name, array('class' => 'form-control','placeholder'=>'Ingrese apellido'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Email</label>
                                            <div class="col-md-9">
                                                {{Form::text('email', $usuario->email, array('class' => 'form-control','placeholder'=>'Ingrese email'))}}
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección de residencia</label>
                                            <div class="col-md-9">
                                                 {{Form::text('address', $usuario->address, array('class' => 'form-control','placeholder'=>'Ingrese dirección'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono Fijo o Célular</label>
                                            <div class="col-md-9">
                                                {{Form::text('phone', $usuario->phone, array('class' => 'form-control','placeholder'=>'Ingrese teléfono fijo o célular'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Rol Usuario</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('level', [$usuario->rol_id => $usuario->rol_id,
                                                    '1' => 'Administrador',
                                                    '2' => 'Comprador',
                                                    '3' => 'Fichador'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                          <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                  @foreach($usuario as $usuario)
                                 @endforeach
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>


<footer>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

   {{ Html::script('validaciones/usuarios/crear-usuario.js') }}
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 




</footer>
 @stop


