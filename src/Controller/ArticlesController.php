<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); 
        $this->Auth->allow(['tags']);
        $this->viewBuilder()->layout('frontend');
    }

    public function index()
    {
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));

        $message = 'success';
        $this->set('response', $articles);
        $this->set([
            'message' => $message,
            '_serialize' => ['message', 'response']
        ]); 
    }

    public function view($slug)
    {
        $article = $this->Articles->findBySlug($slug)->contain(['Tags'])
        ->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $article = $this->Articles->newEntity();
        $article->user_id = $this->Auth->user('id');

        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            
            // Changed: Set the user_id from the session.
            $article->user_id = $this->Auth->user('id');
 
             //Check if image has been uploaded
             if(!empty($article->upload))
             {
                     $file =$article->upload; //put the data into a var for easy use

                     $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                     $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                     //only process if the extension is valid
                     if(in_array($ext, $arr_ext))
                     {
                             //do the actual uploading of the file. First arg is the tmp name, second arg is 
                             //where we are putting it
                             $imageName=time().'_'.$file['name'];
                             move_uploaded_file($file['tmp_name'],WWW_ROOT .'img/'.$imageName);

                             //prepare the filename for database entry
                             $article->image = $imageName;
                     }
             }


            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index', 'home']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        // Get a list of tags.
        $tags = $this->Articles->Tags->find('list');

        // Set tags to the view context
        $this->set('tags', $tags);

        $this->set('article', $article); 
    }

    public function edit($slug)
    {
        $article = $this->Articles
                        ->findBySlug($slug)
                        ->contain('Tags') // load associated Tags
                        ->firstOrFail();
        $article->user_id = $this->Auth->user('id');

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            //Check if image has been uploaded
             if(!empty($article->upload))
             {
                     $file =$article->upload; //put the data into a var for easy use

                     $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                     $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                     //only process if the extension is valid
                     if(in_array($ext, $arr_ext))
                     {
                             //do the actual uploading of the file. First arg is the tmp name, second arg is 
                             //where we are putting it
                             $imageName=time().'_'.$file['name'];
                             move_uploaded_file($file['tmp_name'],WWW_ROOT .'img/'.$imageName);

                             unlink(WWW_ROOT .'img/'.$article->image);
                             //prepare the filename for database entry
                             $article->image = $imageName;
                     }
             }

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index', 'home']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        // Get a list of tags.
        $tags = $this->Articles->Tags->find('list');

        // Set tags to the view context
        $this->set('tags', $tags);

        $this->set('article', $article);


        $this->set('message', $article);
        $this->set('response', $article);
        $this->set('_serialize', 'response');

    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index', 'home']);
        }
    }
    public function tags(...$tags) //PHP’s variadic argument:
    {
        // Use the ArticlesTable to find tagged articles.
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ]);
    
        // Pass variables into the view template context.
        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }

   


}