<?php
class BancoController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Bancos)->getdatos($page);    
}

public function editar($id){

    $editar = new Bancos();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('bancos')) {
 
            if ($editar->update(Input::post('bancos'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->bancos = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('bancos')) {
    
        $create = new Bancos(Input::post('bancos'));
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
    
        if ((new Bancos)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Bancos();
    $this->ver = $ver->find_by_id((int) $id);

}
}
