<?php

class Controller_Auth extends Controller
{
    public function action_login()
    {
        $message = '';

        if (Auth::instance()->logged_in()) {
            // Redirect to the user's dashboard or homepage
            $this->redirect('dashboard');
        }

        if (Kohana_HTTP_Request::POST == $this->request->method()) {
            $success = Auth::instance()->login($this->request->post('username'), $this->request->post('password'));

            if ($success) {
                $this->redirect('dashboard');
            } else {
                $message = 'Login failed. Please try again.';
            }
        }

        // Display the login form
        $view = View::factory('auth/login')
            ->set('message', $message);
        $this->response->body($view);
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        $this->redirect('auth/login');
    }
}
