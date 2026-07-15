// --- Script pour le menu de navigation mobile (burger menu) ---
(function() {
  const toggleBtn = document.getElementById('toggle');
  const menu = document.getElementById('menu');

  if (toggleBtn && menu) {
    toggleBtn.addEventListener('click', function() {
      const isOpen = menu.classList.toggle('open');
      toggleBtn.setAttribute('aria-expanded', isOpen);
    });

    menu.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        menu.classList.remove('open');
        toggleBtn.setAttribute('aria-expanded', false);
      });
    });
  }
})();

// --- Script pour le formulaire de contact ---
(function() {
  const form = document.getElementById('cform');

  if (form) {
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      const name = document.getElementById('cn').value.trim();
      const email = document.getElementById('ce').value.trim();
      const message = document.getElementById('cm').value.trim();

      const body = `Nom : ${name}\nEmail : ${email}\n\n${message}`;

      const mailtoLink = `mailto:tbirost@gmail.com?subject=${encodeURIComponent(`Contact portfolio — ${name || ''}`)}&body=${encodeURIComponent(body)}`;

      window.location.href = mailtoLink;
    });
  }
})();

// --- Script pour l'animation d'apparition au défilement ---
(function() {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(function(element) {
    observer.observe(element);
  });
})();