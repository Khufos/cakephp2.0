<?php



class AfastamentosController extends Controller {
 
    public $layout = "novoLayout";
   
    public $paginate = array(
        'fields'=> array('Afastamento.id', 'Afastamento.data_afastamento','Afastamento.nome_funcionario',
        'Afastamento.cidade','Afastamento.local_afastamento','Afastamento.tipo_afastamento','Afastamento.periodo_inicio',
        'Afastamento.periodo_fim','Afastamento.observacoes','Afastamento.motivo'),
        'conditions' => array(),
        'limit' => 2,
        'order'=> array('Afastamento.nome_funcionario')
    );


    public function index() {
        
        $pessoas = $this->Afastamento->find('all', [
            'fields' => ['Afastamento.nome_funcionario']
        ]);
        // var_dump($pessoas);
        // $hello = $this->request->data['nomeDefensor'];
   

        if($this->request->is('post') && !empty($this->request->data["Afastamento"]["nome_defensor"])){
            $this->paginate['conditions']["Afastamento.nome_funcionario"] = $this->request->data["Afastamento"]["nome_defensor"];
        }
        // Passar os dados para a view
        $afastamentos = $this->paginate();  
        $this->set(compact('pessoas'));
        $this->set(compact('afastamentos','pessoas'));
    }



    public function pegarDados(){
        $this->autoRender = false;
        pr($this->request->data);   
    
        

    }
}
