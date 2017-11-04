<?php
/**
 * The default home controller, called when no controller/method has been passed
 * to the application.
 */
use app\models\Infirmier;
use app\models\Medecin;
use app\models\Secretaire;
class Home extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    /* public function index($name = 'alex', $mood = 'normal')
     {
         $user = $this->model('user');
         $user->name = $name;
         $this->view('home/index', [
             'name' => $user->name,
             'mood' => $mood
         ]);
     }*/
    public function index()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user instanceof Medecin) {
                echo "medecinf";
            } elseif ($user instanceof Infirmier) {
                echo "infermier";
            } elseif ($user instanceof Secretaire) {
                header('Location: ?url=home/secretaire');
            }
        } else {
            $this->view('auth/index', []);
        }
    }
    public function secretaire($size = 5, $offset = 0)
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user instanceof Secretaire) {
                $pages = ceil(count(Medecin::getAll()) / 10);
                $medecins = Medecin::getAll($size, $offset);
                $this->view('home/secretaire', [
                    'pages' => $pages,
                    'medecins' => $medecins
                ]);
                die();
            }
        }
        $this->view('auth/index', []);
    }
}