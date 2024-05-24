let currentProductIndex = 0;
const productsWrapper = document.getElementById('productsWrapper');
const products = productsWrapper.querySelectorAll('.product');
const productWidth = products[0].offsetWidth;

function showProduct(index) {
    productsWrapper.style.transform = `translateX(${-index * productWidth}px)`;
}

function prevProduct() {
    if (currentProductIndex > 0) {
        currentProductIndex--;
        showProduct(currentProductIndex);
    }
}

function nextProduct() {
    if (currentProductIndex < products.length - 1) {
        currentProductIndex++;
        showProduct(currentProductIndex);
    }
}
