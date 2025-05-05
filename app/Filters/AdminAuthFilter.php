<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use IonAuth\Libraries\IonAuth;

class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = new IonAuth();

        if (!$auth->loggedIn()) {
            return redirect()->to('/auth/login');
        }

        $currentUser = $auth->user()->row();
        
        if (!$auth->inGroup($arguments, $currentUser->id)) {
            session()->setFlashdata("errors", "Maaf, Anda tidak memiliki izin untuk mengakses halaman yang diminta.");
            return redirect()->to('/');
            
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}