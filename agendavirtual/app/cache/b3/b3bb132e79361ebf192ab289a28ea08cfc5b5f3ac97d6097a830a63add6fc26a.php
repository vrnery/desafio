<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layouts/footerbase.html */
class __TwigTemplate_149330705bb4fa6df0dcbe93ad4d8dcb76bc5c43bfbb835cf61ebeed234216a7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<h6>&copy; Copyright 2020 by <a href=\"http://www.vrnery.com.br/\">vrnery</a>. Obrigado pela preferencia. </h6>";
    }

    public function getTemplateName()
    {
        return "layouts/footerbase.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h6>&copy; Copyright 2020 by <a href=\"http://www.vrnery.com.br/\">vrnery</a>. Obrigado pela preferencia. </h6>", "layouts/footerbase.html", "/home/vanderson/desafio/agendavirtual/app/views/layouts/footerbase.html");
    }
}
