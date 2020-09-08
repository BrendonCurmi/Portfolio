const TYPE = {
    WEBSITE: "app-web",
    DESKTOP: "app-desktop",
    ANDROID: "app-android",
    MINECRAFT: "app-minecraft"
};

const PROJECT = {
    ProtocolBuffer: {
        name: "ProtocolBuffer",
        type: TYPE.DESKTOP,
        imgsrc: "aiengine.png",
        description: "A buffer to allow the execution of Linux commands on the VirtualBox Linux VM, from a Windows terminal.",
        tech: "Java, Batch, Bash"
    },
    XSearch: {
        name: "XSearch",
        type: TYPE.DESKTOP,
        imgsrc: "aiengine.png",
        description: "Its crawling and indexing allows quick search of text from services (such as local files, Gmail, etc).",
        tech: "Java, JavaFX, CSS, SQLite3, FxCore"
    },
    AIEngine: {
        name: "AI Engine",
        type: TYPE.DESKTOP,
        imgsrc: "aiengine.png",
        description: "A natural language processing and generation program, in development.",
        tech: "Java"
    },
    DogeTransaction: {
        name: "DogeTransaction",
        type: TYPE.WEBSITE,
        imgsrc: ["doge-transaction-1.png", "doge-transaction-2.png", "doge-transaction-3.png"],
        description: "A Chrome Extension for generating transaction messages for the DogeCoin cryptocurrency.",
        tech: "Chrome Extension, JS, HTML, CSS"
    },
    LogCrawler: {
        name: "LogCrawler",
        type: TYPE.DESKTOP,
        imgsrc: "logcrawler.png",
        description: "Searches through the file/folder hierarchy to detect error messages (or any specified string query).",
        tech: "Java, JavaFX, SQLite"
    },
    Robot: {
        name: "Robot",
        type: TYPE.DESKTOP,
        imgsrc: "robot.png",
        description: "A robot which is able to emulate human user interaction on a computer and record and playback human inputs.",
        tech: "Java, JavaFX, CSS"
    },
    MemeMachine: {
        name: "MemeMachine",
        type: TYPE.DESKTOP,
        imgsrc: "mememachine.png",
        description: "Makes it easier to save, index, and send pictures and videos. (Designed for internet memes)",
        tech: "Java, JavaFX, SQLite3, LESS, CSS"
    },
    FxCore: {
        name: "FxCore",
        type: TYPE.DESKTOP,
        imgsrc: "fxcore.png",
        description: "A core API I developed with frameworks for common utilities I use in my projects (like commands, databases, caching, etc).",
        tech: "Java, SQLite3"
    },
    Memelicious: {
        name: "Memelicious",
        type: TYPE.WEBSITE,
        imgsrc: "memelicious.png",
        description: "A website used for uploading and sharing images. (Designed for internet memes)",
        tech: "Python, JS, HTML, CSS, Flask, SQLite3"
    },
    DBExtractor: {
        name: "DBExtractor",
        type: TYPE.DESKTOP,
        imgsrc: "dbextractor.png",
        description: "Extracts an SQLite database into a csv file.",
        tech: "Java, SQLite3"
    },
    Portfolio: {
        name: "This Website",
        type: TYPE.WEBSITE,
        imgsrc: "portfolio.png",
        description: "My personal online portfolio.",
        tech: "PHP, JS, HTML, CSS"
    },
    SeinfeldButton: {
        name: "SeinfeldButton",
        type: TYPE.ANDROID,
        imgsrc: "seinfeldbutton.png",
        description: "A simple android app that plays the Seinfeld sitcom theme song, during those awkward moments.",
        tech: "Java, Android"
    },
    Cortex: {
        name: "Cortex AUI",
        type: TYPE.ANDROID,
        imgsrc: "cortexaui.png",
        description: "A phone interface that would run the AI Engine.",
        tech: "Java, Android"
    },
    fxMatrix: {
        name: "fxMatrix",
        type: TYPE.DESKTOP,
        imgsrc: "fxmatrix.png",
        description: "Development of a game engine and a program that implements it.",
        tech: "Java, LWJGL"
    },
    FusionMC: {
        name: "FusionMC",
        type: TYPE.MINECRAFT,
        imgsrc: ["fusionmc1.png", "fusionmc2.png", "fusionmc3.png"],
        description: "A social interactive and minigame Minecraft server.",
        tech: "Java, Minecraft, Spigot/Bukkit"
    },
    Legacy: {
        name: "Legacy Plugin",
        type: TYPE.MINECRAFT,
        imgsrc: "legacy.png",
        description: "A general-purpose Spigot plugin that covers many  layers of the APIs. Designed for use on the devs' personal server.",
        tech: "Java, Minecraft, Spigot/Bukkit"
    },
    FxGame: {
        name: "FxGame Plugin",
        type: TYPE.MINECRAFT,
        imgsrc: "fxgame.png",
        description: "A backbone framework to facilitate the making and implementation of general game plugin mechanics. Designed for use on the devs' personal server.",
        tech: "Java, Minecraft, Spigot/Bukkit"
    },
};

$(function() {
    // Add projects
    let sel = $("#projects-view");
    for (let key in PROJECT)
        if (PROJECT.hasOwnProperty(key))
            sel.append(generateProject(PROJECT[key]));

    sel.children("figure").on("click", function() {
        let project = $(this).find("p.name").html();
        bootbox.alert({
            message: getCardForProject(getProjectByName(project)),
            size: "large",
            backdrop: true
        });
    });
});

/**
 * Creates the box card for the specified project.
 * @param vars the project object.
 * @returns {string} the HTML of the card.
 */
function generateProject(vars) {
    if (vars.imgsrc.constructor === Array) vars.imgsrc = vars.imgsrc[0];
    return `
    <figure class="box ${vars.type}">
        <img src="img/${vars.imgsrc}" alt="${vars.name} Image"/>
        <figcaption>
            <p class="name">${vars.name}</p>
            <p class="tech">${vars.tech}</p>
            <span></span>
        </figcaption>
    </figure>
    `;
}

/**
 * Creates the popup box for the specified project.
 * @param vars the project object.
 * @returns {string} the HTML of the popup box.
 */
function getCardForProject(vars) {
    let imgs = "";
    if (vars.imgsrc.constructor === Array) for (let i = 0; i < vars.imgsrc.length; i++) imgs += "<img src='img/" + vars.imgsrc[i] + "'/><br/>";
    else imgs = "<img src='img/" + vars.imgsrc + "'/>";
    return `
    <div>
        <p>${vars.name}</p>
        <p>${vars.description}</p>
        <p>Technologies: ${vars.tech}</p>
        <div class="center">
            ${imgs}
        </div>
    </div>
    `;
}

/**
 * Gets the project from the specified name.
 * @param name the name of the project.
 * @returns {object|null} the project object;
 * or null if the project with the specified name isn't found.
 */
function getProjectByName(name) {
    for (let key in PROJECT)
        if (PROJECT.hasOwnProperty(key))
            if (PROJECT[key].name === name)
                return PROJECT[key];
    return null
}

let projectsViewToggled = false, viewing = "undefined";
function projectsViewToggle(type) {
    let sel = $("#projects-view");

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

    let child = sel.children("figure"), delay = 0;
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
