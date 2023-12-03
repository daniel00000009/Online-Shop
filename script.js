document.addEventListener('DOMContentLoaded', function () {
  const registerLink = document.getElementById('registerLink');
  const loginLink = document.getElementById('loginLink');
  const shopNowButton = document.getElementById('shopNowButton');
  const homeLink = document.getElementById('homeLink');
  const cartLink = document.getElementById('cartLink');

  homeLink.addEventListener('click', function (event) {
    event.preventDefault(); // Oprirea comportamentului implicit al link-ului

    // Redirecționare către pagina de start
    window.location.href = 'index.php';
  });
  // Adaugă eveniment de clic pentru link-ul de "Register"
  registerLink.addEventListener('click', function (event) {
    event.preventDefault();
    window.location.href = 'register.php';
  });

  // Adaugă eveniment de clic pentru link-ul de "Log In"
  loginLink.addEventListener('click', function (event) {
    event.preventDefault();
    window.location.href = 'login.php';
  });

  // Adaugă eveniment de clic pentru butonul "Shop Now"
  shopNowButton.addEventListener('click', function () {
    window.location.href = 'shop.php';
  });

  cartLink.addEventListener('click', function (event) {
    event.preventDefault(); // Oprirea comportamentului implicit al link-ului

    // Redirecționare către pagina de start
    window.location.href = 'cart.php';
  });

});
