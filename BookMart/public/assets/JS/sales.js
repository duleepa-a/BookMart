function searchOrders() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let orderCards = document.querySelectorAll(".order-card");
    
    orderCards.forEach((card) => {
        let title = card.querySelector(".product-title").textContent.toLowerCase();
        let seller = card.querySelector(".store-name span").textContent.toLowerCase();

        if (title.includes(input) || seller.includes(input)) {
            card.style.display = "";  
        } else {
            card.style.display = "none"; 
        }
    });
}