<?php
namespace MotivOnline;

use AltoRouter;

class Application
{
    private $config;
    private $router;

    public function __construct()
    {
        // Get config and set router
        $config = parse_ini_file(__DIR__ . '/config.conf', true);
        $this->config = $config;
        $this->router = new AltoRouter();
        $this->router->setBasePath($config['BASE_PATH']);
        $this->defineRoutes();
    }

    public function defineRoutes()
    {
        // Define route
        $this->router->map('GET', '/', 'MainController#home', 'main_home');
        $this->router->map('GET', '/contact', 'MainController#contact', 'main_contact');
        $this->router->map(
            'GET',
            '/mentions-legales',
            'MainController#legalNotice',
            'main_legalNotice'
        );

        $this->router->map('POST', '/inscription', 'UserController#signup', 'user_signup');
        $this->router->map('GET', '/inscription', 'UserController#signup', 'user_signup_view');
        $this->router->map('POST', '/connexion', 'UserController#signin', 'user_signin');
        $this->router->map('GET', '/connexion', 'UserController#signin', 'user_signin_view');
        $this->router->map('GET', '/profil', 'UserController#profile', 'user_profile');
        $this->router->map('POST', '/profil', 'UserController#updateUser', 'user_update');
        $this->router->map('GET', '/deconnexion', 'UserController#signout', 'user_signout');
        $this->router->map('GET', '/profil/supprimer', 'UserController#deleteUser', 'user_delete');
        $this->router->map(
            'GET',
            '/mot-de-passe-oublie',
            'UserController#changePasswordLink',
            'user_changePasswordLink_view'
        );
        $this->router->map(
            'POST',
            '/mot-de-passe-oublie',
            'UserController#changePasswordLink',
            'user_changePasswordLink'
        );
        $this->router->map(
            'GET',
            '/mot-de-passe/[a:hash]',
            'UserController#changePassword',
            'user_changePassword_view'
        );
        $this->router->map(
            'POST',
            '/mot-de-passe/[a:hash]',
            'UserController#changePassword',
            'user_changePassword'
        );

        $this->router->map(
            'GET',
            '/lettre',
            'LetterController#showAllLetter',
            'letter_list'
        );
        $this->router->map(
            'GET',
            '/lettre/creer',
            'LetterController#createLetter',
            'letter_create_view'
        );
        $this->router->map(
            'POST',
            '/lettre/creer',
            'LetterController#createLetter',
            'letter_create'
        );
        $this->router->map(
            'GET',
            '/lettre/[i:id]',
            'LetterController#showLetter',
            'letter_view'
        );
        $this->router->map(
            'GET',
            '/lettre/[i:id]/[a:section]',
            'LetterController#updateLetter',
            'letter_update_view'
        );
        $this->router->map(
            'POST',
            '/lettre/[i:id]/[a:section]',
            'LetterController#updateLetter',
            'letter_update'
        );
        $this->router->map(
            'GET',
            '/lettre/[a:hash]',
            'LetterController#shareLetter',
            'letter_share'
        );
        $this->router->map(
            'GET',
            '/lettre/[a:hash]/previsualiser',
            'LetterController#shareLetter',
            'letter_preview'
        );
        $this->router->map(
            'GET',
            '/lettre/supprimer/[i:id]',
            'LetterController#deleteLetter',
            'letter_delete'
        );
        $this->router->map(
            'GET',
            '/lettre/[i:id]/entreprise/[i:companyId]',
            'CompanyController#showCompany',
            'company_view'
        );
        $this->router->map(
            'POST',
            '/lettre/[i:id]/entreprise/[i:companyId]',
            'CompanyController#updateCompany',
            'company_update'
        );
    }

    public function run()
    {
        // Get route info, instantiate controller and call method
        $match =  $this->router->match();
        if ($match !== false) {
            $controllerAndMethod = explode('#', $match['target']);
            $controllerName = $controllerAndMethod[0];
            $methodName = $controllerAndMethod[1];
            $controllerName = 'MotivOnline\Controller\\'. $controllerName;
            
            $controller = new $controllerName($this);
            $controller->$methodName($match['params']);
        } else {
            $controller = new \MotivOnline\Controller\MainController($this);
            $controller->sendHttpError(404, "Motiv'Online - erreur 404");
        }
    }

    // Getters and Setter
    public function getRouter()
    {
        return $this->router;
    }

    public function setRouter(AltoRouter $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }
}
