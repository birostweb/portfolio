<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Théo Birost — Développeur web full-stack · Portfolio</title>
<meta name="description" content="Portfolio de Théo Birost, développeur web full-stack à Troyes (BUT MMI). Projets réels en Vue, JavaScript, PHP et WordPress — du design au déploiement. Disponible en CDI et freelance.">
<meta property="og:title" content="Théo Birost — Développeur web full-stack">
<meta property="og:description" content="Portfolio — projets web réels, du design au déploiement. Disponible CDI & freelance.">
<meta property="og:type" content="website">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans+Condensed:wght@600;700&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
/*
  VARIABLES CSS (Custom Properties)
  C'est ici que sont définies toutes les couleurs, polices et dimensions
  utilisées dans le site. Changer une valeur ici la changera partout.
*/
:root{
  --paper:#E5E2D6; --surface:#FBFAF6; --ink:#231F20; --accent:#F0451E; --accent-d:#CE3711;
  --gray:#6E6A5F; --line:#CFCABC; --line-2:#E9E5DB;
  --d-bg:#231F20; --d-text:#F0EDE4; --d-dim:#AEA99C; --d-line:#3A3532;
  --fd:'IBM Plex Sans Condensed',system-ui,sans-serif; --fb:'IBM Plex Sans',system-ui,sans-serif; --fm:'IBM Plex Mono',ui-monospace,monospace;
  --max:1160px; --r:10px;
}
/*
  STYLES DE BASE
  Réinitialisation et styles généraux pour le body, les liens, etc.
*/
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{background:var(--paper);color:var(--ink);font-family:var(--fb);font-size:17px;line-height:1.6;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{color:inherit;text-decoration:none}
img{max-width:100%;display:block}
::selection{background:var(--accent);color:#fff}
:focus-visible{outline:2px solid var(--accent);outline-offset:3px}
/*
  CLASSES UTILITAIRES
  Petites classes réutilisables pour les mises en page et éléments communs.
*/
.wrap{width:100%;max-width:var(--max);margin:0 auto;padding:0 24px}
.section{padding:clamp(64px,9vw,120px) 0}
.section--dark{background:var(--d-bg);color:var(--d-text)}
.eyebrow{font-family:var(--fm);font-weight:500;font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--accent);display:inline-flex;align-items:center;gap:11px}
.eyebrow::before{content:"";width:22px;height:2px;background:var(--accent)}
.h2{font-family:var(--fd);font-weight:700;line-height:1.02;font-size:clamp(30px,4.6vw,50px);letter-spacing:-.01em}
.lead{font-size:clamp(16.5px,1.7vw,19px);color:var(--gray);max-width:56ch;margin-top:14px}
.section--dark .lead{color:var(--d-dim)}
.sec-head{margin-bottom:clamp(34px,5vw,54px)}
.sec-head .eyebrow{margin-bottom:16px}
.accent{color:var(--accent)}
/*
  BOUTONS
  Styles pour les différents types de boutons.
*/
.btn{font-family:var(--fm);font-weight:500;font-size:13.5px;letter-spacing:.03em;padding:15px 26px;border-radius:var(--r);display:inline-flex;align-items:center;gap:9px;cursor:pointer;border:1.5px solid transparent;transition:.18s ease;white-space:nowrap}
.btn svg{width:15px;height:15px}
.btn-accent{background:var(--accent);color:#fff}.btn-accent:hover{background:var(--accent-d)}
.btn-ghost{background:transparent;color:var(--ink);border-color:var(--ink)}.btn-ghost:hover{background:var(--ink);color:var(--paper)}
.section--dark .btn-ghost{color:var(--d-text);border-color:var(--d-line)}.section--dark .btn-ghost:hover{background:var(--d-text);color:var(--ink);border-color:var(--d-text)}
.btn-lg{padding:18px 32px;font-size:14.5px}
.tlink{font-family:var(--fm);font-size:13px;color:var(--gray);display:inline-flex;align-items:center;gap:7px}
.tlink:hover{color:var(--accent)}
.tlink svg{width:14px;height:14px}
/*
  NAVIGATION
  Barre de navigation principale.
*/
.nav{position:sticky;top:0;z-index:60;background:rgba(229,226,214,.9);backdrop-filter:blur(8px);border-bottom:1px solid var(--line)}
.nav__in{display:flex;align-items:center;justify-content:space-between;height:66px}
.brand{font-family:var(--fd);font-weight:700;font-size:20px;display:flex;align-items:center;gap:9px}
.brand b{width:9px;height:9px;background:var(--accent);border-radius:50%;display:inline-block}
.nav__links{display:flex;align-items:center;gap:28px}
.nav__links a:not(.btn){font-family:var(--fm);font-size:13px;color:var(--gray);transition:.15s}.nav__links a:not(.btn):hover{color:var(--ink)}
.nav__toggle{display:none;background:none;border:1.5px solid var(--ink);border-radius:8px;width:44px;height:40px;cursor:pointer;flex-direction:column;gap:5px;align-items:center;justify-content:center}
.nav__toggle span{width:18px;height:1.5px;background:var(--ink)}
/*
  SECTION HERO
  La première section visible de la page avec le titre principal.
*/
.hero{padding:clamp(44px,6vw,80px) 0 clamp(56px,7vw,90px)}
.hero__grid{display:grid;grid-template-columns:1.35fr .95fr;gap:clamp(32px,5vw,64px);align-items:center}
.chip{display:inline-flex;align-items:center;gap:9px;font-family:var(--fm);font-size:12px;letter-spacing:.04em;color:var(--ink);background:var(--surface);border:1px solid var(--line);border-radius:100px;padding:8px 15px}
.chip b{width:8px;height:8px;border-radius:50%;background:var(--accent);display:inline-block}
.hero h1{font-family:var(--fd);font-weight:700;line-height:.96;font-size:clamp(46px,7vw,86px);letter-spacing:-.02em;margin:22px 0 20px}
.hero__sub{font-size:clamp(17px,1.9vw,20px);color:var(--gray);max-width:48ch}
.hero__cta{display:flex;flex-wrap:wrap;align-items:center;gap:14px;margin-top:32px}
.portrait{position:relative;aspect-ratio:4/5;border-radius:var(--r);background:var(--surface);border:1px solid var(--line);display:flex;align-items:center;justify-content:center;overflow:hidden}
.portrait img{width:100%;height:100%;object-fit:cover}
.portrait__mono{font-family:var(--fd);font-weight:700;font-size:clamp(88px,12vw,140px);color:var(--ink);line-height:1;letter-spacing:-.04em}
.portrait__badge{position:absolute;left:14px;bottom:14px;right:14px;display:flex;justify-content:space-between;align-items:center;background:var(--ink);color:var(--paper);border-radius:8px;padding:11px 14px;font-family:var(--fm);font-size:11.5px}
.portrait__badge .dot{color:var(--accent)}
/*
  BARRE DE FAITS (Facts Bar)
  La barre sombre avec les 4 points clés.
*/
.facts{background:var(--ink);color:var(--d-text)}
.facts__grid{display:grid;grid-template-columns:repeat(4,1fr)}
.fcell{padding:clamp(22px,2.6vw,32px) clamp(18px,2vw,28px);border-left:1px solid var(--d-line)}
.fcell:first-child{border-left:0;padding-left:0}
.fcell .n{font-family:var(--fm);font-size:12px;color:var(--accent);letter-spacing:.1em}
.fcell .t{font-family:var(--fd);font-weight:600;font-size:clamp(16px,1.6vw,19px);line-height:1.2;margin-top:10px}
/*
  SECTION PROJETS
  Mise en page pour la liste des projets.
*/
.projects{display:flex;flex-direction:column;gap:clamp(20px,3vw,32px)}
.project{display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(24px,4vw,52px);align-items:center}
.project:nth-child(even) .shot{order:2}
.shot{border:1px solid var(--line);border-radius:var(--r);overflow:hidden;background:var(--surface);box-shadow:0 1px 0 rgba(35,31,32,.04)}
.shot__bar{display:flex;align-items:center;gap:6px;padding:11px 14px;border-bottom:1px solid var(--line-2);background:#F1EEE7}
.shot__bar i{width:10px;height:10px;border-radius:50%;background:var(--line)}.shot__bar i:first-child{background:var(--accent)}
.shot__url{font-family:var(--fm);font-size:11px;color:var(--gray);margin-left:8px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.shot__img{aspect-ratio:16/10;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;background:repeating-linear-gradient(-45deg,#F3F1EA,#F3F1EA 12px,#EFECE3 12px,#EFECE3 24px)}
.shot__img img{width:100%;height:100%;object-fit:cover;object-position:top}
.shot__ph{font-family:var(--fd);font-weight:700;font-size:clamp(22px,3vw,30px);color:#C7C1B2}
.shot__phk{font-family:var(--fm);font-size:11px;letter-spacing:.14em;color:#C7C1B2;text-transform:uppercase}
.project__k{font-family:var(--fm);font-size:12px;letter-spacing:.1em;color:var(--accent);text-transform:uppercase}
.project h3{font-family:var(--fd);font-weight:700;font-size:clamp(24px,3vw,34px);line-height:1.03;margin:12px 0 6px}
.project__ctx{font-family:var(--fm);font-size:12.5px;color:var(--gray);text-transform:uppercase;letter-spacing:.02em}
.project p{margin:16px 0 14px;color:var(--ink);max-width:48ch}
.project__role{font-size:14.5px;color:var(--gray);margin-bottom:16px}.project__role b{color:var(--ink);font-family:var(--fm);font-size:11px;letter-spacing:.12em;text-transform:uppercase;margin-right:8px}
.project .tags{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:20px}
.tag{font-family:var(--fm);font-size:11.5px;color:var(--gray);border:1px solid var(--line);border-radius:6px;padding:5px 10px;white-space:nowrap}
.project__links{display:flex;flex-wrap:wrap;gap:12px 22px}
.plink{font-family:var(--fm);font-size:13px;color:var(--accent);display:inline-flex;align-items:center;gap:8px;font-weight:500}
.plink svg{width:14px;height:14px;transition:transform .2s}.plink:hover svg{transform:translate(2px,-2px)}
/*
  SECTION COMPÉTENCES (Skills)
  Liste des compétences et mini-projets.
*/
.skills{border-top:1px solid var(--line)}
.skillrow{display:grid;grid-template-columns:190px 1fr;gap:24px;padding:22px 0;border-bottom:1px solid var(--line);align-items:start}
.skillrow h3{font-family:var(--fd);font-weight:700;font-size:20px;display:flex;align-items:center;gap:10px}
.skillrow h3::before{content:"";width:11px;height:11px;background:var(--accent);border-radius:3px;flex:none}
.skilltags{display:flex;flex-wrap:wrap;gap:8px}
.subhead{font-family:var(--fm);font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--gray);margin:clamp(38px,5vw,56px) 0 22px;display:flex;align-items:center;gap:14px}
.subhead::after{content:"";flex:1;height:1px;background:var(--line)}
.mini-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}
.mini{background:var(--surface);border:1px solid var(--line);border-radius:var(--r);padding:clamp(22px,2.4vw,28px);display:flex;flex-direction:column;transition:border-color .2s}
.mini:hover{border-color:var(--ink)}
.mini__k{font-family:var(--fm);font-size:11px;letter-spacing:.12em;color:var(--accent);text-transform:uppercase}
.mini h3{font-family:var(--fd);font-weight:700;font-size:22px;line-height:1.05;margin:9px 0 8px}
.mini p{font-size:14.5px;color:var(--gray);line-height:1.5;margin-bottom:14px}
.mini .tags{margin-top:auto;margin-bottom:16px}
/*
  SECTION PARCOURS (Timeline)
  Mise en page de la frise chronologique.
*/
.tl{border-left:2px solid var(--line);margin-left:6px;display:flex;flex-direction:column;gap:clamp(28px,4vw,40px);padding-left:30px}
.tlitem{position:relative}
.tlitem::before{content:"";position:absolute;left:-37px;top:3px;width:13px;height:13px;border-radius:50%;background:var(--accent);border:3px solid var(--paper)}
.tldate{font-family:var(--fm);font-size:12px;letter-spacing:.06em;color:var(--accent);text-transform:uppercase}
.tlitem h3{font-family:var(--fd);font-weight:700;font-size:clamp(21px,2.3vw,26px);margin:8px 0 4px}
.tlrole{font-family:var(--fm);font-size:12.5px;color:var(--gray);margin-bottom:10px}
.tlitem p{color:var(--gray);font-size:15.5px;max-width:62ch}
.about{max-width:64ch;font-size:clamp(16.5px,1.7vw,19px);line-height:1.65;margin-bottom:clamp(38px,5vw,54px)}
.about b{color:var(--ink);font-weight:600}
/*
  SECTION CONTACT & FORMULAIRE
*/
.cta__grid{display:grid;grid-template-columns:1fr .9fr;gap:clamp(34px,6vw,72px);align-items:start}
.cta h2{font-size:clamp(32px,4.6vw,54px);margin-bottom:16px}
.manifest{margin-top:28px;border-top:1px solid var(--d-line)}
.mrow{display:grid;grid-template-columns:110px 1fr;gap:16px;padding:13px 0;border-bottom:1px solid var(--d-line);align-items:baseline}
.mrow .mk{font-family:var(--fm);font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:var(--accent)}
.mrow .mv{font-family:var(--fm);font-size:14.5px;color:var(--d-text);word-break:break-word}
.mrow .mv a:hover{color:var(--accent)}
.form{display:flex;flex-direction:column;gap:16px;background:rgba(255,255,255,.03);border:1px solid var(--d-line);border-radius:var(--r);padding:clamp(22px,3vw,30px)}
.field label{font-family:var(--fm);font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--d-dim);display:block;margin-bottom:8px}
.field input,.field textarea{width:100%;background:rgba(255,255,255,.04);border:1px solid var(--d-line);border-radius:8px;color:var(--d-text);font-family:var(--fb);font-size:16px;padding:12px 14px;transition:.2s}
.field input:focus,.field textarea:focus{outline:none;border-color:var(--accent)}
.field textarea{resize:vertical;min-height:110px}
/*
  FOOTER (Pied de page)
*/
.footer{background:var(--d-bg);color:var(--d-dim);padding:36px 0 30px;border-top:1px solid var(--d-line)}
.footer__in{display:flex;flex-wrap:wrap;gap:18px;justify-content:space-between;align-items:center}
.footer__b{font-family:var(--fd);font-weight:700;color:var(--d-text);font-size:16px}
.footer__l{display:flex;gap:20px;flex-wrap:wrap}
.footer__l a{font-family:var(--fm);font-size:12px;color:var(--d-dim)}.footer__l a:hover{color:var(--accent)}
.footer__meta{width:100%;margin-top:22px;padding-top:20px;border-top:1px solid var(--d-line);font-family:var(--fm);font-size:11.5px;color:var(--d-dim);display:flex;justify-content:space-between;flex-wrap:wrap;gap:10px}
/*
  ANIMATION D'APPARITION
  Utilisée par le script JS pour faire apparaître les éléments au défilement.
*/
.reveal{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}.reveal.in{opacity:1;transform:none}
/*
  MEDIA QUERIES (Responsive)
  Ajustements pour les différentes tailles d'écran.
*/
@media (max-width:920px){
  .hero__grid,.cta__grid{grid-template-columns:1fr;gap:36px}
  .hero__card{max-width:380px}
  .project,.project:nth-child(even) .shot{grid-template-columns:1fr;order:0}.project .shot{order:0!important}
  .facts__grid{grid-template-columns:repeat(2,1fr)}
  .fcell:nth-child(2n+1){border-left:0;padding-left:0}.fcell:nth-child(n+3){border-top:1px solid var(--d-line)}
}
@media (max-width:640px){
  .nav__links{position:absolute;top:66px;left:0;right:0;background:var(--paper);border-bottom:1px solid var(--line);flex-direction:column;align-items:flex-start;gap:0;padding:8px 24px 20px;display:none}
  .nav__links.open{display:flex}.nav__links a:not(.btn){width:100%;padding:13px 0;border-bottom:1px solid var(--line)}.nav__links .btn{margin-top:14px;width:100%;justify-content:center}
  .nav__toggle{display:flex}
  .skillrow{grid-template-columns:1fr;gap:8px}.mini-grid{grid-template-columns:1fr}.mrow{grid-template-columns:84px 1fr;gap:12px}
}
@media (prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{opacity:1!important;transform:none!important}*{transition:none!important}}
</style>
</head>
<body>

<header class="nav">
  <div class="wrap nav__in">
    <a href="#top" class="brand"><b></b>Théo Birost</a>
    <nav class="nav__links" id="menu">
      <a href="#projets">Projets</a>
      <a href="#competences">Compétences</a>
      <a href="#parcours">Parcours</a>
      <a href="#contact" class="btn btn-accent">Me contacter</a>
    </nav>
    <button class="nav__toggle" id="toggle" aria-label="Menu" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>

<main id="top">

<!-- HERO -->
<section class="hero">
  <div class="wrap hero__grid">
    <div>
      <span class="chip"><b></b>Disponible · CDI &amp; freelance · Remote</span>
      <h1>Développeur web <span class="accent">full-stack</span>.</h1>
      <p class="hero__sub">Moi c'est Théo. Je conçois et développe des sites et applications web performants — du design à la mise en production. Diplômé d'un BUT MMI (Bac+3), basé à Troyes.</p>
      <div class="hero__cta">
        <a href="#projets" class="btn btn-accent btn-lg">Voir mes projets
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        <a href="#contact" class="btn btn-ghost btn-lg">Me contacter</a>
        <a href="cv-theo-birost.pdf" class="tlink" download>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v12m0 0l-4-4m4 4l4-4M5 21h14"/></svg>
          Mon CV (PDF)</a>
      </div>
    </div>
    <aside class="hero__card">
      <!-- Remplace le bloc .portrait par : <div class="portrait"><img src="ta-photo.jpg" alt="Théo Birost"></div> -->
      <div class="portrait">
        <span class="portrait__mono">TB</span>
        <div class="portrait__badge"><span>Théo Birost</span><span class="dot">● Troyes, FR</span></div>
      </div>
    </aside>
  </div>
</section>

<!-- FACTS -->
<div class="facts">
  <div class="wrap facts__grid">
    <div class="fcell"><span class="n">01</span><div class="t">Full-stack — front &amp; back</div></div>
    <div class="fcell"><span class="n">02</span><div class="t">7 projets réalisés</div></div>
    <div class="fcell"><span class="n">03</span><div class="t">BUT MMI · Bac+3</div></div>
    <div class="fcell"><span class="n">04</span><div class="t">Dispo — CDI &amp; freelance</div></div>
  </div>
</div>

<!-- PROJETS -->
<section class="section" id="projets">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">Projets</span>
      <h2 class="h2 reveal">Mes réalisations récentes.</h2>
      <p class="lead reveal">Des projets concrets, du site client à l'application full-stack.</p>
    </div>
    <div class="projects">

      <article class="project reveal">
        <div class="shot">
          <div class="shot__bar"><i></i><i></i><i></i><span class="shot__url">hydrogenbusinessforclimate.com</span></div>
          <div class="shot__img"><!-- <img src="forum.jpg" alt="Forum Hydrogen"> -->
            <span class="shot__ph">Forum H2</span><span class="shot__phk">Ajoute une capture</span></div>
        </div>
        <div>
          <span class="project__k">Projet client · Stage</span>
          <h3>Forum Hydrogen Business for Climate</h3>
          <span class="project__ctx">Événement B2B international · Refonte complète</span>
          <p>Refonte intégrale du site d'un forum international de la filière hydrogène : architecture bilingue FR/EN, composants sur-mesure (intervenants, exposants, presse) et optimisation des performances sur un contenu dense.</p>
          <p class="project__role"><b>Mon rôle</b>Seul développeur, de l'intégration au déploiement, pendant mon stage à l'AER BFC.</p>
          <div class="tags"><span class="tag">WordPress</span><span class="tag">ACF</span><span class="tag">CPT UI</span><span class="tag">TranslatePress</span><span class="tag">PHP</span><span class="tag">SEO</span></div>
          <div class="project__links">
            <a class="plink" href="https://www.hydrogenbusinessforclimate.com" target="_blank" rel="noopener">Voir le site
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
          </div>
        </div>
      </article>

      <article class="project reveal">
        <div class="shot">
          <div class="shot__bar"><i></i><i></i><i></i><span class="shot__url">cineaste — app</span></div>
          <div class="shot__img"><span class="shot__ph">Cineaste</span><span class="shot__phk">Ajoute une capture</span></div>
        </div>
        <div>
          <span class="project__k">Application web</span>
          <h3>Cineaste</h3>
          <span class="project__ctx">Full-stack · Vue 3</span>
          <p>Application de découverte de films : recherche instantanée, fiches détaillées et données à jour via API. Une base full-stack complète, du front Vue 3 jusqu'à la logique serveur.</p>
          <p class="project__role"><b>Mon rôle</b>Conception et développement complet, front et back.</p>
          <div class="tags"><span class="tag">Vue 3</span><span class="tag">Vite</span><span class="tag">JavaScript</span><span class="tag">API REST</span></div>
          <div class="project__links">
            <a class="plink" href="https://portfolio.theo-birost.fr" target="_blank" rel="noopener">Démo
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
            <a class="plink" href="https://github.com/theobirost" target="_blank" rel="noopener">Code
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
          </div>
        </div>
      </article>

      <article class="project reveal">
        <div class="shot">
          <div class="shot__bar"><i></i><i></i><i></i><span class="shot__url">dampierre-auto — boutique</span></div>
          <div class="shot__img"><span class="shot__ph">Dampierre Auto</span><span class="shot__phk">Ajoute une capture</span></div>
        </div>
        <div>
          <span class="project__k">E-commerce</span>
          <h3>Dampierre Auto</h3>
          <span class="project__ctx">Boutique en ligne · Interface sur-mesure</span>
          <p>Boutique de pièces automobiles : catalogue structuré, panier et parcours d'achat sur-mesure, pensés pour la conversion et une navigation fluide.</p>
          <p class="project__role"><b>Mon rôle</b>Développement front sur-mesure et intégration de la boutique.</p>
          <div class="tags"><span class="tag">Vue</span><span class="tag">Vite</span><span class="tag">E-commerce</span><span class="tag">UX</span></div>
          <div class="project__links">
            <a class="plink" href="https://portfolio.theo-birost.fr" target="_blank" rel="noopener">Démo
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
            <a class="plink" href="https://github.com/theobirost" target="_blank" rel="noopener">Code
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
          </div>
        </div>
      </article>

    </div>

    <div class="subhead reveal">Autres projets — académiques &amp; perso</div>
    <div class="mini-grid reveal">
      <article class="mini">
        <span class="mini__k">Projet perso · Solo</span>
        <h3>Jeu du clicker</h3>
        <p>Un jeu de clic incrémental : gagnez des points, débloquez des améliorations et grimpez au classement.</p>
        <div class="tags"><span class="tag">HTML</span><span class="tag">Tailwind</span><span class="tag">PHP</span><span class="tag">Docker</span></div>
        <a class="plink" href="http://mmi23f02.mmi-troyes.fr/clicker/" target="_blank" rel="noopener">Voir le projet <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
      </article>
      <article class="mini">
        <span class="mini__k">Projet perso · Solo</span>
        <h3>Lanceur de dés</h3>
        <p>Simulateur de lancer de dés avec animations : génération aléatoire, manipulation du DOM et animations CSS.</p>
        <div class="tags"><span class="tag">HTML</span><span class="tag">Tailwind</span><span class="tag">JavaScript</span><span class="tag">PHP</span></div>
        <a class="plink" href="http://mmi23f02.mmi-troyes.fr/dice/" target="_blank" rel="noopener">Voir le projet <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
      </article>
      <article class="mini">
        <span class="mini__k">Projet perso · Solo</span>
        <h3>Portfolio template</h3>
        <p>Template de portfolio moderne en Tailwind et PHP, multilingue FR/EN, pour présenter projets et compétences.</p>
        <div class="tags"><span class="tag">Tailwind</span><span class="tag">HTML</span><span class="tag">JavaScript</span><span class="tag">PHP</span></div>
        <a class="plink" href="http://mmi23f02.mmi-troyes.fr/portfolio-v3/" target="_blank" rel="noopener">Voir le projet <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
      </article>
      <article class="mini">
        <span class="mini__k">Projet universitaire · Duo</span>
        <h3>Infrastructures vélo en France</h3>
        <p>Site interactif pour explorer, filtrer et comparer les infrastructures cyclables en France. Réalisé en duo.</p>
        <div class="tags"><span class="tag">HTML</span><span class="tag">CSS</span><span class="tag">JavaScript</span><span class="tag">JSON</span><span class="tag">Figma</span></div>
        <a class="plink" href="http://mmi23f02.mmi-troyes.fr/sae303/" target="_blank" rel="noopener">Voir le projet <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M9 7h8v8"/></svg></a>
      </article>
    </div>
  </div>
</section>

<!-- COMPETENCES -->
<section class="section" id="competences" style="background:#DEDACD">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">Compétences</span>
      <h2 class="h2 reveal">Ma stack technique.</h2>
      <p class="lead reveal">Ce avec quoi je travaille au quotidien, du front au déploiement.</p>
    </div>
    <div class="skills reveal">
      <div class="skillrow"><h3>Front-end</h3><div class="skilltags"><span class="tag">HTML</span><span class="tag">CSS</span><span class="tag">SCSS</span><span class="tag">JavaScript</span><span class="tag">Vue.js</span><span class="tag">Bootstrap</span><span class="tag">Tailwind</span><span class="tag">SEO</span></div></div>
      <div class="skillrow"><h3>Back-end</h3><div class="skilltags"><span class="tag">PHP</span><span class="tag">Symfony</span><span class="tag">Node.js</span><span class="tag">MySQL</span><span class="tag">MongoDB</span><span class="tag">GraphQL</span><span class="tag">JSON</span></div></div>
      <div class="skillrow"><h3>Outils</h3><div class="skilltags"><span class="tag">Docker</span><span class="tag">VS Code</span><span class="tag">PhpStorm</span><span class="tag">WebStorm</span><span class="tag">GitHub</span><span class="tag">GitHub Actions</span><span class="tag">WordPress</span><span class="tag">Blender</span><span class="tag">Unity</span></div></div>
      <div class="skillrow"><h3>UI/UX &amp; Design</h3><div class="skilltags"><span class="tag">Figma</span><span class="tag">Canva</span><span class="tag">Illustrator</span><span class="tag">Photoshop</span><span class="tag">Dimension</span></div></div>
      <div class="skillrow"><h3>IA</h3><div class="skilltags"><span class="tag">Claude</span><span class="tag">ChatGPT</span><span class="tag">Gemini</span><span class="tag">Perplexity</span></div></div>
    </div>
  </div>
</section>

<!-- PARCOURS -->
<section class="section" id="parcours">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">Parcours</span>
      <h2 class="h2 reveal">Mon parcours.</h2>
    </div>
    <p class="about reveal">Développeur <b>full-stack</b> curieux et rigoureux, j'aime construire des projets web complets — du premier maquettage jusqu'à la mise en production. Je porte autant d'attention au <b>code propre</b> qu'au <b>rendu final</b>, et je cherche aujourd'hui une équipe où continuer à progresser, en <b>CDI</b> comme en <b>freelance</b>.</p>
    <div class="tl reveal">
      <div class="tlitem">
        <span class="tldate">2026 · 6 mois</span>
        <h3>Développeur web — Stage</h3>
        <p class="tlrole">AER BFC · Bourgogne-Franche-Comté</p>
        <p>Seul développeur sur la refonte du site du Forum Hydrogen Business for Climate : WordPress sur-mesure, développements PHP, multilingue et optimisation des performances.</p>
      </div>
      <div class="tlitem">
        <span class="tldate">2023 – 2026</span>
        <h3>BUT MMI — Bac+3</h3>
        <p class="tlrole">Métiers du Multimédia et de l'Internet</p>
        <p>Formation full-stack complète : développement web front &amp; back, design d'interface, gestion de projet et culture numérique.</p>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section class="section section--dark cta" id="contact">
  <div class="wrap">
    <div class="cta__grid">
      <div>
        <span class="eyebrow" style="margin-bottom:16px">Contact</span>
        <h2 class="h2">Travaillons ensemble.</h2>
        <p class="lead">Une opportunité en CDI, une mission freelance, ou simplement envie d'échanger ? Je réponds vite.</p>
        <div class="manifest">
          <div class="mrow"><span class="mk">Mail</span><span class="mv"><a href="mailto:tbirost@gmail.com">tbirost@gmail.com</a></span></div>
          <div class="mrow"><span class="mk">GitHub</span><span class="mv"><a href="https://github.com/theobirost" target="_blank" rel="noopener">github.com/theobirost</a></span></div>
          <div class="mrow"><span class="mk">LinkedIn</span><span class="mv"><a href="https://www.linkedin.com/in/theobirost" target="_blank" rel="noopener">linkedin.com/in/theobirost</a></span></div>
          <div class="mrow"><span class="mk">Lieu</span><span class="mv">Troyes (10) · France · Remote</span></div>
        </div>
      </div>
      <form class="form" id="cform">
        <div class="field"><label for="cn">Nom</label><input id="cn" type="text" autocomplete="name" required></div>
        <div class="field"><label for="ce">Email</label><input id="ce" type="email" autocomplete="email" required></div>
        <div class="field"><label for="cm">Votre message</label><textarea id="cm" required></textarea></div>
        <button type="submit" class="btn btn-accent btn-lg" style="justify-content:center">Envoyer
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
      </form>
    </div>
  </div>
</section>
</main>

<footer class="footer">
  <div class="wrap">
    <div class="footer__in">
      <span class="footer__b">Théo Birost — Développeur web full-stack</span>
      <nav class="footer__l"><a href="#projets">Projets</a><a href="#competences">Compétences</a><a href="#parcours">Parcours</a><a href="#contact">Contact</a><a href="#top">↑ Haut</a></nav>
    </div>
    <div class="footer__meta"><span>© 2026 Théo Birost · Troyes, France</span><span>Développeur web full-stack</span></div>
  </div>
</footer>

<script>
// --- Script pour le menu de navigation mobile (burger menu) ---
(function() {
  var toggleBtn = document.getElementById('toggle'); // Le bouton burger
  var menu = document.getElementById('menu'); // Le menu de navigation

  // Au clic sur le bouton
  toggleBtn.addEventListener('click', function() {
    // On ajoute/supprime la classe 'open' sur le menu pour l'afficher/cacher
    var isOpen = menu.classList.toggle('open');
    // On met à jour l'attribut 'aria-expanded' pour l'accessibilité
    toggleBtn.setAttribute('aria-expanded', isOpen);
  });

  // Pour fermer le menu quand on clique sur un lien (sur mobile)
  menu.querySelectorAll('a').forEach(function(link) {
    link.addEventListener('click', function() {
      menu.classList.remove('open');
      toggleBtn.setAttribute('aria-expanded', false);
    });
  });
})();

// --- Script pour le formulaire de contact ---
(function() {
  var form = document.getElementById('cform'); // Le formulaire

  form.addEventListener('submit', function(event) {
    // On empêche l'envoi classique du formulaire
    event.preventDefault();

    // On récupère les valeurs des champs
    var name = document.getElementById('cn').value.trim();
    var email = document.getElementById('ce').value.trim();
    var message = document.getElementById('cm').value.trim();

    // On construit le corps de l'email
    var body = 'Nom : ' + name + '\n' +
               'Email : ' + email + '\n\n' +
               message;

    // On crée un lien 'mailto:' qui ouvrira le client email par défaut de l'utilisateur
    // C'est une solution simple qui ne nécessite pas de back-end.
    var mailtoLink = 'mailto:tbirost@gmail.com' +
                     '?subject=' + encodeURIComponent('Contact portfolio — ' + (name || '')) +
                     '&body=' + encodeURIComponent(body);

    // On redirige l'utilisateur vers ce lien
    window.location.href = mailtoLink;
  });
})();

// --- Script pour l'animation d'apparition au défilement ---
(function() {
  // Si l'utilisateur préfère des animations réduites, on ne fait rien.
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  // On crée un "observateur" qui va surveiller quand les éléments entrent dans la fenêtre
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      // Si l'élément est visible...
      if (entry.isIntersecting) {
        // ...on lui ajoute la classe 'in' pour déclencher l'animation CSS
        entry.target.classList.add('in');
        // Et on arrête de l'observer pour ne pas répéter l'animation
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 }); // L'animation se déclenche quand 12% de l'élément est visible

  // On demande à l'observateur de surveiller tous les éléments avec la classe '.reveal'
  document.querySelectorAll('.reveal').forEach(function(element) {
    observer.observe(element);
  });
})();
</script>
</body>
</html>