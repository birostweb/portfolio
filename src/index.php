<!doctype html>
<html lang="fr">
<head>
    <title>Portfolio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/x-icon" href="img/logo.png"
          class="h-12 w-20 invert sepia saturate-200 hue-rotate-[300deg]"
    >
</head>
<body class="bg-[#231f20] text-[#E5E2D6] min-h-screen">

<header id="header" class="max-w-7xl mx-auto mt-6 px-6 py-4 flex items-center justify-between relative">
    <!-- Logo -->
    <div  class="px-4 py-2">
        <a href="#accueil" class="flex items-center gap-3">
            <img src="img/logo.png" alt="Logo Théo Birost"
                 class="h-12 w-20 invert sepia saturate-200 hue-rotate-[300deg]">
        </a>
    </div>

    <!-- Navigation (PC) -->
    <nav class="hidden md:flex space-x-10">
        <a href="#accueil" class="relative text-lg font-semibold tracking-wide uppercase group">
            Accueil
            <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </a>
        <a href="#projets" class="relative text-lg font-semibold tracking-wide uppercase group">
            Projets
            <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </a>
        <a href="#competences" class="relative text-lg font-semibold tracking-wide uppercase group">
            Compétences
            <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </a>
        <a href="#contact" class="relative text-lg font-semibold tracking-wide uppercase group">
            Contact
            <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </a>
    </nav>

    <!-- Icônes (PC) -->
    <div class="hidden md:flex space-x-6">
        <a href="https://www.linkedin.com/in/theobirost/" target="_blank" class="transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                <rect width="4" height="12" x="2" y="9"/>
                <circle cx="4" cy="4" r="2"/>
            </svg>
        </a>
        <a href="https://github.com/theobirost" target="_blank" class="transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                <path d="M9 18c-4.51 2-5-2-7-2"/>
            </svg>
        </a>
    </div>

    <!-- Hamburger (Mobile) -->
    <button id="menu-btn" class="md:hidden flex flex-col space-y-1.5 focus:outline-none">
        <span class="w-6 h-0.5 bg-[#E5E2D6]"></span>
        <span class="w-6 h-0.5 bg-[#E5E2D6]"></span>
        <span class="w-6 h-0.5 bg-[#E5E2D6]"></span>
    </button>

    <!-- Menu Mobile (caché par défaut) -->
    <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-[#231f20] text-[#E5E2D6] flex flex-col space-y-4 py-6 px-6 md:hidden border-[#E5E2D6] border-b-2">
        <a href="#accueil" class="text-lg font-semibold uppercase">Accueil</a>
        <a href="#projets" class="text-lg font-semibold uppercase">Projets</a>
        <a href="#competences" class="text-lg font-semibold uppercase">Compétences</a>
        <a href="#contact" class="text-lg font-semibold uppercase">Contact</a>
        <div class="flex space-x-6 mt-4">
            <a href="https://www.linkedin.com/in/theobirost/" target="_blank" class="transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                    <rect width="4" height="12" x="2" y="9"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
            </a>
            <a href="https://github.com/theobirost" target="_blank" class="transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                    <path d="M9 18c-4.51 2-5-2-7-2"/>
                </svg>
            </a>
        </div>
    </div>
</header>
<main class="max-w-7xl mx-auto p-6 text-center border-2 border-[#E5E2D6] rounded-lg">
    <section id="accueil" class="h-[550px] flex flex-col items-center justify-center text-center text-[#E5E2D6] px-4">
        <h1 class="text-6xl md:text-7xl font-extrabold uppercase mb-6 tracking-wide">THÉO BIROST</h1>

        <p class="text-lg sm:text-xl text-[#E5E2D6] max-w-2xl mb-8 text-justify leading-[30px]">

            Je suis un <span class="font-semibold ">Développeur Front-End Junior</span> passionné par le domaine du développement web. Actuellement en études dans le domaine de l'informatique en MMI (Métiers du Multimédia et de l'Internet).
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="#projets"
               class="px-8 py-3 uppercase rounded-lg border border-[#E5E2D6] hover:text-[#E5E2D6] bg-[#E5E2D6] text-[#231f20] hover:bg-[#231f20]  font-medium  duration-300">
                mes projets
            </a>

            <a href="#contact"
               class="px-8 py-3 uppercase border border-[#E5E2D6] hover:bg-[#E5E2D6] rounded-lg hover:text-[#231f20] text-[#E5E2D6] font-medium transition duration-300">
                Me contacter
            </a>
        </div>
    </section>

