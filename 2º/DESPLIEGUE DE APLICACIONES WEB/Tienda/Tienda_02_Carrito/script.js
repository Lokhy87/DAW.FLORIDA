function addToCart(name, price, image) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  cart.push({ name, price, image });

  localStorage.setItem("cart", JSON.stringify(cart));

  alert(name + " ha sido agregado al carrito 🛒");
}
