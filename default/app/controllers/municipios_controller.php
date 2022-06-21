<?php
class MunicipiosController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Municipios)->getdatos($page);    
}

public function editar($id){

    $editar = new Municipios();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('municipios')) {
 
            if ($editar->update(Input::post('municipios'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->municipios = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('municipios')) {
    
        $create = new Municipios(Input::post('municipios'));
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
    
        if ((new Municipios)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Municipios();
    $this->ver = $ver->find_by_id((int) $id);

}
}
