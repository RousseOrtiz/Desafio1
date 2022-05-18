<?php
class ArchivosController extends AppController {
    public function index()
    {
        
    }

    public function listar($page =1)
    {
        $this->lista = (new Archivos)->getdatos($page);
    }
    public function editar($idArchivo){
        $editar= new Archivos();
             if (Input::hasPost('archivos')){

                if($editar->update(Input::post('archivos'))){
                    Flash::valid('OE');
                    return Redirect::to();
                }
                Flash::error('OF');
                return;
             }

             $this->archivos = $editar->find_by_idArchivo((int) $idArchivo);
    }

    public function crear()
    {
        if (Input::hasPost('archivos')){
            $crear = new Archivos(Input::post('Archivos'));
            if ($crear->crear()){
                Flash::valid('Opercion Exitosa');
                Input::delete();
                return;
            }
            Flash::error('Opercion Fallida');
        }
    }

    public function eliminar($idArchivo){
    
        if ((new Archivos)->delete((int) $idArchivo)) {
            Flash::valid('Operación exitosa');
        
    } else {
            Flash::error('Falló Operación');
    }
   
    return Redirect::to();

    }
    public function ver($idArchivo){
        $veer = new Archivos();
        $this->veer = $veer->find_by_idArchivo((int) $idAcceso);
    
    }
    }


