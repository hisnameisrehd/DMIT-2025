<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summer Vacation Echo Exercise</title>
    
    <style type="text/css">
    html {
        background-color: #efefef;
    }
    /* Style body text, <h1>, etc.  */
    h1 {
        color: blue;
        font-family: verdana;
    }
    p {
        font-family: courier;
        padding: 0 5rem 0 0;
    }
    img {
        padding: 1rem 0;
        width: 100%;
    }
    #container {
        margin: 0 auto;
        max-width: 95%;
    }
    .banner {
        margin-top: 2rem;
        padding: 0 1rem 0 1rem;
        border: solid #5c5c5c 2px;
        background-color: #6a6a6a;
        color: #fff;
        word-spacing: .2rem;
    }
    .info-box {
        margin-top: 1.2rem;
        padding:0 1rem;
        border: solid #9c9c9c 1px;
        background-color: #fff;
    }
    .flex {
        display: flex;
        justify-content: space-between;
    }
    .sub-heading {
        font-size: 1.2rem;
        font-weight: 700;
        color: #336;
    }
    </style>
    <!--
     • Must have: 
        o One <img>; the actual image file should be in same directory. 
     • Add formatting to CSS as you go. CSS does NOT have to be done using PHP echo. 
        o Align center and apply width, padding, etc. 
      -->

</head>
<body>
    <?php
    // Create a <div id=”container”> 
    echo("<div id=\"container\">\n");
    echo("\t\t<div class=\"banner\">\n");
    // One <h1>
    echo("\t\t\t<h1>What I Did on My Summer Vacation</h1>\n");
    // Several <p> or unique <div>s for separate topics. 
    echo("\t\t</div>\n");
    echo("\t\t<div class=\"info-box\">\n");
    echo("\t\t\t<p class=\"sub-heading\">Took class in summer</p>\n");
    // Several <br />
    echo("<br />");
    echo("\t\t\t<p>In hopes to graduate a semester early, I took DMIT2028 - Systems Analysis and Design II</p>\n");
    // One list (<ul> or <ol>)
    echo("\t\t\t<ul>\n");
    echo("\t\t\t\t<li>Introduced to the Unified Process methodology and it's development phases.</li>\n");
    echo("\t\t\t\t<li>Created Usecase Models, Narratives, Sequence diagrams and Class diagrams.</li>\n");
    echo("\t\t\t\t<li>Assessed and developed with the Agile UP methodology method to support software design.</li>\n");
    echo("\t\t\t<ul>");
    echo("\t\t</div>\n");
    echo("\t\t<div class=\"info-box\">\n");
    echo("\t\t\t<p class=\"sub-heading\">Worked a lot</p>\n");
    echo("<br />");
    echo("\t\t\t<p>Over the summer break, I worked at Albert Health Services as a device tester. My postition required me to ensure the proper configuration of the printers, barcode scanners, and e-signature pads. This was all in preperation for the Connect Care project which is set to launch in November.</p>\n");
    echo("\t\t</div>\n");
    echo("\t\t<div class=\"info-box flex\">\n");
    echo("\t\t\t<p class=\"sub-heading\">Went to a wedding</p>\n");
    echo("<br />");
    echo("\t\t\t<div>\n");
    echo("\t\t\t\t<p>In addition to my already-busy summer, I was asked to be the best man to my friends wedding. Fortunately, the speech went well....However, everyone was drunk, so I'm not sure.</p>\n");
    echo("\t\t\t</div>\n");
    echo("<\t\t\tdiv>\n");
    echo("\t\t\t\t<img src=\"wedding-dog.jpg\" alt=\"\">\n");
    echo("\t\t\t</div>\n");
    echo("\t\t</div>\n");
    echo("\t</div>\n");
    ?>

</body>
</html>
