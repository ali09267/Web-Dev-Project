let cart = []; // globally available

window.addEventListener('DOMContentLoaded', () => {
  let addButtons = document.querySelectorAll(".add");
  let cartDisplay = document.querySelector("#cartContainer p");
  let totalItems = 0;
  let totalPrice = 0;

  addButtons.forEach(button => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      let productDiv = e.target.closest(".product");
      let productName = productDiv.querySelector(".name").textContent.trim();
      let productPrice = productDiv.querySelector(".price").textContent.trim();
      addToCart(productName, productPrice);
      renderCart();
    });
  });

  function addToCart(productName, productPrice) {
    let existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      cart.push({
        name: productName,
        price: productPrice,
        quantity: 1
      });
    }
    totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  }

  function renderCart() {
    if (cart.length === 0) {
      cartDisplay.textContent = "Cart is empty.";
      removeButtonSectionIfExists();
      return;
    }

    cartDisplay.textContent = "";
    totalPrice = 0;

    cart.forEach(item => {
      let priceNum = parseFloat(item.price.replace(/[^0-9.]/g, ""));
      let itemTotal = priceNum * item.quantity;
      cartDisplay.textContent += `${item.name} (${item.quantity}x)\n`;
      cartDisplay.textContent += `$${priceNum.toFixed(2)} each — Subtotal: $${itemTotal.toFixed(2)}\n\n`;
      totalPrice += itemTotal;
    });

    cartDisplay.textContent += `\nTotal Items Borrowed: ${totalItems}\n`;
    cartDisplay.textContent += `Total Price: $${totalPrice.toFixed(2)}\n`;

    let cartContainer = document.querySelector("#cartContainer");

    if (!document.querySelector(".button-section")) {
      let buttonSection = document.createElement("div");
      buttonSection.className = "button-section";

      let removeBtn = document.createElement("button");
      removeBtn.type = "button";
      removeBtn.textContent = "Remove";

      removeBtn.addEventListener("click", () => {
        let nameToRemove = prompt("Enter the product name to remove:");
        if (!nameToRemove) return;

        let index = cart.findIndex(item => item.name.toLowerCase() === nameToRemove.trim().toLowerCase());

        if (index !== -1) {
          cart.splice(index, 1);
          totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
          renderCart();
        } else {
          alert(`"${nameToRemove}" was not found in the cart.`);
        }
      });

      buttonSection.appendChild(removeBtn);
      cartContainer.appendChild(buttonSection);
    }
  }

  function removeButtonSectionIfExists() {
    let existingSection = document.querySelector(".button-section");
    if (existingSection) existingSection.remove();
  }

  renderCart(); // Initial cart render
});

// 🔁 This function is called on form submit to serialize the cart
function prepareCheckout() {
  const hiddenInput = document.querySelector("#cartData");
  if (!hiddenInput) return false;
  hiddenInput.value = JSON.stringify(cart);
  return true;
}
