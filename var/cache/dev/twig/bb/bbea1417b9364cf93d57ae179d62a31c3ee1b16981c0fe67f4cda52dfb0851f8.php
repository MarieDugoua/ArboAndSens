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

/* home/index.html.twig */
class __TwigTemplate_5c485d1880514860d172e3fa9a66a1d866607a52be1b68b35b63a4b4a1412f13 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    <div class=\"container\">
        <div id=\"carouselExampleCaptions\" class=\"carousel slide\" data-bs-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
                <li data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"0\" class=\"active\"></li>
                <li data-bs-target=\"#carousel2\" data-bs-slide-to=\"1\"></li>
            </ol>
            <div class=\"carousel-inner\">
                <div class=\"carousel-item active\">
                    <img src=\"https://www.furniturebank.org/wp-content/uploads/20180918-_DSC2209.jpg\" class=\"d-block w-100\" alt=\"image\" width=300px height=300px>
                    <div class=\"carousel-caption d-none d-md-block\">
                        <h5>ArboAndSens</h5>
                        <p>Une entreprise Française, 100% locale et éco-responsable.</p>
                    </div>
                </div>
                <div class=\"carousel-item\">
                    <img src=\"https://engineering.berkeley.edu/wp-content/uploads/2020/04/sweohp02-scaled.jpg\" class=\"d-block w-100\" alt=\"image\" width=300px height=300px>
                    <div class=\"carousel-caption d-none d-md-block\">
                        <h5>ArboAndSens</h5>
                        <p>Une équipe en or.</p>
                    </div>
                </div>
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleCaptions\" role=\"button\" data-bs-slide=\"prev\">
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carousel2\" role=\"button\" data-bs-slide=\"next\">
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Next</span>
            </a>
        </div>
        <div>
            <p class=\"font-weight-bold\">Présentation entreprise</p>
            <p class=\"text-justify\">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
            <button type=\"button\" class=\"btn btn-link\">Envie d'en savoir plus ?</button>
        </div>
        <div>
            <br>
            <p class=\"font-weight-bold\">Présentation équipe</p>
            <p class=\"text-justify\">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
            <button type=\"button\" class=\"btn btn-link\" >Venez nous découvrir !</button>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}

    <div class=\"container\">
        <div id=\"carouselExampleCaptions\" class=\"carousel slide\" data-bs-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
                <li data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"0\" class=\"active\"></li>
                <li data-bs-target=\"#carousel2\" data-bs-slide-to=\"1\"></li>
            </ol>
            <div class=\"carousel-inner\">
                <div class=\"carousel-item active\">
                    <img src=\"https://www.furniturebank.org/wp-content/uploads/20180918-_DSC2209.jpg\" class=\"d-block w-100\" alt=\"image\" width=300px height=300px>
                    <div class=\"carousel-caption d-none d-md-block\">
                        <h5>ArboAndSens</h5>
                        <p>Une entreprise Française, 100% locale et éco-responsable.</p>
                    </div>
                </div>
                <div class=\"carousel-item\">
                    <img src=\"https://engineering.berkeley.edu/wp-content/uploads/2020/04/sweohp02-scaled.jpg\" class=\"d-block w-100\" alt=\"image\" width=300px height=300px>
                    <div class=\"carousel-caption d-none d-md-block\">
                        <h5>ArboAndSens</h5>
                        <p>Une équipe en or.</p>
                    </div>
                </div>
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleCaptions\" role=\"button\" data-bs-slide=\"prev\">
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carousel2\" role=\"button\" data-bs-slide=\"next\">
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Next</span>
            </a>
        </div>
        <div>
            <p class=\"font-weight-bold\">Présentation entreprise</p>
            <p class=\"text-justify\">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
            <button type=\"button\" class=\"btn btn-link\">Envie d'en savoir plus ?</button>
        </div>
        <div>
            <br>
            <p class=\"font-weight-bold\">Présentation équipe</p>
            <p class=\"text-justify\">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
            <button type=\"button\" class=\"btn btn-link\" >Venez nous découvrir !</button>
        </div>
    </div>
{% endblock %}", "home/index.html.twig", "/Users/leaduvigneau/Documents/ynov/cours/b2/projet_web/arboAndSens/templates/home/index.html.twig");
    }
}
