<?php 

require_once __DIR__ . '/app/_utils/config.php';
require_once 'vendor/autoload.php';
include_once __DIR__ . '/app/view/layout/header.php';
include_once __DIR__ . '/app/view/layout/menu.php';

use app\_utils\Database;
use app\controller\RegisterController;
use app\controller\ContactController; 
use app\controller\LoginController;

$path = $_SERVER['REDIRECT_URL'] ?? '/';
$path = str_replace(BASE_URL, '/', $path);


switch ($path) {
  case '/funkciok':
      include_once __DIR__ . '/app/view/main/function.php';
      break;
  case '/arak':
      include_once __DIR__ . '/app/view/main/prices.php';
      break;
  case '/kapcsolat':
        $controller = new ContactController();
        $controller->showForm();
        break;
  case '/kapcsolat/kuldes':
        $controller = new ContactController();
        $controller->send();
        break;
  case '/bejelentkezes':
            $database = new Database();
            $controller = new LoginController($database->getConnection());
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $result = $controller->login($_POST['email'], $_POST['password']);
                if ($result['success']) {
                    header("Location: /app/view/auth/dashboard/index.php");
                    exit;
                } else {
                    $error = $result['message'];
                }
            }
        include_once __DIR__ . '/app/view/auth/login.php';
        break;
  case 'dashboard':
        require_once __DIR__ . '/../app/controller/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;
  case '/elfelejtett-jelszo':
        include_once __DIR__ . '/app/view/auth/forgot_password.php';
        break; 
  case '/regisztracio':
        $controller = new \app\controller\RegisterController();
        $controller->register();
        break;
  case '/impresszum':
      include_once __DIR__ . '/app/view/main/impressum.php';
      break;
  case '/aszf':
      include_once __DIR__ . '/app/view/main/terms.php';
      break;
  case '/adatvedelem':
      include_once __DIR__ . '/app/view/main/privacy.php';
      break;
  case '/utmutato':
        include_once __DIR__ . '/app/view/main/guide.php';
        break;
  case '/gyik':
        include_once __DIR__ . '/app/view/main/faq.php';
        break;
    
  case '/':
  default:
      include_once __DIR__ . '/app/view/main/home.php'; 
      break;
}

?>



<?php include_once __DIR__ . '/app/view/layout/footer.php'; ?>
