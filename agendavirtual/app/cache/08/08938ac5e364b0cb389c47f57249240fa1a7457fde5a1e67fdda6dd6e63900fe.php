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

/* home.html */
class __TwigTemplate_585e101b3538450e3529e714c90d02c937da89be328ee727f4e9c38399806115 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/base.html", "home.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <h1>Index ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('teste')->getCallable(), []), "html", null, true);
        echo "</h1>
    
    <p class=\"important\">Welcome to my awesome homepage.</p>

    <button id=\"btn_subscribe\" class=\"btn btn-danger\">Subscribe</button>
";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layouts/base.html\" %}

{% block content %}
    <h1>Index {{ teste() }}</h1>
    
    <p class=\"important\">Welcome to my awesome homepage.</p>

    <button id=\"btn_subscribe\" class=\"btn btn-danger\">Subscribe</button>
{% endblock content %}", "home.html", "/home/vanderson/desafio/agendavirtual/app/views/home.html");
    }
}
