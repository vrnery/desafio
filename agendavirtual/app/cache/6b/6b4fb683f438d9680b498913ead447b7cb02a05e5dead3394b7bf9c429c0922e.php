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

/* layouts/headermenu.html */
class __TwigTemplate_7f179684068c46516d0f6554bde53a1266f25c2e043060da3b5189cd76ffa355 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'headermenu' => [$this, 'block_headermenu'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->displayBlock('headermenu', $context, $blocks);
    }

    public function block_headermenu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"collapse navbar-collapse\" id=\"navbarText\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Home <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Features</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Pricing</a>
            </li>
        </ul>
        <span class=\"navbar-text\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                        Login
                    </a>
                    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdownMenuLink\">
                        <form class=\"px-4 py-3\">
                            <div class=\"form-group\">
                                <label for=\"exampleDropdownFormEmail1\">Email address</label>
                                <input type=\"email\" class=\"form-control\" id=\"exampleDropdownFormEmail1\"
                                    placeholder=\"email@example.com\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleDropdownFormPassword1\">Password</label>
                                <input type=\"password\" class=\"form-control\" id=\"exampleDropdownFormPassword1\"
                                    placeholder=\"Password\">
                            </div>
                            <div class=\"form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"dropdownCheck\">
                                <label class=\"form-check-label\" for=\"dropdownCheck\">
                                    Remember me
                                </label>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary\">Sign in</button>
                        </form>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"#\">New around here? Sign up</a>
                        <a class=\"dropdown-item\" href=\"#\">Forgot password?</a>
                    </div>
                </li>
            </ul>
        </span>
    </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "layouts/headermenu.html";
    }

    public function getDebugInfo()
    {
        return array (  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block headermenu %}
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"collapse navbar-collapse\" id=\"navbarText\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Home <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Features</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Pricing</a>
            </li>
        </ul>
        <span class=\"navbar-text\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                        Login
                    </a>
                    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdownMenuLink\">
                        <form class=\"px-4 py-3\">
                            <div class=\"form-group\">
                                <label for=\"exampleDropdownFormEmail1\">Email address</label>
                                <input type=\"email\" class=\"form-control\" id=\"exampleDropdownFormEmail1\"
                                    placeholder=\"email@example.com\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleDropdownFormPassword1\">Password</label>
                                <input type=\"password\" class=\"form-control\" id=\"exampleDropdownFormPassword1\"
                                    placeholder=\"Password\">
                            </div>
                            <div class=\"form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"dropdownCheck\">
                                <label class=\"form-check-label\" for=\"dropdownCheck\">
                                    Remember me
                                </label>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary\">Sign in</button>
                        </form>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"#\">New around here? Sign up</a>
                        <a class=\"dropdown-item\" href=\"#\">Forgot password?</a>
                    </div>
                </li>
            </ul>
        </span>
    </div>
</nav>
{% endblock headermenu %}", "layouts/headermenu.html", "/home/vanderson/desafio/agendavirtual/app/views/layouts/headermenu.html");
    }
}
