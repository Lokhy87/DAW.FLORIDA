function addToCart(name, price, image) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  cart.push({ name, price, image });

  localStorage.setItem("cart", JSON.stringify(cart));

  alert(name + " ha sido agregado al carrito 🛒");
}

function searchProducts() {
  const input = document.getElementById("searchInput").value.toLowerCase();
  const products = document.querySelectorAll(".product");

  products.forEach((product) => {
    const name = product.querySelector("h3").textContent.toLowerCase();
    product.style.display = name.includes(input) ? "block" : "none";
  });
}
