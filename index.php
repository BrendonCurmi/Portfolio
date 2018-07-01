<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Portfolio &middot; Brendon Curmi</title>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="img/favicon.png"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/fontawesome-all.min.css"/>
    <link rel="stylesheet/less" type="text/css" href="css/style.less"/>
    <?php
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    if (isMobile()) { ?>
        <link rel="stylesheet" href="css/mobile.css"/>
    <?php } ?>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js" type="text/javascript"></script><![endif]-->
</head>
<body>
<div class="overlay overlay-auto" style="position: relative; padding: 0">
    <img src="img/banner.jpg" style="width: 100%; max-height: 700px"/>
</div>
<div id="banner-desc" style="position: absolute">
    <h1 style="color: white; font-size: 4em; font-weight: bold">Hi, I'm Brendon</h1>
    <h2 style="color: white; font-size: 2em; font-weight: bold">I make stuff</h2>
</div>
<div id="about-me" style="background-color: #ffffff">
    <h2>About Me</h2>
    <div id="about-me-short">
        <p>I'm a self-taught full-stack programmer with a love for developing software and learning.</p>
        <p>I have experience in Java, JavaScript, HTML(5), CSS(3), PHP, Python</p>
        <p>and using tools such as jQuery, MySQL, JavaFX, Bootstrap, Less, Flask, and more.</p>
    </div>
    <div id="about-me-long" class="hidden">
        <p>Java GUI libraries, like Swing and JavaFX</p>
        <p>Database Management Systems, like MySQL and SQLite(3)</p>
        <p>Backend Web Development Frameworks, like Flask</p>
        <p>CSS Pre-Processors, like Less</p>
        <p>Responsive Website Design</p>
        <p>Mobile Development with Android</p>
        <p>Version Control Systems, like Git</p>
        <p>JavaScript libraries, like jQuery and Bootstrap</p>
        <p>Data Formats, like JSON and XML</p>
    </div>
    <button class="btn btn-ghost" onclick="aboutMeToggle()">Expand</button>
</div>
<div style="background-color: #34495e">
    <h2>Some Projects I've Worked On</h2>
        <div id="what-i-do">
            <p style="grid-area: type-1" onclick="projectsViewToggle(TYPE.ANDROID)"><i class="fab fa-android"></i><br/>Android Applications</p>
            <p style="grid-area: type-2" onclick="projectsViewToggle(TYPE.DESKTOP)"><i class="fas fa-laptop"></i><br/>Desktop Applications</p>
            <p style="grid-area: type-3" onclick="projectsViewToggle(TYPE.WEBSITE)"><i class="far fa-file"></i><br/>Websites</p>
            <p style="grid-area: type-4"><i class="fas fa-images"></i><br/>Image Editing</p>
            <p style="grid-area: type-5"><i class="far fa-file-audio"></i><br/>Audio Editing</p>
        </div>
    <button class="btn btn-ghost" onclick="projectsViewToggle()">View</button>
    <div id="projects-view" class="hidden">
        <br/>
    </div>
</div>
<footer style="text-align: center">
    <p>Made by Brendon Curmi</p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" type="text/javascript"></script>
    <script src="js/anti-solicit.js" type="text/javascript"></script>
    <script src="js/less.min.js" type="text/javascript"></script>