</main>
<section id="projets" class="max-w-7xl mx-auto mt-16 p-6 border-2 border-[#E5E2D6] rounded-lg text-[#E5E2D6]">
    <h1 class="tracking-wide flex justify-center text-6xl md:text-6xl font-extrabold uppercase mb-10"> Projets </h1>
    <div class="flex flex-col gap-8">
        <details class="px-4 group rounded-lg transition">
            <summary class="mb-4 flex items-center justify-between cursor-pointer p-4 text-xl font-semibold tracking-wide hover:bg-[#D1CCB6]/20 transition rounded-md">

                    <span class="tracking-wide uppercase flex flex-row items-center">
                        Projet 1
                        <span class="hidden md:flex ml-8 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  PROJET PERSO</span>
                         <span class="hidden md:flex ml-2 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  SOLO </span>
                    </span>
                <svg class="w-4 h-4 text-[#E5E2D6] transition-transform duration-300 group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>

            </summary>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Partie gauche : image -->
                <div class="md:col-span-2 md:pr-6 md:border-r-2 border-[#E5E2D6]">
                    <img class="rounded-lg w-full h-full object-cover" src="img/pro1.png" alt="aperçu projet">
                </div>

                <!-- Partie droite : texte et badges -->
                <div class="md:col-span-2 flex flex-col mt-6 md:mt-0">
                    <!-- Titre -->
                    <h1 class="text-2xl font-bold mb-4 uppercase">Jeu du clicker</h1>

                    <!-- Paragraphe -->
                    <div class="text-justify leading-relaxed">
                        <p>
                            Un jeu de clic addictif où chaque clic compte ! Le but est simple : cliquer pour gagner
                            un maximum de points et débloquer des améliorations qui augmentent ta puissance de clic.
                            Progresse petit à petit, collectionne des trophées pour tes exploits, et grimpe dans le
                            classement (leaderboard) face aux autres joueurs.
                        </p>
                    </div>

                    <!-- Badges -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">HTML</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Tailwind</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">CSS</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Docker</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP storm</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">GitHub</span>
                    </div>
                    <!-- Bouton -->
                    <div>
                        <button class="flex items-center gap-2 uppercase mt-12 px-6 py-2 rounded-md text-[#231f20] bg-[#E5E2D6] text-lg font-bold hover:bg-[#d3d0c1] transition">
                            <a href="http://mmi23f02.mmi-troyes.fr/clicker/" target="_blank">voir</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-right-icon lucide-chevrons-right"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </details>


        <details class="px-4 group rounded-lg transition">
            <summary class="mb-4 flex items-center justify-between cursor-pointer p-4 text-xl font-semibold tracking-wide hover:bg-[#D1CCB6]/20 transition rounded-md">
    <span class="tracking-wide uppercase flex flex-row items-center">
        Projet 2
        <span class="hidden md:flex ml-8 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  PROJET PERSO</span>
        <span class="hidden md:flex ml-2 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  SOLO </span>
    </span>

                <svg class="w-4 h-4 text-[#E5E2D6] transition-transform duration-300 group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </summary>


            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Partie gauche : image -->
                <div class="md:col-span-2 md:pr-6 md:border-r-2 border-[#E5E2D6]">
                    <img class="rounded-lg w-full h-full object-cover" src="img/pro2.png" alt="aperçu projet">
                </div>

                <!-- Partie droite : texte et badges -->
                <div class="md:col-span-2 flex flex-col mt-6 md:mt-0">
                    <!-- Titre -->
                    <h1 class="text-2xl font-bold mb-4 uppercase">Lanceur de dés</h1>

                    <!-- Paragraphe -->
                    <div class="text-justify leading-relaxed">
                        <p>
                            J’ai développé un site web qui simule le lancer de dés de manière simple et ludique.
                            L’utilisateur peut lancer un ou plusieurs dés, et le résultat s’affiche instantanément
                            avec une petite animation pour rendre l’expérience plus vivante. Ce projet m’a permis de m’exercer
                            sur la génération de nombres aléatoires, la manipulation du DOM en JavaScript et la création
                            d’animations légères en CSS. C’était un projet sympa à coder, parfait pour allier logique et créativité.

                        </p>
                    </div>

                    <!-- Badges -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">HTML </span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Tailwind </span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JavaScript</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP storm</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">GitHub</span>
                       </div>

                    <!-- Bouton -->
                    <div>
                        <button  class="flex items-center gap-2 uppercase mt-12 px-6 py-2 rounded-md text-[#231f20] bg-[#E5E2D6] text-lg font-bold hover:bg-[#d3d0c1] transition">
                            <a href="http://mmi23f02.mmi-troyes.fr/dice/" target="_blank">voir</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-right-icon lucide-chevrons-right"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </details>

        <details class="px-4 group rounded-lg transition">
            <summary class="mb-4 flex items-center justify-between cursor-pointer p-4 text-xl font-semibold tracking-wide hover:bg-[#D1CCB6]/20 transition rounded-md">
    <span class="tracking-wide uppercase flex flex-row items-center">
        Projet 3
        <span class="hidden md:flex ml-8 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  PROJET PERSO</span>
        <span class="hidden md:flex ml-2 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  SOLO </span>
    </span>

                <svg class="w-4 h-4 text-[#E5E2D6] transition-transform duration-300 group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </summary>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Partie gauche : image -->
                <div class="md:col-span-2 md:pr-6 md:border-r-2 border-[#E5E2D6]">
                    <img class="rounded-lg w-full h-full object-cover" src="img/pro3.png" alt="aperçu projet">
                </div>

                <!-- Partie droite : texte et badges -->
                <div class="md:col-span-2 flex flex-col mt-6 md:mt-0">
                    <!-- Titre -->
                    <h1 class="text-2xl font-bold mb-4 uppercase">Portfolio template</h1>

                    <!-- Paragraphe -->
                    <div class="text-justify leading-relaxed">
                        <p>
                            Template de portfolio moderne développé avec Tailwind CSS et du PHP.
                            Il est conçu pour présenter vos projets et compétences de manière claire et esthétique.
                            La version actuelle inclut une traduction en français et anglais, avec un design
                            non adaptable à tous les écrans.
                        </p>
                    </div>

                    <!-- Badges -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Tailwind CSS</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">HTML</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JavaScript</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP storm</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Docker</span>
                    </div>

                    <!-- Bouton -->
                    <div>
                        <button class="flex items-center gap-2 uppercase mt-12 px-6 py-2 rounded-md text-[#231f20] bg-[#E5E2D6] text-lg font-bold hover:bg-[#d3d0c1] transition">
                            <a href="http://mmi23f02.mmi-troyes.fr/portfolio-v3/" target="_blank">voir</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-right-icon lucide-chevrons-right"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </details>

        <details class="px-4 group rounded-lg transition">
            <summary class="mb-4 flex items-center justify-between cursor-pointer p-4 text-xl font-semibold tracking-wide hover:bg-[#D1CCB6]/20 transition rounded-md">
    <span class="tracking-wide uppercase flex flex-row items-center">
        Projet 4
        <span class="hidden md:flex ml-8 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  PROJET UNIV</span>
         <span class="hidden md:flex ml-2 px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">  DUO </span>
    </span>

                <svg class="w-4 h-4 text-[#E5E2D6] transition-transform duration-300 group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </summary>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Partie gauche : image -->
                <div class="md:col-span-2 md:pr-6 md:border-r-2 border-[#E5E2D6]">
                    <img class="rounded-lg w-full h-full object-cover" src="img/pro4.png" alt="aperçu projet">
                </div>

                <!-- Partie droite : texte et badges -->
                <div class="md:col-span-2 flex flex-col mt-6 md:mt-0">
                    <!-- Titre -->
                    <h1 class="text-2xl font-bold mb-4">Site sur les infrastructures vélo en France</h1>

                    <!-- Paragraphe -->
                    <div class="text-justify leading-relaxed">
                        <p>
                            Ce projet universitaire réalisé en duo consiste à créer un site web interactif présentant les infrastructures cyclables en France.
                            L’objectif était de centraliser et visualiser des données sur les pistes cyclables, les véloroutes et les aménagements urbains pour encourager la mobilité douce.
                            Nous avons travaillé sur le design de l’interface, l’ergonomie et l’accessibilité, tout en mettant l’accent sur une expérience utilisateur claire et intuitive.
                            Le site permet de filtrer, comparer et explorer les différentes infrastructures disponibles dans chaque région.
                        </p>
                    </div>

                    <!-- Badges -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">HTML</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">CSS</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JavaScript</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Docker</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">VS Code</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JSON</span>
                        <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Figma</span>
                    </div>

                    <!-- Bouton -->
                    <div>
                        <button class="flex items-center gap-2 uppercase mt-12 px-6 py-2 rounded-md text-[#231f20] bg-[#E5E2D6] text-lg font-bold hover:bg-[#d3d0c1] transition">
                            <a href="http://mmi23f02.mmi-troyes.fr/sae303/" target="_blank">voir</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-right-icon lucide-chevrons-right"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </details>

    </div>

