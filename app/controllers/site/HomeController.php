<?php


namespace App\Controllers\Site;

use App\Core\BaseController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{
  public function index(Request $request, Response $response, array $args = []): Response
  {
    $view = $this->render('site.home', [
      'page_title' => 'Home',
      'title' => 'Home'
    ]);
    $response->getBody()->write($view);

    return $response;
  }
}