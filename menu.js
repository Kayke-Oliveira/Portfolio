document.addEventListener('DOMContentLoaded', () => {
    let btnMenu = document.getElementById('btn-abrir-menu');
    let btnClose = document.querySelector('.btn-fechar');
    let menu = document.getElementById('menu-mobile');
    let overlay = document.querySelector('.overlay-menu');

    // Função para abrir o menu
    const abrirMenu = () => {
        menu.classList.add('abrir-menu');
        overlay.style.display = 'block';
    };

    // Função para fechar o menu
    const fecharMenu = () => {
        menu.classList.remove('abrir-menu');
        overlay.style.display = 'none';
    };

    // Evento para abrir o menu
    btnMenu.addEventListener('click', abrirMenu);

    // Evento para fechar o menu
    btnClose.addEventListener('click', fecharMenu);
    overlay.addEventListener('click', fecharMenu);
});