</section>
<section id="competences" class="max-w-7xl mx-auto mt-16 p-6 border-2 border-[#E5E2D6] rounded-lg text-[#E5E2D6]">
    <h1 class="tracking-wide flex justify-center text-4xl md:text-6xl font-extrabold uppercase mb-10">
        Compétences
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-6">
        <!-- Front-End -->
        <div class="col-span-1 md:col-span-2 border-2 border-[#E5E2D6] rounded-lg p-4">
            <h2 class="uppercase font-bold">Front-End</h2>
            <hr class="w-1/4 border-2 mt-2">
            <div class="flex flex-wrap gap-3 mt-4">
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">HTML</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">CSS</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">SCSS</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JavaScript</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Vue.js</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Bootstrap</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Tailwind</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">SEO</span>
            </div>
        </div>

        <!-- Outils -->
        <div class="col-span-1 md:col-span-2 md:col-start-3 border-2 border-[#E5E2D6] rounded-lg p-4">
            <h2 class="uppercase font-bold">Outils</h2>
            <hr class="w-1/4 border-2 mt-2">
            <div class="flex flex-wrap gap-3 mt-4">
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Docker</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">VS Code</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP storm</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Webstorm</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">GitHub</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">GitHub Actions</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Blender</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Unity</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Wordpress</span>
            </div>
        </div>

        <!-- UI/UX & Design -->
        <div class="col-span-1 md:row-start-2 md:col-start-4 border-2 border-[#E5E2D6] rounded-lg p-4">
            <h2 class="uppercase font-bold">UI/UX & Design</h2>
            <hr class="w-1/4 border-2 mt-2">
            <div class="flex flex-wrap gap-3 mt-4">
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Figma</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Canva</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Illustrator</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Photoshop</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Dimension</span>
            </div>
        </div>

        <!-- IA -->
        <div class="col-span-1 md:row-start-2 border-2 border-[#E5E2D6] rounded-lg p-4">
            <h2 class="uppercase font-bold">IA</h2>
            <hr class="w-1/4 border-2 mt-2">
            <div class="flex flex-wrap gap-3 mt-4">
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Claude</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">ChatGPT</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Gemini</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Perplexity</span>
            </div>
        </div>

        <!-- Back-End -->
        <div class="col-span-1 md:col-span-2 md:row-start-2 border-2 border-[#E5E2D6] rounded-lg p-4">
            <h2 class="uppercase font-bold">Back-End</h2>
            <hr class="w-1/4 border-2 mt-2">
            <div class="flex flex-wrap gap-3 mt-4">
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">PHP</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Symfony</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">Node.js</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">MySQL</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">MongoDB</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">GraphQL</span>
                <span class="px-3 py-1 rounded-md text-[#231f20] bg-[#E5E2D6] hover:bg-[#d3d0c1] text-sm font-medium">JSON</span>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="mb-24 max-w-7xl mx-auto mt-16 p-6 border-2 border-[#E5E2D6] rounded-lg text-[#E5E2D6]">
    <h1 class="tracking-wide flex justify-center text-6xl md:text-6xl font-extrabold uppercase mb-10">
        Contact
    </h1>
    <div id="message-container" class="flex flex-col items-center mb-6 gap-4">
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="  relative w-full max-w-xl border-2  rounded-lg p-4 flex items-center gap-3">
                <img src="img/Circle Check Icon.svg" alt="success" class="w-6 h-6">
                <span>Merci pour votre message. Je vous répondrai au plus vite.</span>
            </div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
            <div class="  relative w-full max-w-xl border-2  rounded-lg p-4 flex items-center gap-3">
                <img src="img/Circle X.svg" alt="error" class="w-6 h-6">
                <span>
                    <?= isset($_GET['message']) ? htmlspecialchars(urldecode($_GET['message'])) : "Une erreur s'est produite, veuillez réessayer." ?>
                </span>
            </div>
        <?php endif; ?>
    </div>



    <form action="send_mail.php" method="POST" class="max-w-2xl mx-auto flex flex-col gap-6">
        <!-- Nom & Prénom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col text-left">
                <label for="lastname" class="mb-2 font-semibold uppercase tracking-wide">Nom</label>
                <input type="text" id="lastname" name="lastname" required placeholder="Nom"
                       class="px-4 py-2 bg-transparent border-2 border-[#E5E2D6] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D1CCB6] placeholder-[#aaa]">
            </div>
            <div class="flex flex-col text-left">
                <label for="firstname" class="mb-2 font-semibold uppercase tracking-wide">Prénom</label>
                <input type="text" id="firstname" name="firstname" required placeholder="Prénom"
                       class="px-4 py-2 bg-transparent border-2 border-[#E5E2D6] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D1CCB6] placeholder-[#aaa]">
            </div>
        </div>

        <!-- Email -->
        <div class="flex flex-col text-left">
            <label for="email" class="mb-2 font-semibold uppercase tracking-wide ">Email</label>
            <input type="email" id="email" name="email" required placeholder="Exemple@gmail.com"
                   class="px-4 py-2 bg-transparent border-2 border-[#E5E2D6] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D1CCB6] placeholder-[#aaa]">
        </div>

        <!-- Message -->
        <div class="flex flex-col text-left">
            <label for="message" class="mb-2 font-semibold uppercase tracking-wide">Message</label>
            <textarea id="message" name="message" rows="6"  required placeholder="Votre Message"
                      class=" min-h-44 max-h-44 px-4 py-2 bg-transparent border-2 border-[#E5E2D6] rounded-md focus:outline-none focus:ring-2 focus:ring-[#D1CCB6] placeholder-[#aaa]"></textarea>
        </div>

        <!-- Bouton -->
        <div class="flex justify-center">
            <button type="submit"
                    class="uppercase mt-6 px-8 py-3 rounded-md text-[#231f20] bg-[#E5E2D6] text-lg font-bold hover:bg-[#d3d0c1] transition flex items-center gap-2">
                Envoyer
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#231f20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-icon lucide-send"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/><path d="m21.854 2.147-10.94 10.939"/></svg>
            </button>
        </div>
    </form>
