<?php
class CiudadesController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Ciudades)->getdatos($page);    
}

public function editar($id){

    $editar = new Ciudades();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('ciudades')) {
 
            if ($editar->update(Input::post('ciudades'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->ciudades = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('ciudades')) {
    
        $create = new Ciudades(Input::post('ciudades'));
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
    
        if ((new Ciudades)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Ciudades();
    $this->ver = $ver->find_by_id((int) $id);

}
}
