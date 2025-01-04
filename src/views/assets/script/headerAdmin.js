const userMenu = document.querySelector('.relative');
    userMenu.addEventListener("mouseenter", () => {
      userMenu.querySelector('.absolute').classList.remove('hidden');
    });
    userMenu.addEventListener("mouseenter", () => {
      userMenu.querySelector('.absolute').classList.add('hidden');
    });