<?php
class AccesosController extends AppController {
    public function index()
    {
        
    }

    public function listar($page =1)
    {
        $this->lista = (new Accesos)->getdatos($page);
    }
    public function editar($idAcceso){
        $editar= new Accesos();
             if (Input::hasPost('accesos')){

                if($editar->update(Input::post('accesos'))){
                    Flash::valid('OE');
                    return Redirect::to();
                }
                Flash::error('OF');
                return;
             }

             $this->accesos = $editar->find_by_idAcceso((int) $idAcceso);
    }

    public function crear()
    {
        if (Input::hasPost('Accesos')){
            $crear = new Accesos(Input::post('Accesos'));
            if ($crear->crear()){
                Flash::valid('Opercion Exitosa');
                Input::delete();
                return;
            }
            Flash::error('Opercion Fallida');
        }
    }

    public function eliminar($idAcceso){
    
        if ((new Acceso)->delete((int) $idAcceso)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
   
    return Redirect::to();

    }
    public function ver($idAcceso){
        $veer = new Acceso();
        $this->veer = $veer->find_by_idAcceso((int) $idAcceso);
    
    }
    }


