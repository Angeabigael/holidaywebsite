document.addEventListener('DOMContentLoaded', function () {
    const background = document.querySelector('.background');

    for (let i = 0; i < 100; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = `${Math.random() * 100}vw`;
        star.style.top = `${Math.random() * 100}vh`;
        star.style.setProperty('--random-x', Math.random());
        star.style.animationDelay = `${Math.random() * 5}s`;
        star.style.animationDuration = `${2 + Math.random() * 3}s`;
        background.appendChild(star);
    }
});