</section>
<footer class="border-t-2 border-[#E5E2D6] mt-16 py-10">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-8">
        <!-- Logo -->
        <div>
            <a href="#header" class="flex items-center gap-3">
                <img src="img/logo.png" alt="Logo Théo Birost"
                     class="h-10 w-16 invert sepia saturate-200 hue-rotate-[300deg]">
            </a>
        </div>
        <nav class="flex flex-wrap justify-center gap-3">
            <a href="#accueil" class="relative text-sm md:text-base font-semibold uppercase group">
                Accueil
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
            </a>
            <a href="#projets" class="relative text-sm md:text-base font-semibold uppercase group">
                Projets
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
            </a>
            <a href="#competences" class="relative text-sm md:text-base font-semibold uppercase group">
                Compétences
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
            </a>
            <a href="#contact" class="relative text-sm md:text-base font-semibold uppercase group">
                Contact
                <span class="absolute left-1/2 -bottom-1 w-0 h-0.5 bg-[#E5E2D6] transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
            </a>
        </nav>

        <!-- Réseaux sociaux -->
        <div class="flex space-x-6">
            <a href="https://www.linkedin.com/in/theobirost/" target="_blank" class="hover:text-[#D1CCB6] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2
                             2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                    <rect width="4" height="12" x="2" y="9"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
            </a>
            <a href="https://github.com/theobirost" target="_blank" class="hover:text-[#D1CCB6] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0
                             6-2 6-5.5.08-1.25-.27-2.48-1-3.5
                             .28-1.15.28-2.35 0-3.5
                             0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2
                             5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403
                             5.403 0 0 0 4 9c0 3.5 3 5.5
                             6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22
                             1.23-.15 1.85v4"/>
                    <path d="M9 18c-4.51 2-5-2-7-2"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Bas de page -->
    <div class="mt-10 text-center text-sm text-[#aaa] tracking-wide">
        &copy; 2026 Théo Birost - Tous droits réservés.
    </div>
</footer>



<script src="script.js"></script>

</body>
</html>
