<?php

namespace App\Controllers\Site;

use App\Core\BaseController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Controller responsible for the privacy policies page
 * 
 * @package App\Controllers\Site
 */
class PrivacyPoliciesController extends BaseController
{
  /**
   * Method responsible for redefining the privacy_policies view
   *
   * @param \Psr\Http\Message\ServerRequestInterface $request
   * @param \Psr\Http\Message\ResponseInterface $response
   * @param array $args
   * @return Response
   */
  public function index(Request $request, Response $response, array $args = []): Response
  {
    $view = $this->render('site.privacy_policies', []);
    $response->getBody()->write($view);

    return $response;
  }
}