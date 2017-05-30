<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ingredientes Controller
 *
 * @property \App\Model\Table\IngredientesTable $Ingredientes
 *
 * @method \App\Model\Entity\Ingrediente[] paginate($object = null, array $settings = [])
 */
class IngredientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    
    public $paginate = array( // Se establece la configuracón por defecto del paginado, administrado por CAKE.
        'limit'=>5,
        'order' => array(
            'Ingredientes.nombre' => 'asc'
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
                            'Ingredientes.nombre' => 'asc'
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
                            'Ingredientes.nombre' => 'asc'
                             ),    
                            'conditions' => array(
                             'Ingredientes.nombre' <> ''
                                )
                                        );
            }
        }
        $ingredientes = $this->paginate($this->Ingredientes);
        $this->set(compact('ingredientes'));
        $this->set('_serialize', ['ingredientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingrediente = $this->Ingredientes->get($id, [
            'contain' => ['Recetas']
        ]);

        $this->set('ingrediente', $ingrediente);
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingrediente = $this->Ingredientes->newEntity();
        if ($this->request->is('post')) {
            $ingrediente = $this->Ingredientes->patchEntity($ingrediente, $this->request->getData());
            if ($this->Ingredientes->save($ingrediente)) {
                $this->Flash->success(__('The ingrediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingrediente could not be saved. Please, try again.'));
        }
        $recetas = $this->Ingredientes->buscarRecetas();
        $this->set(compact('ingrediente', 'recetas'));
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingrediente = $this->Ingredientes->get($id, [
            'contain' => ['Recetas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingrediente = $this->Ingredientes->patchEntity($ingrediente, $this->request->getData());
            if ($this->Ingredientes->save($ingrediente)) {
                $this->Flash->success(__('The ingrediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingrediente could not be saved. Please, try again.'));
        }
        $recetas = $this->Ingredientes->buscarRecetas();
        $this->set(compact('ingrediente', 'recetas'));
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingrediente = $this->Ingredientes->get($id);
        if ($this->Ingredientes->delete($ingrediente)) {
            $this->Flash->success(__('The ingrediente has been deleted.'));
        } else {
            $this->Flash->error(__('The ingrediente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
