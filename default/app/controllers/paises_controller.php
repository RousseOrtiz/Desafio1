<?php
class PaisesController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Paises)->getdatos($page);    
}

public function editar($id){

    $editar = new Paises();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('paises')) {
 
            if ($editar->update(Input::post('paises'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->paises = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('paises')) {
    
        $create = new Paises(Input::post('paises'));
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
    
        if ((new Paises)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Paises();
    $this->ver = $ver->find_by_id((int) $id);

}
}
