<?php
class PrestamosController extends AppController{


public function index(){
    
    }

public function listar($page = 1){
    
      $this->listar = (new Prestamos)->getdatos($page);    
}

public function editar($id){

    $editar = new Prestamos();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('prestamos')) {
 
            if ($editar->update(Input::post('prestamos'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->prestamos = $editar->find_by_id((int) $id);
}

public function crear(){
    
    if (Input::hasPost('prestamos')) {
    
        $create = new Prestamos(Input::post('prestamos'));
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
    
        if ((new Prestamos)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
    //Flash::warning("Advertencia: No ha iniciado sesión en el sistema");

    //enrutando por defecto al index del controller
    return Redirect::to();

    }


public function ver($id){

    $ver = new Prestamos();
    $this->ver = $ver->find_by_id((int) $id);

}
}
