const windowWidth = innerWidth;
const bodyHtml= document.getElementById('body');

window.addEventListener('resize', () => {
    if (bodyHtml < 799) {
        body.style.display = 'none';
    };
    
    console.log(windowWidth);
    
});
console.log(windowWidth);