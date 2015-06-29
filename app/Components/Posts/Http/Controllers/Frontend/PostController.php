<?php namespace App\Components\Posts\Http\Controllers\Frontend;

use App\Components\Posts\Repositories\PostRepository;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PostController extends Controller
{

   
    public function __construct()
    {
        parent::__construct();
       
    }

    /**
     * View page or post 
     * @return \Illuminate\View\View
     */
    public function getIndex($slug,$id,PostRepository $postRepository)
    { 
        $post = $postRepository->getPost($id);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.showpage', compact('post'));
    }
    public function getPage($slug,$id,PostRepository $postRepository)
    { 
        $post = $postRepository->getPost($id);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.showpage', compact('post'));
    }
    public function getPost($slug,$id,PostRepository $postRepository)
    { 
        $post = $postRepository->getPost($id);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.showpage', compact('post'));
    }
    public function getFaq()
    { 
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.posts.faq');
    }
}