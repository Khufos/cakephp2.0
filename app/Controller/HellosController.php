<?php



class HellosController extends Controller {


    public function imprimir(){
        $filmes = "iago";
        $this->set(compact('filmes'));
    }
    
}
