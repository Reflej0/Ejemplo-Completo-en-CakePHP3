<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recetas Controller
 *
 * @property \App\Model\Table\RecetasTable $Recetas
 *
 * @method \App\Model\Entity\Receta[] paginate($object = null, array $settings = [])
 */
class RecetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    
    public $paginate = array( // Se establece la configuracón por defecto del paginado, administrado por CAKE.
        'limit'=>5,
        'order' => array(
            'Recetas.nombre' => 'asc'
        )
    
    );
    
    
    public function index()
    {
        //La primera vez que se inicia la pagina, la variable tags no esta asignada, el primer IF escapea esto.
        if ($this->request->is('post') && isset($this->request->data['tags'])) {
            // Esto es cuando el input es distinto de nada, osea que hay un filtro establecido.
            if(($this->request->data['tags']) != ''){
                            $search = $this->request->data['tags'];
                            $this->paginate = array(
                            'limit'=>5,
                            'order' => array(
                            'Recetas.nombre' => 'asc'
                             ),    
                            'conditions' => [ 'OR' => [
                            'nombre LIKE' => $search . '%',
                                         ]]
                                        );
            }
            // Esto es cuando el input esta vacío, no hay filtro, entonces muestro todos los registros.
            else{
                $this->paginate = array(
                             'limit'=>5,
                            'order' => array(
                            'Recetas.nombre' => 'asc'
                             ),    
                            'conditions' => array(
                             'Recetas.nombre' <> ''
                                )
                                        );
            }
        }
        $recetas = $this->paginate($this->Recetas);

        $this->set(compact('recetas'));
        $this->set('_serialize', ['recetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => ['Ingredientes']
        ]);

        $this->set('receta', $receta);
        $this->set('_serialize', ['receta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receta = $this->Recetas->newEntity();
        if ($this->request->is('post')) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->getData());
            if ($this->Recetas->save($receta)) {
                $this->Flash->success(__('The receta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The receta could not be saved. Please, try again.'));
        }
        
        $ingredientes = $this->Recetas->buscarIngredientes();
        $this->set(compact('receta', 'ingredientes'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => ['Ingredientes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->getData());
            if ($this->Recetas->save($receta)) {
                $this->Flash->success(__('The receta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The receta could not be saved. Please, try again.'));
        }
        $ingredientes = $this->Recetas->buscarIngredientes();
        $this->set(compact('receta', 'ingredientes'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receta = $this->Recetas->get($id);
        if ($this->Recetas->delete($receta)) {
            $this->Flash->success(__('The receta has been deleted.'));
        } else {
            $this->Flash->error(__('The receta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
