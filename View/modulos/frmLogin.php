<center>
<div class="container">
  <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="col-md-4">
          <center>
          <img src="<?php echo $url;?>Recursos/img/logo3.jpg" width="280x;">
          <h3><b>Login</b> </h3>        
          <!-- <h1 class="text-center login-title">Inicie session</h1>
          -->
          </center>
        </div>
        <div class="account-wall">
            <img class="profile-img"  >
            <form method="post">
              <input type="text" class="form-control" name="txtlogin" id="txtlogin" autocomplete="off" placeholder="Usuario"><br>
              <input type="password" class="form-control"  name="txtpassword" id="txtpassword" placeholder="Password"><br>
              <select class="form-control" name='tipoUsuario' >
                <option value='administrador'>administrador
                </option>
                <option value='repartidor'>repartidor
                </option>
                <option value='cliente'>cliente
                </option>
              </select><br>
              <button class="btn btn-primary btn-block btn-lg" type="submit" name="btnenviar" id="btnenviar">Ingresar</button>
              <label class="checkbox pull-left">
                <input type="checkbox" name="" value="remember-me"> Recordar
              </label>
              <a href="#" class="pull-right need-help">Ayuda</a><span class="clearfix">
                
              </span>
            </form>
          </div>
        <?php
            $login=new loginControler();
            $login->controlarIngreso();
        ?>
      </div> 
    </div>
</div>
  </center>