</footer>
<script>
    var projectsViewToggled = false, viewing = "undefined";
    function projectsViewToggle(type) {
        var sel = $("#projects-view");

        function toggle(action) {
            if (typeof action === "undefined") {
                sel.slideToggle("slow");
                projectsViewToggled = !projectsViewToggled;
            } else if (action === "hide") {
                sel.slideUp("slow");
                projectsViewToggled = false;
            } else if (action === "show") {
                sel.slideDown("slow");
                projectsViewToggled = true;
            }
        }

        function reset() {
            child.each(function() {
                $(this).show();
            });
        }

        var child = sel.children("figure"), delay = 0;
        if (typeof type === "undefined") {
            if (viewing === "undefined" || !projectsViewToggled) {
                reset();
                toggle();
            } else if (projectsViewToggled && viewing !== "undefined") toggle("hide");
            type = typeof type;
        } else if (typeof type !== "undefined") {
            if (projectsViewToggled && type !== viewing) {
                toggle("hide");
                delay = 600;
            }
            setTimeout(function() {
                reset();
                child.each(function() {
                    if (!$(this).hasClass(type)) $(this).hide();
                });
                toggle();
            }, delay)
        }
        viewing = type;
    }

    var aboutMeToggled = false;
    function aboutMeToggle() {
        var sel = $("#about-me"),
            up = (aboutMeToggled = !aboutMeToggled) ? 2 : 3,
            down = (up === 2) ? 3 : 2;
        sel.children(":nth-child(" + up + ")").slideUp("slow");
        sel.children(":nth-child(" + down + ")").slideDown("slow");
        sel.children("button").text(aboutMeToggled ? "Collapse" : "Expand");
    }

    const TYPE = {
        WEBSITE: "app-web",
        DESKTOP: "app-desktop",
        ANDROID: "app-android"
    };

    const PROJECT = {
        Memelicious: {
            name: "Memelicious",
            type: TYPE.WEBSITE,
            imgsrc: "memelicious.png",
            description: "A website used for uploading and sharing images. (Mostly internet memes)"
        }, BrendonCurmi: {
            name: "This Website",
            type: TYPE.WEBSITE,
            imgsrc: "portfolio.png",
            description: "My personal online portfolio."
        }, SeinfeldButton: {
            name: "SeinfeldButton",
            type: TYPE.ANDROID,
            imgsrc: "seinfeldbutton.png",
            description: "A simple android app that plays the Seinfeld sitcom theme song, during those awkward moments."
        }, JEFFIFY: {
            name: "JEFFIFY",
            type: TYPE.DESKTOP,
            imgsrc: "jeffify.png",
            description: "Scrolls through almost all the directories on the computer, and creates 100-1000 copies of a particular image."
        }, MyNameJeffGane: {
            name: "My Name Is Jeff: The Game",
            type: TYPE.DESKTOP,
            imgsrc: "mynamejeffgame.png",
            description: "A desktop app to joke with friends."
        }, AIEngine: {
            name: "AI Engine",
            type: TYPE.DESKTOP,
            imgsrc: "aiengine.png",
            description: "A natural language processing and generation program, in development."
        }, Cortex: {
            name: "Cortex AUI",
            type: TYPE.ANDROID,
            imgsrc: "cortexaui.png",
            description: "A phone interface that would run the AI Engine."
        }, fxMatrix: {
            name: "fxMatrix",
            type: TYPE.DESKTOP,
            imgsrc: "fxmatrix.png",
            description: "Development of a game engine and a program that implements it."
        }, MemeMachine: {
            name: "MemeMachine",
            type: TYPE.DESKTOP,
            imgsrc: "mememachine.png",
            description: "Makes it easier to save, index, and send pictures and videos. (Mostly internet memes)"
        }
    };

//    <figure class="box app-web">
//        <img src="img/pic.jpg" alt=""/>
//        <figcaption>
//        <h1>My hover Overlay</h1>
//    <a href="#" class="button">Learn More</a>
//    </figcaption>
//    </figure>
    function generateProject(vars) {
        return "<figure class='box " + vars.type + "' style=''>" +
            "<img src='img/" + vars.imgsrc + "' alt='" + vars.name + " Image'/>" +
            "<figcaption>" + vars.name +
            "<div></div>" +
            "<div class='hidden'>" +
            "<p>" + vars.description + "</p>" +
//            "<br/>" +
            "<div class='center'>" +
            "<img src='img/" + vars.imgsrc + "'/></div>" +
            "</div>" +
            "</figcaption>" +
            "</figure>";
    }

    function isIE() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        return msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./);
    }

    $(document).ready(function() {
        // Hide #what-i-do if using IE
        if (isIE()) {
            $("#what-i-do").parent().hide();
        }

        // Add projects
        var sel = $("#projects-view");
        for (var key in PROJECT)
            if (PROJECT.hasOwnProperty(key))
                sel.append(generateProject(PROJECT[key]));

        sel.children("figure").on("click", function() {
            bootbox.alert({
                message: $(this).find("div.hidden").html(),
                size: "large",
                backdrop: true
            });
        });
    });
</script>
</body>
</html>
