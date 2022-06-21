<?php
class UsuariosController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Usuarios)->getdatos($page);    
}

public function editar($id){

    $editar = new Usuarios();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('usuarios')) {
 
            if ($editar->update(Input::post('usuarios'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->usuarios = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('usuarios')) {
    
        $create = new Usuarios(Input::post('usuarios'));
        //En caso que falle la operación de guardar
        if ($create->create()) {
            Flash::valid('Operación exitosa');
            //Eliminamos el POST, si no queremos que se vean en el form
            Input::delete();
            return;
        }

        Flash::error('Falló Operación');
    }
}

public function eliminar($id){
    
        if ((new Usuarios)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Usuarios();
    $this->ver = $ver->find_by_id((int) $id);

}
}
