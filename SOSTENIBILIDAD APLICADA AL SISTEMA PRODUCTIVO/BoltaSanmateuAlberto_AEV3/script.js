// Obtener el carrito desde localStorage o crear uno vacío
function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

// Guardar el carrito en localStorage
function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}

// Añadir un producto al carrito
function addToCart(name, price, image) {
    const cart = getCart();

    const product = {
        name: name,
        price: price,
        image: image
    };

    cart.push(product);
    saveCart(cart);

    alert(name + " añadido al carrito");
}

// Vaciar carrito
function clearCart() {
    localStorage.removeItem("cart");
    location.reload();
}
