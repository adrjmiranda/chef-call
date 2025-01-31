<?php

namespace App\Controllers\Site;

use App\Core\BaseController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Controller responsible for the cart page
 * 
 * @package App\Controllers\Site
 */
class CartController extends BaseController
{
  /**
   * Method responsible for redefining the cart view
   *
   * @param \Psr\Http\Message\ServerRequestInterface $request
   * @param \Psr\Http\Message\ResponseInterface $response
   * @param array $args
   * @return Response
   */
  public function index(Request $request, Response $response, array $args = []): Response
  {
    $view = $this->render('site.cart', []);
    $response->getBody()->write($view);

    return $response;
  }
}