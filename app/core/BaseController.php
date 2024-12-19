<?php

namespace App\Core;

abstract class BaseController
{
  protected function render(string $viewName, array $data): string
  {
    $templateName = TemplateView::getFileTemplate($viewName);
    $twig = TemplateView::getEnviroment();

    return $twig->render($templateName, $data);
  }
}