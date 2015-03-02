namespace Slim\Middleware;

class OAuth2Auth extends \Slim\Middleware
{
    protected $headers = array();

    protected $config;

    protected $mysql; // PDO

    public function __construct($headers, $config, $mysql) {
        $this->headers = $headers;
        $this->config = $config;
        $this->mysql = $mysql;
    }

    public function call() {
        // no auth header
        if(!isset($this->headers['Authorization'])) {
            $this->app->getLog()->error("No authorization header");
            $view = $this->app->view();
            $view->setData("data", array("message" => "Access credentials not supplied"));
            $view->render('error.php', 400);
        } else {
             try {
                $authHeader = $this->headers['Authorization'];
                $auth = new \Service\Mysql\AuthService($this->mysql, $this->config);
                $validated_user_id = $auth->verifyOAuth($authHeader);
                $this->app->user_id = $validated_user_id;
             } catch (\Exception $e) {
                $view = $this->app->view();
                $view->setData("data", array("message" => $e->getMessage()));
                $view->render('error.php', $e->getCode());
             }
           }

        // this line is required for the application to proceed
        $this->next->call();
    }
}