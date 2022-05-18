<?php
class AbogadosController extends AppController {
    public function index()
    {
        
    }

    public function listar($page =1)
    {
        $this->listar = (new Abogados)->getdatoos($page);
    }

    public function editar($idAbogados){
        $editar= new Abogados();
             if (Input::hasPost('abogados')){

                if($editar->update(Input::post('abogados'))){
                    Flash::valid('OE');
                    return Redirect::to();
                }
                Flash::error('OF');
                return;
             }

             $this->Abogados = $editar->find_by_idAbogados((int) $idAbogados);
    }




    public function crear()
    {
        if (Input::hasPost('abogados')){
            $crear = new Abogados(Input::post('abogados'));
            if ($crear->crear()){
                Flash::valid('Opercion Exitosa');
                Input::delete();
                return;
            }
            Flash::error('Opercion Fallida');
        }
    }

    public function eliminar($idAbogados)
    {
    
        if ((new Abogados)->delete((int) $idAbogados)) {
                 Flash::valid('Operación exitosa');
        
        } else {
                Flash::error('Falló Operación');
    }
    return Redirect::to();
    }

    public function ver($idAbogados){

        $veer = new abogados();
        $this->veer = $veer->find_by_idAbogados((int) $idAbogados);
    
    }
}


    

