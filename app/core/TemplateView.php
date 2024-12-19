<?php

namespace App\Core;

use Exception;
use App\Core\Helpers\Path;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TemplateView
{
  private ?Environment $environment = null;
  private ?FilesystemLoader $loader = null;

  private static function getViewsPath(): string
  {
    return Path::root() . '/app/views';
  }

  public static function getFileTemplate(string $templateName): ?string
  {
    $templatePath = str_replace('.', '/', $templateName) . '.twig';

    if (!file_exists($templatePath)) {
      throw new Exception("Template {$templatePath} not found", 500);
    }

    return $templatePath;
  }

  private static function templateLoader(): FilesystemLoader
  {
    if (self::$loader === null) {
      self::$loader = new FilesystemLoader(self::getViewsPath());
    }

    return self::$loader;
  }

  public static function getEnviroment(): Environment
  {
    if (self::$environment === null) {
      self::$enviroment = new Environment(self::templateLoader(), [
        'auto_reload' => true,
        'optimizations' => -1,
        'cache' => false
      ]);
    }

    return self::$environment;
  }
}